<?php

namespace App\DataTables;

use App\Models\Product;
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
            ->addColumn('action', function ($query) {
                $edit = '<a href="' . route('admin.product.edit', $query->id) . '" class="btn btn-warning fas fa-edit "></a>';
                $delete = '<a href="' . route('admin.product.destroy', $query->id) . '" class="btn btn-danger mx-2 delete-item fas fa-trash "></a>';
                $more = '<div class="btn-group dropbottom">
            <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cog"></i></button>
            <div class="dropdown-menu dropbottom" x-placement="left-start" style="position: absolute; transform: translate3d(-2px, 0px, 0px); top: 0px; left: 0px; will-change: transform;">
              <a class="dropdown-item" href="#">Action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Separated link</a>
            </div>
          </div>';
                return $edit . $delete . $more;
            })->addColumn('thumb_image', function ($query) {
                return "<img src='" . asset($query->thumb_image) . "'  style='width:80px;height:80px;' />";
            })
            ->addColumn('price', function ($query) {
                return '$' . round($query->price, 2);
            })
            ->addColumn('offer_price', function ($query) {
                return '$' . round($query->offer_price, 2);
            })
            ->addColumn('status', function ($query) {
                if ($query->status === 1) {
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
            ->rawColumns(['thumb_image', 'action', 'status', 'show_at_home', 'price'])
            ->setRowId('id');
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
            Column::make('thumb_image'),
            Column::make('name'),
            Column::make('price'),
            Column::make('offer_price'),
            Column::make('status'),
            Column::make('show_at_home'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(200)
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
