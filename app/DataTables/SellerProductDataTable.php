<?php

namespace App\DataTables;

use App\Models\Product;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class SellerProductDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('image', function ($query) {
                return '<img style="width:100px; height:70px" src="' . asset(env('ADMIN_PRODUCT_IMAGE_UPLOAD_PATH') . $query->thumb_image) . '"></img>';
            })
            ->addColumn('action', function ($query) {
                return '<a href="' . route('admin.product.edit', $query->id) . '" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
               <a href="' . route('admin.product.destroy', $query->id) . '" class="btn btn-outline-danger delete-item ml-1"><i class="fas fa-trash-alt"></i></a>
               <div class="dropdown dropleft d-inline">
                  <button class="btn btn-primary dropdown-toggle ml-1" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-cog"></i>
                  </button>
                  <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                    <a class="dropdown-item has-icon" href="' . route('admin.product-image-gallery.index', ['product' => $query->id]) . '"><i class="fas fa-images"></i> Image Gallery</a>
                    <a class="dropdown-item has-icon" href="' . route('admin.product-variants.index', ['product' => $query->id]) . '"><i class="fas fa-ellipsis-v"></i> Variants</a>
                  </div>
                </div>
         ';
            })
            ->addColumn('status', function ($query) {
                if ($query->status == 1) {
                    $button = '<label class="custom-switch mt-2">
                <input type="checkbox" checked name="custom-switch-checkbox" data-id="' . $query->id . '" class="custom-switch-input change-status">
                <span class="custom-switch-indicator"></span>
              </label>';
                } else {
                    $button = '<label class="custom-switch mt-2">
                <input type="checkbox" name="custom-switch-checkbox" data-id="' . $query->id . '" class="custom-switch-input change-status">
                <span class="custom-switch-indicator"></span>
              </label>';
                }
                return $button;
            })
            ->addColumn('type', function ($query) {
                switch ($query->product_type) {
                    case 'new_arrival':
                        return '<i class="badge badge-primary">New Arrival</i>';
                        break;
                    case 'featured_product':
                        return '<i class="badge badge-warning">Featured Product</i>';
                        break;
                    case 'best_product':
                        return '<i class="badge badge-success">Best Product</i>';
                        break;
                    case 'top_product':
                        return '<i class="badge badge-danger">Top Product</i>';
                        break;

                    default:
                        return '<i class="badge badge-secondery">None</i>';
                        break;
                }
            })
            ->addColumn('vendor' , function($query){
                return $query->vendor->shop_name;
            })
            ->addColumn('approve', function($query){
                return "<select class='form-control is_approve' data-id='$query->id'>
                <option value='0'>Pending</option>
                <option selected value='1'>Approved</option>
                </select>";
            })
            ->rawColumns(['action', 'image', 'status', 'type' , 'approve'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->where('vendor_id','!=',Auth::user()->vendor->id)->where('is_approved' , 1)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('sellerproduct-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(0)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('vendor'),
            Column::make('image')->width(100),
            Column::make('name'),
            Column::make('price'),
            Column::make('type')->width(100),
            Column::make('status'),
            Column::make('approve')->width(80),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(200)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'SellerProduct_' . date('YmdHis');
    }
}
