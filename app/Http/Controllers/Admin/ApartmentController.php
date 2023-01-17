<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ApartmentRequest;
use App\Models\Apartment;
use App\Models\Block;
use App\Models\Meter;
use App\Models\Resident;
use App\Models\Views\Apartment as ViewsApartment;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('Listar Apartamentos')) {
            abort(403, 'Acesso não autorizado');
        }

        $apartments = ViewsApartment::query();

        if ($request->ajax()) {
            return Datatables::of($apartments)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a class="btn btn-xs btn-primary mx-1 shadow" title="Editar" href="apartments/' . $row->id . '/edit"><i class="fa fa-lg fa-fw fa-pen"></i></a>' . '<a class="btn btn-xs btn-danger mx-1 shadow" title="Excluir" href="apartments/destroy/' . $row->id . '" onclick="return confirm(\'Confirma a exclusão deste apartamento?\')"><i class="fa fa-lg fa-fw fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.apartments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->hasPermissionTo('Criar Apartamentos')) {
            abort(403, 'Acesso não autorizado');
        }

        $blocks = Block::with('complex')->get();

        return view('admin.apartments.create', compact('blocks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApartmentRequest $request)
    {
        if (!Auth::user()->hasPermissionTo('Criar Apartamentos')) {
            abort(403, 'Acesso não autorizado');
        }

        $apartment = Apartment::create($request->all());

        if ($apartment->save()) {
            return redirect()
                ->route('admin.apartments.index')
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
        if (!Auth::user()->hasPermissionTo('Editar Apartamentos')) {
            abort(403, 'Acesso não autorizado');
        }

        $apartment = Apartment::find($id);

        if (!$apartment) {
            abort(403, 'Acesso não autorizado');
        }

        $blocks = Block::with('complex')->get();

        return view('admin.apartments.edit', \compact('apartment', 'blocks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ApartmentRequest $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('Editar Apartamentos')) {
            abort(403, 'Acesso não autorizado');
        }

        $apartment = Apartment::find($id);

        if (!$apartment) {
            abort(403, 'Acesso não autorizado');
        }

        if ($apartment->update($request->all())) {
            return redirect()
                ->route('admin.apartments.index')
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
        if (!Auth::user()->hasPermissionTo('Excluir Apartamentos')) {
            abort(403, 'Acesso não autorizado');
        }

        $apartment = Apartment::find($id);

        if (!$apartment) {
            abort(403, 'Acesso não autorizado');
        }

        if ($apartment->delete()) {
            $meters = Meter::where('apartment_id', $apartment->id)->get();
            foreach ($meters as $meter) {
                $meter->delete();
            }
            $residents = Resident::where('apartment_id', $apartment->id)->get();
            foreach ($residents as $resident) {
                $resident->delete();
            }
            return redirect()
                ->route('admin.apartments.index')
                ->with('success', 'Exclusão realizada!');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao cadastrar!');
        }
    }
}
