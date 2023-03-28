@extends('adminlte::page')
@section('plugins.select2', true)

@section('title', '- Relatório')


@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-fw fa-file"></i> Relatório</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.bills.index') }}">Contas por Condomínios</a>
                        </li>
                        <li class="breadcrumb-item active">Relatório</li>
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
                            <h3 class="card-title">Dados Cadastrais do Relatório</h3>
                        </div>

                        <form method="POST" action="{{ route('admin.reportsStore', ['id' => $bill->id]) }}">
                            @csrf
                            <div class="card-body">

                                <div class="d-flex flex-wrap justify-content-start">

                                    <div class="col-12 col-md-3 form-group px-0 pr-md-2">
                                        <label for="complex_id">Condomínio</label>
                                        <input type="text" class="form-control" id="complex" name="complex"
                                            value="{{ $bill->complex->name }}" disabled>
                                    </div>

                                    <div class="col-12 col-md-3 form-group px-0 px-md-2">
                                        <label for="consumption">Consumo</label>
                                        <input type="text" class="form-control float" id="consumption" name="consumption"
                                            value="{{ $bill->consumption }}" disabled>
                                    </div>

                                    <div class="col-12 col-md-3 form-group px-0 px-md-2">
                                        <label for="value">Valor</label>
                                        <input type="text" class="form-control money_format_2" id="value"
                                            name="value" value="{{ $bill->value }}" disabled>
                                    </div>

                                    <div class="col-12 col-md-3 form-group px-0 pl-md-2">
                                        <label for="date_ref">Data da Leitura</label>
                                        <input type="date" class="form-control" id="date_ref" name="date_ref"
                                            value="{{ $bill->date_ref }}" disabled>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-start">
                                    @foreach ($bill->complex->blocks->sortBy('name') as $block)
                                        <h5 class="col-12">Bloco: {{ $block->name }}</h5>
                                        {{-- Apartments --}}
                                        @foreach ($block->apartments->sortBy('name') as $apartment)
                                            <div class="d-flex flex-wrap justify-content-start col-12 px-0">
                                                <div class="col-12 col-md-4 form-group px-0 pr-md-2">
                                                    <label for="apartment_id_{{ $apartment->id }}">Apartamento</label>
                                                    <input type="text" class="form-control"
                                                        id="apartment_id_{{ $apartment->id }}"
                                                        name="apartment_id_{{ $apartment->id }}"
                                                        value="{{ $apartment->name }}" disabled>
                                                </div>
                                                <div class="col-12 col-md-4 form-group px-0 px-md-2">
                                                    <label for="consumption_{{ $apartment->id }}">Consumo</label>
                                                    <input type="text" class="form-control float consumption"
                                                        id="consumption_{{ $apartment->id }}"
                                                        name="consumption_{{ $apartment->id }}"
                                                        value="{{ old('consumption_' . $apartment->id) ?? $apartment->getReport($bill->id)['consumption'] }}"
                                                        required>
                                                </div>

                                                <div class="col-12 col-md-4 form-group px-0 pl-md-2">
                                                    <label for="value">Valor</label>
                                                    <input type="text"
                                                        class="form-control money_format_2 apartment_value"
                                                        id="value_{{ $apartment->id }}" name="value_{{ $apartment->id }}"
                                                        value="{{ old('value_' . $apartment->id) ?? $apartment->getReport($bill->id)['value'] }}"
                                                        required>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endforeach

                                </div>

                                <div class="d-flex flex-wrap justify-content-end col-12 px-0">
                                    <div class="col-12 col-md-4 form-group px-0 px-md-2">
                                        <label for="total_consumed">Total m<sup>3</sup> (Condomínio:
                                            {{ $bill->consumption }})</label>
                                        <input type="text" class="form-control float" id="total_consumed"
                                            name="total_consumed" value="{{ $totalConsumption }}" disabled>
                                    </div>
                                    <div class="col-12 col-md-4 form-group px-0 pl-md-2">
                                        <label for="total_value">Total R$ (Condomínio:
                                            {{ $bill->value }})</label>
                                        <input type="text" class="form-control money_format_2" id="total_value"
                                            name="total_value" value="{{ $totalValue }}" disabled>
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

    <script>
        const consumption = Number(('{{ $bill->consumption }}').replace('.', '').replace(',', '.'));
        const value = Number(('{{ $bill->value }}').replace('R$ ', '').replace('.', '').replace(',', '.'));
        const tax = value / consumption;
        let totalConsumption = {{ $totalConsumption }};
        let totalValue = {{ $totalValue }};

        function sumConsumption() {
            totalConsumption = 0;
            $(".consumption").each(function() {
                if (!isNaN(this.value)) {
                    totalConsumption += Number(this.value);
                }
            });
            $("#total_consumed").val(totalConsumption);
        }

        function sumValue() {
            totalValue = 0;
            $(".apartment_value").each(function() {
                if (!isNaN(this.value)) {
                    totalValue += Number(this.value);
                }

            });
            $("#total_value").val(totalValue.toLocaleString('pt-br', {
                style: 'currency',
                currency: 'BRL'
            }));
        }


        $(".consumption").on('change', function(e) {
            let id = (e.target.id).replace('consumption', 'value');
            $(`#${id}`).val(e.target.value * tax);
            sumConsumption();
            sumValue();
        });
    </script>
@endsection
