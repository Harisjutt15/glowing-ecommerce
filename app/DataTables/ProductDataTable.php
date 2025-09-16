<?php

namespace App\DataTables;

use App\Models\Admin\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->editColumn('show_on_home',function($mode){
            return '<div class="form-check form-switch"><input class="form-check-input producyShoeOnHome" type="checkbox" data-id="'.$mode->id.'" role="switch" '.($mode->show_on_home ? 'checked' : '').'></div>  ';
            return ' <div class="form-check form-switch "> <input class="form-check-input showOnHome" type="checkbox" data-id="'.$model->id.'" role="switch"  '.($model->show_on_home ? 'checked' : '').'> </div>';
        })
        ->editColumn('action',function($model){
            $button='';
            $button.='<a href="'.route('admin.product.edit',['id'=>$model->id]).'" data-bs-toggle="tooltip" data-bs-placement="top"  title="Edit"><i class="ti ti-edit"></i></a>';
            $button.='<a class="mx-2 deleteProduct" href="javascript:void(0)" data-id='.$model->id.' data-bs-placement="top"  data-bs-toggle="tooltip" title="Delete"><i class="ti ti-trash "></i></a>  ';
            return $button;
        })
             
            ->rawColumns(['show_on_home','action'])
            ->setRowId('id')->addindexColumn();
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('product-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        // Button::make('excel'),
                        // Button::make('csv'),
                        // Button::make('pdf'),
                        // Button::make('print'),
                        // Button::make('reset'),
                        // Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            COlumn::computed('DT_RowIndex')->title('#'),
            // Column::make('id'),
            Column::make('title'),
            Column::make('slug'),
            Column::make('show_on_home'),
            Column::make('price'),
            Column::make('new_arrival'),
            Column::make('short_description'),
            Column::make('created_at'),
            // Column::make('updated_at'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Product_' . date('YmdHis');
    }
}
