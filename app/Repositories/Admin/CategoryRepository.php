<?php

namespace App\Repositories\Admin;

use App\DataTables\CategoryDataTable;
use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Http\Requests\Admin\CategoryUpdatedRequest;
use App\Interfaces\Admin\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Str;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function index(CategoryDataTable $dataTable): View | JsonResponse
    {
        return $dataTable->render('admin.Product.Category.index');
    }

    public function create(): View
    {
        return view('Admin.Product.Category.create');
    }
    public function store(CategoryStoreRequest $request): RedirectResponse
    {
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => $request->status,
            'show_at_home' => $request->show_at_home,

        ]);

        toastr()->success('Category Created Successfully');
        return to_route('admin.category.index');
    }
    public function edit(string $id): View
    {
        $category = Category::findOrFail($id);
        return view('Admin.Product.Category.edit', compact('category'));
    }
    public function update(CategoryUpdatedRequest $request, string $id): RedirectResponse
    {
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => $request->status,
            'show_at_home' => $request->show_at_home
        ]);

        toastr()->success('Category Updated Successfully');
        return to_route('admin.category.index');
    }
    public function destroy(string $id): Response
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            return response(['status' => 'success', 'message' => 'Category Deleted Successfully']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Something Went Wrong!']);
        }
    }
}
