<?php

namespace App\DataTables;

use App\Models\Admin\Category;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CategoryDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'category.action')
            ->setRowId('id');
    }


    public function query(Category $model): QueryBuilder
    {
        // return $model->newQuery()->orderBy('id','Asc');
        return $model->newQuery();
        // return $model->orderBy('id');
    }

    public function html(): HtmlBuilder
    {
        $buttons = [
            Button::make('collection')->text('<i class="ti ti-screen-share me-1 ti-xs"></i>Export')->addClass('btn btn-label-secondary dropdown-toggle mx-3')->buttons([
                Button::raw('excel')->text('<i class="ti ti-file-spreadsheet me-2"></i>Excel')->addClass('dropdown-item'),
                Button::raw('csv')->text('<i class="ti ti-file-text me-2" ></i>Csv')->addClass('dropdown-item'),
                Button::raw('pdf')->text('<i class="ti ti-file-code-2 me-2"></i>Pdf')->addClass('dropdown-item'),
                Button::raw('print')->text('<i class="ti ti-printer me-2" ></i>Print')->addClass('dropdown-item'),
            ]),
        ];
        // check user create permission
        $buttons[] = [
            Button::make()->text('<i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Add New Type</span>')->addClass('add-new btn btn-primary')
                ->attr([
                    'onclick' => 'create()',
                ]),
                Button::make()->text('<i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Add New Type</span>')->addClass('add-new btn btn-primary')
                ->attr([
                    'onclick' => 'create()',
                ]),
        ];
        return $this->builder()
            ->setTableId('category-table')
            // ->addTableClass();   here we can give clas to data tables
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom(
                '<"row me-2 border border-danger"' .
                    '<"col-md-2 border border-warning"<"me-3"l>>' .
                    '<"col-md-10 border border-warning"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>' .
                    '>t' .
                    '<"row mx-2"' .
                    '<"col-sm-12 col-md-6"i>' .
                    '<"col-sm-12 col-md-6"p>' .
                    '>'
            )
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons($buttons);
    }


    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('title'),
            Column::make('slug'),
            Column::make('show_on_home'),
            Column::make('created_at')->searchable(false),
            Column::make('action')->orderable(false)->searchable(false),
            // Column::computed('action')
            //       ->exportable(false)
            //       ->printable(false)
            //       ->width(60)
            //       ->addClass('text-center'),
        ];
    }


    protected function filename(): string
    {
        return 'Category_' . date('YmdHis');
    }
}
