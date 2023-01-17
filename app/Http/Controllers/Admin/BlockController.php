<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlockRequest;
use App\Models\Apartment;
use App\Models\Block;
use App\Models\Complex;
use App\Models\Meter;
use App\Models\Resident;
use App\Models\Views\Block as ViewsBlock;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('Listar Blocos')) {
            abort(403, 'Acesso não autorizado');
        }

        $blocks = ViewsBlock::query();

        if ($request->ajax()) {
            return Datatables::of($blocks)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a class="btn btn-xs btn-primary mx-1 shadow" title="Editar" href="blocks/' . $row->id . '/edit"><i class="fa fa-lg fa-fw fa-pen"></i></a>' . '<a class="btn btn-xs btn-danger mx-1 shadow" title="Excluir" href="blocks/destroy/' . $row->id . '" onclick="return confirm(\'Confirma a exclusão deste bloco?\')"><i class="fa fa-lg fa-fw fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.blocks.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->hasPermissionTo('Criar Blocos')) {
            abort(403, 'Acesso não autorizado');
        }

        $complexes = Complex::select('id', 'name')->get();

        return view('admin.blocks.create', compact('complexes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlockRequest $request)
    {
        if (!Auth::user()->hasPermissionTo('Criar Blocos')) {
            abort(403, 'Acesso não autorizado');
        }

        $block = Block::create($request->all());

        if ($block->save()) {
            return redirect()
                ->route('admin.blocks.index')
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
        if (!Auth::user()->hasPermissionTo('Editar Blocos')) {
            abort(403, 'Acesso não autorizado');
        }

        $block = Block::find($id);

        if (!$block) {
            abort(403, 'Acesso não autorizado');
        }

        $complexes = Complex::select('id', 'name')->get();

        return view('admin.blocks.edit', \compact('block', 'complexes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlockRequest $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('Editar Blocos')) {
            abort(403, 'Acesso não autorizado');
        }

        $block = Block::find($id);

        if (!$block) {
            abort(403, 'Acesso não autorizado');
        }

        if ($block->update($request->all())) {
            return redirect()
                ->route('admin.blocks.index')
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
        if (!Auth::user()->hasPermissionTo('Excluir Blocos')) {
            abort(403, 'Acesso não autorizado');
        }

        $block = Block::find($id);

        if (!$block) {
            abort(403, 'Acesso não autorizado');
        }

        $apartments = Apartment::where('block_id', $block->id)->get();

        if ($block->delete()) {
            foreach ($apartments as $apartment) {
                $meters = Meter::where('apartment_id', $apartment->id)->get();
                foreach ($meters as $meter) {
                    $meter->delete();
                }
                $residents = Resident::where('apartment_id', $apartment->id)->get();
                foreach ($residents as $resident) {
                    $resident->delete();
                }
                $apartment->delete();
            }
            return redirect()
                ->route('admin.blocks.index')
                ->with('success', 'Exclusão realizada!');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao cadastrar!');
        }
    }
}
