<?php

namespace App\DataTables;

use App\Models\DailyOffer;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DailyOfferDataTable extends DataTable
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
                $edit = '<a href="' . route('admin.daily-offer.edit', $query->id) . '" class="btn btn-warning fas fa-edit mr-2"></a>';
                $delete = '<a href="' . route('admin.daily-offer.destroy', $query->id) . '" class="btn btn-danger delete-item fas fa-trash "></a>';
                return $edit . $delete;
            })->addColumn('image', function ($query) {
                return '<img width="70px" height="60px" style="object-fit:cover;" src="' . asset($query->product->thumb_image) . '">';
            })->addColumn('status', function ($query) {
                if ($query->status == 1) {
                    return '<div class="badge badge-success">Active</div>';
                } else {
                    return '<div class="badge badge-danger">Inactive</div>';
                }
            })
            ->addColumn('name',function($query){
                return $query->product->name;
            })
            ->rawColumns(['image', 'action', 'status','name'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(DailyOffer $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('dailyoffer-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
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
        return 'DailyOffer_' . date('YmdHis');
    }
}
