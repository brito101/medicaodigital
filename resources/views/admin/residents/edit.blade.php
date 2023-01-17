@extends('adminlte::page')
@section('plugins.select2', true)

@section('title', '- Edição de Morador')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-fw fa-house-user"></i> Editar Morador</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.residents.index') }}">Moradores</a></li>
                        <li class="breadcrumb-item active">Editar Morador</li>
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
                            <h3 class="card-title">Dados Cadastrais do Morador</h3>
                        </div>


                        <form method="POST" action="{{ route('admin.residents.update', ['resident' => $resident->id]) }}">
                            <input type="hidden" name="id" value="{{ $resident->id }}">
                            @method('PUT')
                            @csrf
                            <div class="card-body">

                                <div class="d-flex flex-wrap justify-content-start">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2 mb-0">
                                        <label for="user_id">Morador</label>
                                        <x-adminlte-select2 name="user_id">
                                            @foreach ($users as $user)
                                                <option
                                                    {{ old('user_id') == $user->id ? 'selected' : ($resident->user_id == $user->id ? 'selected' : '') }}
                                                    value="{{ $user->id }}">
                                                    {{ $user->name . ' - E-mail: ' . $user->email }}
                                                </option>
                                            @endforeach
                                        </x-adminlte-select2>
                                    </div>

                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2 mb-0">
                                        <label for="apartment_id">Apartamento</label>
                                        <x-adminlte-select2 name="apartment_id">
                                            @foreach ($apartments as $apartment)
                                                <option
                                                    {{ old('apartment_id') == $apartment->id ? 'selected' : ($resident->apartment_id == $apartment->id ? 'selected' : '') }}
                                                    value="{{ $apartment->id }}">
                                                    {{ 'Condomínio ' . $apartment->block->complex->name . ' - Bl ' . $apartment->block->name . ' - Ap ' . $apartment->name }}
                                                </option>
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
