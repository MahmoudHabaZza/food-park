<?php

namespace App\DataTables;

use App\Models\Chef;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ChefDataTable extends DataTable
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
                $edit = '<a href="' . route('admin.chef.edit', $query->id) . '" class="btn btn-warning fas fa-edit "></a>';
                $delete = '<a href="' . route('admin.chef.destroy', $query->id) . '" class="btn btn-danger mx-2 delete-item fas fa-trash "></a>';
                return $edit . $delete;
            })
            ->addColumn('image', function ($query) {
                return "<img src='" . asset($query->image) . "'  style='width:80px;height:80px;' />";
            })
            ->addColumn('status', function ($query) {
                if ($query->status == 1) {
                    return '<div class="badge badge-success">Active</div>';
                } else {
                    return '<div class="badge badge-danger">Inactive</div>';
                }
            })
            ->addColumn('show_at_home', function ($query) {
                if ($query->show_at_home === 1) {
                    return '<div class="badge badge-primary">Yes</div>';
                } else {
                    return '<div class="badge badge-danger">No</div>';
                }
            })
            ->rawColumns(['action','image','status','show_at_home'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Chef $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('chef-table')
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
            Column::make('image'),
            Column::make('name'),
            Column::make('title'),
            Column::make('status'),
            Column::make('show_at_home'),
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
        return 'Chef_' . date('YmdHis');
    }
}
