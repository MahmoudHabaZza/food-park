<?php
namespace App\Interfaces\Admin;

use App\DataTables\AdminManagementDataTable;
use Illuminate\Http\Request;

interface AdminManagementRepositoryInterface {
    public function index(AdminManagementDataTable $dataTable);
    public function create();
    public function store(Request $request);
    public function edit(string $id);
    public function update(Request $request, string $id);
    public function destroy(string $id);
}
