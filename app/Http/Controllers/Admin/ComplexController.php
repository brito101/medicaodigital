<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ComplexRequest;
use App\Models\Apartment;
use App\Models\Block;
use App\Models\Complex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;

class ComplexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('Listar Condomínios')) {
            abort(403, 'Acesso não autorizado');
        }

        $complexes = Complex::query();

        if ($request->ajax()) {
            return Datatables::of($complexes)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a class="btn btn-xs btn-primary mx-1 shadow" title="Editar" href="complexes/' . $row->id . '/edit"><i class="fa fa-lg fa-fw fa-pen"></i></a>' . '<a class="btn btn-xs btn-danger mx-1 shadow" title="Excluir" href="complexes/destroy/' . $row->id . '" onclick="return confirm(\'Confirma a exclusão deste condomínio?\')"><i class="fa fa-lg fa-fw fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.complexes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->hasPermissionTo('Criar Condomínios')) {
            abort(403, 'Acesso não autorizado');
        }

        return view('admin.complexes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComplexRequest $request)
    {
        if (!Auth::user()->hasPermissionTo('Criar Condomínios')) {
            abort(403, 'Acesso não autorizado');
        }

        $complex = Complex::create($request->all());

        if ($complex->save()) {
            return redirect()
                ->route('admin.complexes.index')
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
        if (!Auth::user()->hasPermissionTo('Editar Condomínios')) {
            abort(403, 'Acesso não autorizado');
        }

        $complex = Complex::find($id);

        if (!$complex) {
            abort(403, 'Acesso não autorizado');
        }

        return view('admin.complexes.edit', \compact('complex'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ComplexRequest $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('Editar Condomínios')) {
            abort(403, 'Acesso não autorizado');
        }

        $complex = Complex::find($id);

        if (!$complex) {
            abort(403, 'Acesso não autorizado');
        }

        if ($complex->update($request->all())) {
            return redirect()
                ->route('admin.complexes.index')
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
        if (!Auth::user()->hasPermissionTo('Excluir Condomínios')) {
            abort(403, 'Acesso não autorizado');
        }

        $complex = Complex::find($id);

        if (!$complex) {
            abort(403, 'Acesso não autorizado');
        }

        $blocks = Block::where('complex_id', $complex->id)->get();

        if ($complex->delete()) {
            foreach ($blocks as $block) {
                $apartments = Apartment::where('block_id', $block->id)->get();
                foreach ($apartments as $apartment) {
                    $apartment->delete();
                }
                $block->delete();
            }
            return redirect()
                ->route('admin.complexes.index')
                ->with('success', 'Exclusão realizada!');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao cadastrar!');
        }
    }
}
