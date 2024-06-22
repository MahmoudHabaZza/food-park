<?php

namespace App\DataTables;

use App\Models\Order;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrderDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('user_name', function ($query) {
                return $query?->user->name;
            })
            ->addColumn('order_status', function ($query) {
                if ($query->order_status === 'delivered') {
                    return '<div class="badge badge-success">Delivered</div>';
                } elseif ($query->order_status === 'declined') {
                    return '<div class="badge badge-danger">Declined</div>';
                } else {
                    return "<div class='badge badge-warning'>$query->order_status</div>";
                }
            })
            ->addColumn('payment_status', function ($query) {
                if ($query->payment_status === 'pending') {
                    return '<div class="badge badge-danger">pending</div>';
                } elseif (strtoupper($query->payment_status) === 'COMPLETED') {
                    return '<div class="badge badge-success">COMPLETED</div>';
                } else {
                    return '<div class="badge badge-success">' . $query->payment_status . '</div>';
                }
            })
            ->addColumn('created_at', function ($query) {
                return date("d-m-Y H:m", strtotime($query->created_at));
            })
            ->addColumn('final_total', function ($query) {
                return $query->final_total . ' ' . strtoupper($query->currency_name);
            })
            ->addColumn('action', function ($query) {
                $show = '<a href=' . route('admin.order.show', $query->id) . ' class="btn btn-primary">
                <i class="fas fa-eye"></i></a>';
                $status = '<a href="javascript:;" data-toggle="modal" data-target="#order_status" class="btn btn-warning fas fa-truck-loading mx-2 order_status_btn" data-id='.$query->id.'></a>';
                $delete = '<a href="' . route('admin.Slider.destroy', $query->id) . '" class="btn btn-danger delete-item fas fa-trash "></a>';
                return $show.$status.$delete;
            })
            ->rawColumns(['action', 'user_id', 'order_status', 'payment_status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Order $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('order-table')
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
            Column::make('invoice_id'),
            Column::make('user_name'),
            Column::make('product_qty'),
            Column::make('final_total'),
            Column::make('order_status'),
            Column::make('payment_status'),
            Column::make('created_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(170)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Order_' . date('YmdHis');
    }
}
