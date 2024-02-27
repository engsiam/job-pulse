<?php

namespace App\DataTables;

use App\Models\Job;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class JobDataTable extends DataTable
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

                $editBtn = "<a href='" . route('company.jobs.edit', $query->id) . "' class= 'btn btn-danger'> <i class='fas fa-edit'></i> </a>";
                $deleteBtn = "<a href='" . route('company.jobs.destroy', $query->id) . "' class= 'btn btn-danger ml-3 delete-item'><i class='fas fa-trash'></i> </a>";

                return $editBtn . $deleteBtn;
            })

            ->addColumn('category', function ($query) {

              return $query->category->name;

            })

            ->addColumn('status', function ($query) {
                if ($query->status == 'active') {

                    return '<i class="badge bg-success">Approved<i/>';
                } else {

                    return '<i class="badge bg-warning">Pending<i/>';
                }
            })

            ->rawColumns(['action', 'status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Job $model): QueryBuilder
    {
        return $model->where('user_id', Auth::user()->id)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('job-table')
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
            Column::make('name'),
            Column::make('address'),
            Column::make('salary'),
            Column::make('category'),
            Column::make('end_date'),
            Column::make('requirement'),
            Column::make('office_from'),
            Column::make('office_time'),
            Column::make('status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(150)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Job_' . date('YmdHis');
    }
}
