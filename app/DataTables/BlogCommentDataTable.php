<?php

namespace App\DataTables;

use App\Models\BlogComment;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BlogCommentDataTable extends DataTable
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

                $edit = '<form action="" data-id='.$query->id.' method="POST" class="d-inline-block update_status_form">
                    '.csrf_field().'
                    '.method_field('PUT').'
                    <input type="hidden" name="status" value="'. ($query->status == 1? 0 : 1). '">
                    <button type="submit" class="btn btn-'. ($query->status == 1 ? 'success fas fa-eye' :'warning fas fa-eye-slash'). '"></button>
                </form>';

                $delete = '<a href="' . route('admin.blog-comments.destroy', $query->id) . '" class="btn btn-danger mx-2 delete-item fas fa-trash "></a>';
                return $edit . $delete;
            })
            ->addColumn('blog_title', function ($query) {
                return $query->blog->title;
            })
            ->addColumn('user_name', function ($query) {
                return $query->user->name;
            })
            ->addColumn('created_at', function ($query) {
                return date("Y-m-d |  h:i", strtotime($query->created_at));
            })
            ->addColumn('status', function ($query) {
                if ($query->status == 1) {
                    return '<div class="badge badge-success">Approved</div>';
                } else {
                    return '<div class="badge badge-warning">Pending</div>';
                }
            })
            ->rawColumns(['action', 'status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(BlogComment $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('blogcomment-table')
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
            Column::make('blog_title'),
            Column::make('user_name'),
            Column::make('comment'),
            Column::make('created_at'),
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
        return 'BlogComment_' . date('YmdHis');
    }
}
