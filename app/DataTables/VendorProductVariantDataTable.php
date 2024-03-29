<?php

namespace App\DataTables;

use App\Models\ProductVariant;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use App\Models\VendorProductVariant;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class VendorProductVariantDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                return '<a href="' . route('vendor.variant-item.index', ['productId' => request()->product, 'variantId' => $query->id]) . '" class="btn btn-outline-info mr-1">Variant Item</a>
            <a href="' . route('vendor.product-variants.edit', ['product_variant' => $query->id, 'product' => request()->product]) . '" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
           <a href="' . route('vendor.product-variants.destroy', $query->id) . '" class="btn btn-outline-danger delete-item ml-1"><i class="fas fa-trash-alt"></i></a>
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
            ->rawColumns(['action', 'status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ProductVariant $model): QueryBuilder
    {
        return $model->where('product_id' , request()->product)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('vendorproductvariant-table')
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
            Column::make('id')->width(50),
            Column::make('name'),
            Column::make('status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(250)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'VendorProductVariant_' . date('YmdHis');
    }
}
