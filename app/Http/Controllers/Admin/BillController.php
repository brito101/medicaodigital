<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BillRequest;
use App\Models\Bill;
use App\Models\Complex;
use App\Models\Views\Bill as ViewsBill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('Listar Contas')) {
            abort(403, 'Acesso não autorizado');
        }

        $bills = ViewsBill::orderBy('date_ref', 'desc')->get();

        if ($request->ajax()) {
            return Datatables::of($bills)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a class="btn btn-xs btn-primary mx-1 shadow" title="Editar" href="bills/' . $row->id . '/edit"><i class="fa fa-lg fa-fw fa-pen"></i></a>' . '<a class="btn btn-xs btn-danger mx-1 shadow" title="Excluir" href="bills/destroy/' . $row->id . '" onclick="return confirm(\'Confirma a exclusão desta conta?\')"><i class="fa fa-lg fa-fw fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.bills.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->hasPermissionTo('Criar Contas')) {
            abort(403, 'Acesso não autorizado');
        }

        $complexes = Complex::select('id', 'name')->get();

        return view('admin.bills.create', compact('complexes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BillRequest $request)
    {
        if (!Auth::user()->hasPermissionTo('Criar Contas')) {
            abort(403, 'Acesso não autorizado');
        }

        $bill = Bill::create($request->all());

        if ($bill->save()) {
            return redirect()
                ->route('admin.bills.index')
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
        if (!Auth::user()->hasPermissionTo('Editar Contas')) {
            abort(403, 'Acesso não autorizado');
        }

        $bill = Bill::find($id);

        if (!$bill) {
            abort(403, 'Acesso não autorizado');
        }

        $complexes = Complex::select('id', 'name')->get();

        return view('admin.bills.edit', compact('complexes', 'bill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BillRequest $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('Editar Contas')) {
            abort(403, 'Acesso não autorizado');
        }

        $bill = Bill::find($id);

        if (!$bill) {
            abort(403, 'Acesso não autorizado');
        }

        if ($bill->update($request->all())) {
            return redirect()
                ->route('admin.bills.index')
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
        if (!Auth::user()->hasPermissionTo('Excluir Contas')) {
            abort(403, 'Acesso não autorizado');
        }

        $bill = Bill::find($id);

        if (!$bill) {
            abort(403, 'Acesso não autorizado');
        }

        if ($bill->delete()) {
            return redirect()
                ->route('admin.bills.index')
                ->with('success', 'Exclusão realizada!');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao cadastrar!');
        }
    }
}
