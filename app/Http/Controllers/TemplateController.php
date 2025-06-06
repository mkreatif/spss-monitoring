<?php

namespace App\Http\Controllers;

use App\Models\Template;
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
        return view('template.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cabang' => 'required',
            'mo_number' => 'required',
            'dn_number' => 'required',
            'item_code' => 'required',
            'branch' => 'required',
            'awb_number' => 'required',
            'receive_date' => 'required|date',
            'receive_name' => 'required',
            'receve_time' => 'required|numeric',
            'expedition_name' => 'required',
        ]);

        Template::create($request->all());

        return redirect()->route('template.index')->with('success', 'Template berhasil ditambahkan.');
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
