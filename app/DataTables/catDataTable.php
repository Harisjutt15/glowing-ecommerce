<?php


use App\Models\Admin\Category;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class catDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param  QueryBuilder  $query  Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {

        $columns = array_column($this->getColumns(), 'data');

        return (new EloquentDataTable($query))
            // ->addColumn('action', 'calloutcometype.action')
            // ->addIndexColumn()
            // ->editColumn('title', function ($model) {
            //     return $model->title ?? '-';
            // })

            ->editColumn('created_at', function ($model) {
                return \Carbon\Carbon::parse($model->created_at)->format('Y-m-d H:i:s');
            })
            ->editColumn('actions', function ($model) {
                //     $buttons = '';
                //     if (Auth::user()->can('task-type.edit')) {
                //         $buttons .= '<a href="javascript:void(0)" onclick="editTaskType('.$model->id.')" 
                //          data-bs-toggle="tooltip" class="text-body ms-1 me-2"
                // data-bs-placement="top" title="Edit Task Type"

                //         ><i class="ti ti-edit"></i></a>';
                //     }
                //     if (Auth::user()->can('task-type.delete')) {
                //         $buttons .= '<a class="mx-3" href="javascript:void(0)" onclick="deleteTaskType('.$model->id.')"
                //          data-bs-toggle="tooltip" class="text-body ms-1 me-2"
                // data-bs-placement="top" title="Delete Task Type"
                //  ><i class="ti ti-trash">sds</i></a>';
                //     }


                //     return $buttons;
                // floor data
                $result = '<div class="d-flex align-items-center">';
                if (Auth::user()->can('task-type.edit')) {
                    $result = $result . '<a href="javascript:void(0)" onclick="editTaskType(' . $model->id . ')" data-bs-toggle="tooltip" class="text-body ms-1 me-2"
             data-bs-placement="top" title="Edit Task Type"
                     class="text-body"><i class="ti ti-edit ti-sm me-2"></i></a>';
                }
                if (Auth::user()->can('task-type.delete')) {
                    $result = $result . '<a href="javascript:void(0)" onclick="deleteTaskType(' . $model->id . ')"  data-bs-toggle="tooltip" class="text-body ms-1 me-2"
            data-bs-placement="top" title="Delete Task Type"
                     class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a>';
                }

                return $result = $result . '</div>';
            })
            ->rawColumns(array_merge($columns, ['created_at', 'actions']))

            ->setRowId('id');
    }


    public function query(Category $model): QueryBuilder
    {
        // return $model->newQuery()->where('type', request()->type ?? '')->orderBy('id');
        return $model->newQuery()->orderBy('id');
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            // ->dom('Bfrtip')
            ->dom("<\"row m-3\"<\"col-md-2\"<\"me-3\"l>><\"col-md-10\"<\"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0\"fB>>>t<\"row m-3\"<\"col-sm-12 col-md-6 mt-3\"i><\"col-sm-12 col-md-6 mt-3\"p>>")
            ->setTableAttribute('class', 'table table-bordered nowrap table-striped align-middle')
            ->setTableAttribute('style', 'width:100%')
            ->fixedHeader(true)
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons();
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
            Column::make('id'),
            Column::make('title'),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'categories' . date('YmdHis');
    }
}
