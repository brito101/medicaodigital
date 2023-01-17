@extends('adminlte::page')
@section('plugins.select2', true)

@section('title', '- Edição de Medidor')


@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-fw fa-tachometer-alt"></i> Editar Medidor</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.meters.index') }}">Medidores</a></li>
                        <li class="breadcrumb-item active">Editar Medidor</li>
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
                            <h3 class="card-title">Dados Cadastrais do Medidor</h3>
                        </div>

                        <form method="POST" action="{{ route('admin.meters.update', ['meter' => $meter->id]) }}">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="id" value="{{ $meter->id }}">
                            <div class="card-body">

                                <div class="d-flex flex-wrap justify-content-start">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="register">Chassi</label>
                                        <input type="text" class="form-control" id="register" placeholder="Chassi"
                                            name="register" value="{{ old('register') ?? $meter->register }}" required>
                                    </div>

                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2 mb-0">
                                        <label for="apartment_id">Apartamento</label>
                                        <x-adminlte-select2 name="apartment_id">
                                            @foreach ($apartments as $apartment)
                                                <option
                                                    {{ old('apartment_id') == $apartment->id ? 'selected' : ($meter->apartment_id == $apartment->id ? 'selected' : '') }}
                                                    value="{{ $apartment->id }}">
                                                    {{ $apartment->name }} (Bl {{ $apartment->block->name }} - Cond.
                                                    {{ $apartment->block->complex->name }})
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
