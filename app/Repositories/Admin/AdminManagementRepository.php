<?php

namespace App\Repositories\Admin;

use App\DataTables\AdminManagementDataTable;
use App\Interfaces\Admin\AdminManagementRepositoryInterface;
use App\Models\User;
use App\Traits\UploadFileTrait;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AdminManagementRepository implements AdminManagementRepositoryInterface
{
    use UploadFileTrait;
    public function index(AdminManagementDataTable $dataTable)
    {
        return $dataTable->render('Admin.Admin-Management.index');
    }
    public function create()
    {
        return view('Admin.Admin-Management.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:5', 'max:30'],
            'email' => ['required', 'email', 'max:50', 'unique:users,email'],
            'role' => ['required', 'in:admin'],
            'password' => ['required', 'min:5', 'max:30', 'confirmed'],
        ]);

        User::create([
            'avatar' => asset('uploads/Default/avatar-2.png'),
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->password)
        ]);

        toastr()->success('Admin Created Successfully');
        return redirect()->route('admin.admin-management.index');
    }
    public function edit(string $id)
    {
        $admin = User::where('role', 'admin')->findOrFail($id);
        return view('Admin.Admin-Management.edit', compact('admin'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'min:5', 'max:30'],
            'email' => ['required', 'email', 'max:50', 'unique:users,email,' . $id],
            'role' => ['required', 'in:admin'],
        ]);

        $admin = User::where('role', 'admin')->findOrFail($id);
        if ($request->has('password') && $request->filled('password')) {
            $request->validate([
                'password' => ['required', 'min:8', 'max:30', 'confirmed'],
            ]);
            $admin->update(['password' => bcrypt($request->password)]);
        }

        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        toastr()->success('Admin Updated Successfully');
        return redirect()->route('admin.admin-management.index');
    }
    public function destroy(string $id)
    {
        try {
            $admin = User::where('role', 'admin')->where('id', '!=', 1)->findOrFail($id);
            $this->removeImage($admin->avatar);
            $admin->delete();
            return response(['status' => 'success', 'message' => 'Admin Deleted Successfully']);
        } catch (\Exception $e) {
            return redirect()->back();
            return response(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
