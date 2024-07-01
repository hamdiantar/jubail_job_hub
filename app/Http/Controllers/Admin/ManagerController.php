<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ManagerController extends Controller
{
    public function index()
    {
        $managers = Admin::all();
        return view('admin.managers.list', compact('managers'));
    }

    public function create()
    {
        return view('admin.managers.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'username' => 'required|string|unique:admins,username',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.managers.create')
                ->withErrors($validator)
                ->withInput();
        }

        Admin::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.managers.index')
            ->with('success', 'Manager created successfully.');
    }

    public function show($id)
    {
        $manager = Admin::findOrFail($id);
        return view('admin.managers.show', compact('manager'));
    }

    public function edit($id)
    {
        $manager = Admin::findOrFail($id);
        return view('admin.managers.edit', compact('manager'));
    }

    public function update(Request $request, $id)
    {
        $manager = Admin::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $manager->admin_id . ',admin_id',
            'username' => 'required|string|unique:admins,username,' . $manager->admin_id . ',admin_id',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->route('managers.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }
        $data= $request->all();
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        } else{
            unset($data['password']);
        }
        $manager->update($data);


        return redirect()->route('admin.managers.index')
            ->with('success', 'Manager updated successfully.');
    }

    public function destroy($id)
    {
        $manager = Admin::findOrFail($id);
        $manager->delete();

        return redirect()->route('admin.managers.index')
            ->with('success', 'Manager deleted successfully.');
    }
}
