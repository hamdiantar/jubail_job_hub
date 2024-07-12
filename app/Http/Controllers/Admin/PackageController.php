<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Admin;
use Illuminate\Support\Facades\Validator;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::with('admin')->withCount('subscriptions')->get();
        return view('admin.packages.list', compact('packages'));
    }

    public function create()
    {
        $admins = Admin::all();
        return view('admin.packages.create', compact('admins'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|string|in:Monthly,Quarterly,Yearly',
            'price' => 'required|numeric|min:1',
            'period' => 'required|numeric|min:1',
            'description' => 'required|string',
            'is_available' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.packages.create')
                ->withErrors($validator)
                ->withInput();
        }
        $data = $request->all();
        $data['admin_id'] = auth('admin')->user()->admin_id;

        Package::create($data);

        return redirect()->route('admin.packages.index')
            ->with('success', 'Package created successfully.');
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);
        $admins = Admin::all();
        return view('admin.packages.edit', compact('package', 'admins'));
    }

    public function update(Request $request, $id)
    {
        $package = Package::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'price' => 'required|numeric|min:1',
            'period' => 'required|numeric|min:1',
            'type' => 'required|string|in:Monthly,Quarterly,Yearly',
            'description' => 'required|string',
            'is_available' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.packages.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $package->update($request->only('price', 'type', 'description', 'is_available'));

        return redirect()->route('admin.packages.index')
            ->with('success', 'Package updated successfully.');
    }

    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        if (!$package->subscriptions()->exists()) {
            return redirect()->route('admin.packages.index')
                ->with('error', 'Cannot delete package with active subscriptions.');
        }
        $package->delete();
        return redirect()->route('admin.packages.index')
            ->with('success', 'Package deleted successfully.');
    }
}
