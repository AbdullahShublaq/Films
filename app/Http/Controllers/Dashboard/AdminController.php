<?php

namespace App\Http\Controllers\Dashboard;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:create_admins,guard:admin'])->only(['create', 'store']);
        $this->middleware(['permission:read_admins,guard:admin'])->only('index');
        $this->middleware(['permission:update_admins,guard:admin'])->only(['edit', 'update']);
        $this->middleware(['permission:delete_admins,guard:admin'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $admins = Admin::whereRoleIs('admin')->where(function ($query) use ($request) {
            $query->when($request->search, function ($q) use ($request) {
                return $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        })->latest()->paginate(10);

        return view('dashboard.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $attributes = $request->validate([
            'name' => 'required|string|max:20|min:5',
            'email' => 'required|email|string|unique:admins',
            'avatar' => 'image',
            'password' => 'required|string|confirmed|min:6',
            'permissions' => 'required|min:1'
        ]);

        if ($request->avatar) {
            $attributes['avatar'] = $request->avatar->store('admin_avatars');
        }

        $admin = Admin::create([
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'password' => bcrypt($attributes['password']),
            'avatar' => $attributes['avatar'] ?? NULL
        ]);
        $admin->attachRole('admin');
        $admin->syncPermissions($attributes['permissions']);

        session()->flash('success', 'Admin Added Successfully');
        return redirect()->route('dashboard.admins.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
        if (!auth()->guard('admin')->user()->hasRole('super_admin') && $admin->hasRole('super_admin')) {
            abort('403');
        }
        return view('dashboard.admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
        if (!auth()->guard('admin')->user()->hasRole('super_admin') && $admin->hasRole('super_admin')) {
            abort('403');
        }

        $attributes = $request->validate([
            'name' => 'required|string|max:20|min:5',
            'email' => ['required', 'email', 'string', Rule::unique('admins')->ignore($admin)],
            'avatar' => 'image',
            'password' => 'nullable|string|confirmed|min:6',
            'permissions' => 'required|min:1'
        ]);

        if ($request->avatar) {
            $adminAvatar = $admin->getAttributes()['avatar'];
            if (isset($adminAvatar) && $adminAvatar) {
                Storage::delete($adminAvatar);
            }

            $attributes['avatar'] = $request->avatar->store('admin_avatars');
        }
        if ($request->password) {
            $attributes['password'] = bcrypt($attributes['password']);
        } else {
            unset($attributes['password']);
        }

        $admin->update($attributes);
        $admin->syncPermissions($attributes['permissions']);

        session()->flash('success', 'Admin Updated Successfully');
        return redirect()->route('dashboard.admins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin $admin
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Admin $admin)
    {
        //
        $admin->delete();

        session()->flash('success', 'Admin Deleted Successfully');
        return redirect()->route('dashboard.admins.index');
    }
}
