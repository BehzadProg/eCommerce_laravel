<?php

namespace App\Http\Controllers\Frontend;

use App\DataTables\UserProductReviewDataTable;
use Illuminate\Http\Request;
use App\Models\ProductReview;
use App\Http\Controllers\Controller;
use App\Models\ProductReviewGallery;
use App\Models\ProductReviewRate;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index(UserProductReviewDataTable $dataTable)
    {
        return $dataTable->render('frontend.dashboard.reviews.index');
    }


    public function store(Request $request)
    {

        $request->validate([
            'review' => 'required|min:5|max:1000',
            'rate' => 'required|digits_between:0,5',
            'image.*' => 'image|max:2048',
            'image' => 'max:3'
        ]);

        $checkReviewExist = ProductReview::where(['user_id' => Auth::user()->id , 'product_id' => $request->product_id])->first();
        if($checkReviewExist){
            toastr('You already submited a review for this product!' , 'info');
            return redirect()->back();
        }

        $productReview = new ProductReview();
        $productReview->product_id = $request->product_id;
        $productReview->vendor_id = $request->vendor_id;
        $productReview->user_id = Auth::user()->id;
        $productReview->review = $request->review;
        $productReview->rate = $request->rate;
        $productReview->save();

        $imagePath = handleMultiUpload('image' , env('REVIEW_GALLERY_IMAGE_UPLOAD_PATH') , 'review_image');
        if (!empty($imagePath)) {

            foreach($imagePath as $path){
                $reviewImageGallery = new ProductReviewGallery();
                $reviewImageGallery->product_review_id = $productReview->id;
                $reviewImageGallery->image = $path;
                $reviewImageGallery->save();

            }
        }

        toastr('Review Submited Successfully' , 'success');
        return redirect()->back();
    }
}
