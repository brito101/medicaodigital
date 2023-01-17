<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MeterRequest;
use App\Models\Apartment;
use App\Models\Meter;
use App\Models\Views\Meter as ViewsMeter;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;

class MeterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('Listar Medidores')) {
            abort(403, 'Acesso não autorizado');
        }

        $meters = ViewsMeter::query();

        if ($request->ajax()) {
            return Datatables::of($meters)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a class="btn btn-xs btn-primary mx-1 shadow" title="Editar" href="meters/' . $row->id . '/edit"><i class="fa fa-lg fa-fw fa-pen"></i></a>' . '<a class="btn btn-xs btn-danger mx-1 shadow" title="Excluir" href="meters/destroy/' . $row->id . '" onclick="return confirm(\'Confirma a exclusão deste medidor?\')"><i class="fa fa-lg fa-fw fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.meters.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->hasPermissionTo('Criar Medidores')) {
            abort(403, 'Acesso não autorizado');
        }

        $apartments = Apartment::with('block')->get();

        return view('admin.meters.create', compact('apartments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MeterRequest $request)
    {
        if (!Auth::user()->hasPermissionTo('Criar Medidores')) {
            abort(403, 'Acesso não autorizado');
        }

        $meter = Meter::create($request->all());

        if ($meter->save()) {
            return redirect()
                ->route('admin.meters.index')
                ->with('success', 'Cadastro realizado!');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao cadastrar!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->hasPermissionTo('Editar Medidores')) {
            abort(403, 'Acesso não autorizado');
        }

        $meter = Meter::find($id);

        if (!$meter) {
            abort(403, 'Acesso não autorizado');
        }

        $apartments = Apartment::with('block')->get();

        return view('admin.meters.edit', \compact('meter', 'apartments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MeterRequest $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('Editar Medidores')) {
            abort(403, 'Acesso não autorizado');
        }

        $meter = Meter::find($id);

        if (!$meter) {
            abort(403, 'Acesso não autorizado');
        }

        if ($meter->update($request->all())) {
            return redirect()
                ->route('admin.meters.index')
                ->with('success', 'Edição realizada!');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao cadastrar!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->hasPermissionTo('Excluir Medidores')) {
            abort(403, 'Acesso não autorizado');
        }

        $meter = Meter::find($id);

        if (!$meter) {
            abort(403, 'Acesso não autorizado');
        }

        if ($meter->delete()) {
            return redirect()
                ->route('admin.meters.index')
                ->with('success', 'Exclusão realizada!');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao cadastrar!');
        }
    }
}
