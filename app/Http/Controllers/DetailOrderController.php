<?php

namespace App\Http\Controllers;

use App\Models\DetailOrder;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DetailOrderController extends Controller
{
    public function index()
    {
        return view('detailorder.index');
    }

    public function create()
    {
        return view('detailorder.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'awb_number' => 'required',
            'mo_number' => 'required',
            'item_code' => 'required',
            'item_description' => 'required',
        ]);

        DetailOrder::create($request->all());

        return redirect()->route('detailorder.index')->with('success', 'Detail Order berhasil ditambahkan.');
    }

    public function edit(DetailOrder $detailorder)
    {
        return view('detailorder.edit', compact('detailorder'));
    }

    public function update(Request $request, DetailOrder $detailorder)
    {
        $detailorder->update($request->all());

        return redirect()->route('detailorder.index')->with('success', 'Detail Order berhasil diperbarui.');
    }

    public function destroy(DetailOrder $detailorder)
    {
        $detailorder->delete();

        return redirect()->route('detailorder.index')->with('success', 'Detail Order berhasil dihapus.');
    }
    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data = DetailOrder::query();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<a href="' . route('template.edit', $row->id) . '" class="text-blue-500">Edit</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function show(DetailOrder $data)
    {
        return view('detailorder.show', compact('data'));
    }
}
