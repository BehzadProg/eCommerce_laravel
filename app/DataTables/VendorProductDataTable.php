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

class VendorProductDataTable extends DataTable
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
                return '<a href="' . route('vendor.products.edit', $query->id) . '" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
               <a href="' . route('vendor.products.destroy', $query->id) . '" class="btn btn-outline-danger delete-item ml-1"><i class="fas fa-trash-alt"></i></a>
               <div class="btn-group dropstart">
                   <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                   <i class="fas fa-cog"></i>
                     </button>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item has-icon" href="' . route('vendor.product-image-gallery.index', ['product' => $query->id]) . '"><i class="fas fa-images" style="margin-right:5px"></i> Image Gallery</a></li>
                    <li><a class="dropdown-item has-icon" href="' . route('admin.product-variants.index', ['product' => $query->id]) . '"><i class="fas fa-ellipsis-v" style="margin-right:5px"></i> Variants</a></li>
                  </ul>
                  </div>
               ';
            })
            ->addColumn('status', function ($query) {
                if ($query->status == 1) {
                    $button =  '<div class="form-check form-switch">
              <input checked class="form-check-input change-status" type="checkbox" data-id="' . $query->id . '">
            </div>';
                } else {
                    $button = '<div class="form-check form-switch">
              <input class="form-check-input change-status"  type="checkbox" data-id="' . $query->id . '">
              </div>';
                }
                return $button;
            })
            ->addColumn('type', function ($query) {
                switch ($query->product_type) {
                    case 'new_arrival':
                        return '<i class="badge bg-primary">New Arrival</i>';
                        break;
                    case 'featured_product':
                        return '<i class="badge bg-warning">Featured Product</i>';
                        break;
                    case 'best_product':
                        return '<i class="badge bg-success">Best Product</i>';
                        break;
                    case 'top_product':
                        return '<i class="badge bg-danger">Top Product</i>';
                        break;

                    default:
                        return '<i class="badge bg-secondery">None</i>';
                        break;
                }
            })
            ->rawColumns(['action', 'image', 'status', 'type'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->where('vendor_id', Auth::user()->vendor->id)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('vendorproduct-table')
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
            Column::make('image')->width(100),
            Column::make('name'),
            Column::make('price'),
            Column::make('type')->width(100),
            Column::make('status'),
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
        return 'VendorProduct_' . date('YmdHis');
    }
}
