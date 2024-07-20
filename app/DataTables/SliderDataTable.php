<?php

namespace App\DataTables;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SliderDataTable extends DataTable
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
                $edit = '<a href="' . route('admin.Slider.edit', $query->id) . '" class="btn btn-warning fas fa-edit mr-2"></a>';
                $delete = '<a href="' . route('admin.Slider.destroy', $query->id) . '" class="btn btn-danger delete-item fas fa-trash "></a>';
                return $edit . $delete;
            })->addColumn('image', function ($query) {
                return '<img width="100px" height="60px" style="object-fit:cover" src="' . asset($query->image) . '">';
            })->addColumn('status',function ($query){
                if($query->status === 1) {
                    return '<div class="badge badge-success">Active</div>';
                } else {
                    return '<div class="badge badge-danger">Inactive</div>';
                }
            })
            ->rawColumns(['image','action','status']) // rawColumns => Render HTML and not escape it
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Slider $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('slider-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(0) // 0 => first column , 1 => Second Column
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
            Column::make('id')->width(60),
            Column::make('image')->width(100)->height(50),
            Column::make('title')->width(300),
            Column::make('sub_title')->width(300),
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
        return 'Slider_' . date('YmdHis');
    }
}
