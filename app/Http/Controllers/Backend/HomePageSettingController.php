<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\HomePageSetting;
use Illuminate\Http\Request;

class HomePageSettingController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)->get();
        $popularCategorySection = HomePageSetting::where('key', 'popular_category_section')->first();
        $productSliderSectionOne = HomePageSetting::where('key', 'product_slider_section_one')->first();
        return view('admin.home-page-setting.index', compact('categories', 'popularCategorySection' , 'productSliderSectionOne'));
    }

    public function updatePopularCategorySection(Request $request)
    {
        $request->validate([
            'cat_one' => 'required',
            'cat_two' => 'required',
            'cat_three' => 'required',
            'cat_four' => 'required',
        ], [
            'cat_one.required' => 'Category One is required',
            'cat_two.required' => 'Category Two is required',
            'cat_three.required' => 'Category Three is required',
            'cat_four.required' => 'Category Four is required',
        ]);
        $data = [
            [
                'category' => $request->cat_one,
                'sub_category' => $request->sub_cat_one,
                'child_category' => $request->child_cat_one,
            ],
            [
                'category' => $request->cat_two,
                'sub_category' => $request->sub_cat_two,
                'child_category' => $request->child_cat_two,
            ],
            [
                'category' => $request->cat_three,
                'sub_category' => $request->sub_cat_three,
                'child_category' => $request->child_cat_three,
            ],
            [
                'category' => $request->cat_four,
                'sub_category' => $request->sub_cat_four,
                'child_category' => $request->child_cat_four,
            ],
        ];

        HomePageSetting::updateOrCreate(
            [
                'key' => 'popular_category_section'
            ],
            [
                'value' => json_encode($data)
            ]
        );

        toastr('Updated Successfully', 'success');

        return redirect()->back();
    }

    function updateProductSliderSectionOne(Request $request)
    {
        $request->validate([
            'category' => 'required',
        ]);
        $data = [
            'category' => $request->category,
            'sub_category' => $request->sub_category,
            'child_category' => $request->child_category,
        ];

        HomePageSetting::updateOrCreate(
            [
                'key' => 'product_slider_section_one'
            ],
            [
                'value' => json_encode($data)
            ]
        );

        toastr('Updated Successfully', 'success');

        return redirect()->back();
    }
}
