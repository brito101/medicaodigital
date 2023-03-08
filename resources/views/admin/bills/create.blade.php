@extends('adminlte::page')
@section('plugins.select2', true)

@section('title', '- Cadastro de Conta')


@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-fw fa-money-bill"></i> Nova Conta</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.bills.index') }}">Contas por Condomínios</a>
                        </li>
                        <li class="breadcrumb-item active">Nova Conta</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    @include('components.alert')

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Dados Cadastrais da Conta</h3>
                        </div>

                        <form method="POST" action="{{ route('admin.bills.store') }}">
                            @csrf
                            <div class="card-body">

                                <div class="d-flex flex-wrap justify-content-start">
                                    <div class="col-12 col-md-3 form-group px-0 pr-md-2">
                                        <label for="date_ref">Data da Leitura</label>
                                        <input type="date" class="form-control" id="date_ref" name="date_ref"
                                            value="{{ old('date_ref') }}" required>
                                    </div>

                                    <div class="col-12 col-md-3 form-group px-0 px-md-2">
                                        <label for="consumption">Consumo</label>
                                        <input type="text" class="form-control float" id="consumption" name="consumption"
                                            value="{{ old('consumption') }}" required>
                                    </div>

                                    <div class="col-12 col-md-3 form-group px-0 px-md-2">
                                        <label for="value">Valor</label>
                                        <input type="text" class="form-control money_format_2" id="value"
                                            name="value" value="{{ old('value') }}" required>
                                    </div>

                                    <div class="col-12 col-md-3 form-group px-0 pl-md-2">
                                        <label for="complex_id">Condomínio</label>
                                        <x-adminlte-select2 name="complex_id" required>
                                            @foreach ($complexes as $complex)
                                                <option
                                                    {{ old('complex_id') == $complex->id ? 'selected' : '' }}value="{{ $complex->id }}">
                                                    {{ $complex->name }}</option>
                                            @endforeach
                                        </x-adminlte-select2>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom_js')
    <script src="{{ asset('vendor/jquery/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('js/float.js') }}"></script>
    <script src="{{ asset('js/money.js') }}"></script>
@endsection
