<?php

namespace App\DataTables;

use App\Models\ProductReview;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use App\Models\VendorProductReview;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class VendorProductReviewDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('status', function($query){
            if($query->is_approved == 1){
                return "<span class='badge bg-success'>approved</span>";
            }else{
                return "<span class='badge bg-warning'>pending</span>";
            }
        })
        ->addColumn('product', function($query){
           return "<a target='_blank' href='".route('product-detail' , $query->product->slug)."'>".$query->product->name."</a>";
        })
        ->addColumn('rate', function($query){
           return $query->productReviewRate->rate .' '.'Star';
        })
        ->addColumn('user', function($query){
           return $query->user->username;
        })
        ->rawColumns(['status' , 'product'])
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ProductReview $model): QueryBuilder
    {
        return $model->where('vendor_id' , Auth::user()->vendor->id)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('vendorproductreview-table')
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
            Column::make('review'),
            Column::make('rate'),
            Column::make('user'),
            Column::make('product'),
            Column::make('status'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'VendorProductReview_' . date('YmdHis');
    }
}
