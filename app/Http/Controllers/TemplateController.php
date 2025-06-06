<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Models\Expedition;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index()
    {
        return view('template.index');
    }

    public function create()
    {
        $expeditions = Expedition::all();
        return view('template.create', compact('expeditions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cabang' => 'required|string|max:100',
            'mo_number' => 'required|string|max:50',
            'dn_number' => 'required|string|max:50',
            'item_code' => 'required|string|max:50',
            'item_description' => 'nullable|string|max:255',
            'branch' => 'required|string|max:500',
            'awb_number' => 'required|string|max:50',
            'receive_date' => 'required|string',
            'receive_name' => 'required|string|max:50',
            'receve_time' => 'required|numeric',
            'expedition_id' => 'required|exists:tbl_expedisi,id',
            'is_need_matching' => 'required|boolean',
        ]);


        $data = Template::create($request->all());

        return response()->json(['success' => true, 'data' => $data]);
    }

    public function edit(Template $template)
    {
        return view('template.edit', compact('template'));
    }

    public function update(Request $request, Template $template)
    {
        $template->update($request->all());

        return redirect()->route('template.index')->with('success', 'Template berhasil diperbarui.');
    }

    public function destroy(Template $template)
    {
        $template->delete();

        return redirect()->route('template.index')->with('success', 'Template berhasil dihapus.');
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data = Template::query();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('expedition_name', function ($data) {
                    return $data->expedition ? $data->expedition->expedition_name : '-';
                })
                ->editColumn('is_need_matching', function ($row) {
                    return $row->is_need_matching ? 'Yes' : 'No';
                })
                ->addColumn('action', function ($row) {
                    return '<a href="' . route('template.edit', $row->id) . '" class="text-blue-500">Edit</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function show(Template $data)
    {
        return view('template.show', compact('data'));
    }
}
