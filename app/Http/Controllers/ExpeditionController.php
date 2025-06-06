<?php

namespace App\Http\Controllers;

use App\Models\Expedition;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;

class ExpeditionController extends Controller
{
    public function index()
    {
        return view('expedition.index');
    }

    public function create()
    {
        return view('expedition.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'expedition_name' => 'required|string|max:100|unique:tbl_expedisi,expedition_name',
        ]);

        $data = Expedition::create($request->all());

        return response()->json(['success' => true, 'data' => $data]);
    }

    public function edit(Expedition $expedition)
    {
        return view('expedition.edit', compact('expedition'));
    }

    public function update(Request $request, Expedition $expedition)
    {
        $request->validate([
            'expedition_name' => 'required|string|max:100',
        ]);

        $expedition->update($request->all());

        return redirect()->route('expedition.index')->with('success', 'Data ekspedisi berhasil diperbarui.');
    }

    public function destroy(Expedition $expedition)
    {
        $expedition->delete();

        return redirect()->route('expedition.index')->with('success', 'Data ekspedisi berhasil dihapus.');
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data = Expedition::query();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<a href="' . route('expedition.edit', $row->id) . '" class="text-blue-500">Edit</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return response()->json(['message' => 'Invalid request'], 400);
    }

    public function show(Expedition $data)
    {
        return view('expedition.show', compact('data'));
    }
}
