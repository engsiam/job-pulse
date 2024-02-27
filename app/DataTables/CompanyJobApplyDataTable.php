<?php

namespace App\DataTables;

use App\Models\JobApply;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;

class CompanyJobApplyDataTable extends DataTable
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
            $viewBtn = "<a href='" . route('company.candidate.cv', $query->user_id) . "' class='btn btn-danger' target='_blank'>View</a>";
        
            $approveBtn = "<form id='approveForm{$query->id}' method='POST' action='" . route('company.job-apply-approve', $query->id) . "' style='display: inline;'>
                " . csrf_field() . "
                <button type='button'' class='approve btn btn-info ml-3'>Approve</button>
              </form>";
        
            $rejecBtn = "<form id='rejectForm{$query->id}' method='POST' action='" . route('company.job-apply-reject', $query->id) . "' style='display: inline;'>
              " . csrf_field() . "
              <button type='button'' class='reject btn btn-danger ml-3'>Reject</button>
            </form>";
        
            return $viewBtn . $approveBtn . $rejecBtn;
        })
        
        
        ->addColumn('status', function ($query) {
            if ($query->status == 'approved') {

                return '<i class="badge bg-success">Approved<i/>';
            } elseif ($query->status == 'rejected') {

                return '<i class="badge bg-danger">Rejected<i/>';
            } else {
                return '<i class="badge bg-info">Applied<i/>';
            }
        })
        
            
        ->addColumn('candidate', function ($query) {

            return $query->user->name;

          })

        ->addColumn('post', function ($query) {

            return $query->job->name;

          })

         ->rawColumns(['action', 'status'])
         ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(JobApply $model): QueryBuilder
    {
        return $model->where('company_id', auth()->user()->id)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('companyjobapply-table')
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
            Column::make('candidate'),
            Column::make('post'),
            Column::make('status'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(300)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'CompanyJobApply_' . date('YmdHis');
    }
}
