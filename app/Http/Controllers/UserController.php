<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use App\Models\Role;


class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function create()
    {
        $roles = Role::all(); // asumsikan model Role kamu sudah benar
        return view('user.create', compact('roles'));
    }

    public function getData(Request $request)
    {
        $data = User::with('role')->get();

        return DataTables::of($data)
            ->addIndexColumn() // <--- ini WAJIB untuk DT_RowIndex
            ->addColumn('role', function ($user) {
                return $user->role ? $user->role->name : '-';
            })
            ->make(true);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|unique:tbl_user,nik',
            'name' => 'required',
            'role_id' => 'required|exists:tbl_role,id', // pastikan role_id valid
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'nik' => $validated['nik'],
            'name' => $validated['name'],
            'role_id' => $validated['role_id'],
            'password' => Hash::make($validated['password']),
        ]);

        return response()->json(['success' => true, 'user' => $user]);
    }
}
