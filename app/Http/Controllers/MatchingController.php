<?php

namespace App\Http\Controllers;

use App\Models\Matching;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class MatchingController extends Controller
{
    public function index()
    {
        return view('matching.index');
    }

    public function create()
    {
        return view('matching.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cabang' => 'required',
            'mo_number' => 'required',
            'dn_number' => 'required|numeric',
            'item_code' => 'required',
            'branch' => 'required',
            'awb_number' => 'required',
            'receive_date' => 'required|date',
            'receive_name' => 'required',
            'receve_time' => 'required|numeric',
            'expedition' => 'required',
            'is_need_matching' => 'required|boolean',
        ]);

        Matching::create($request->all());

        return redirect()->route('matching.index')->with('success', 'Matching berhasil ditambahkan.');
    }

    public function edit(Matching $matching)
    {
        return view('matching.edit', compact('matching'));
    }

    public function update(Request $request, Matching $matching)
    {
        $matching->update($request->all());

        return redirect()->route('matching.index')->with('success', 'Matching berhasil diperbarui.');
    }

    public function destroy(Matching $matching)
    {
        $matching->delete();

        return redirect()->route('matching.index')->with('success', 'Matching berhasil dihapus.');
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data = Matching::query();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<a href="' . route('template.edit', $row->id) . '" class="text-blue-500">Edit</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function show(Matching $data)
    {
        return view('matching.show', compact('data'));
    }
}
