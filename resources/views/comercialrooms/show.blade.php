@extends('layouts.app', ['page' => 'Sala Comercial', 'pageSlug' => 'commercialroom'])

@section('content')
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Sala Comercial</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('comercialrooms.index') }}" class="btn btn-sm btn-primary">Voltar</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="card-deck">
                            <div class="card m-2 shadow-sm">
                                <div class="card-body">
                                    <p><strong>Numero: </strong></p>
                                    <p class="card-text">
                                        {{ $item->number }}
                                    </p>
                                </div>
                            </div>
                            <div class="card m-2 shadow-sm">
                                <div class="card-body">
                                    <p><strong>Endereço: </strong></p>
                                    <p class="card-text">
                                        {{ $item->address }}
                                    </p>
                                </div>
                            </div>
                            <div class="card m-2 shadow-sm">
                                <div class="card-body">
                                    <p><strong>Preço: </strong></p>
                                    <p class="card-text">
                                        {{ $item->value }}
                                    </p>
                                </div>
                            </div>
                            <div class="card m-2 shadow-sm">
                                <div class="card-body">
                                    <p><strong>Quantidade de Banheiros: </strong></p>
                                    <p class="card-text">
                                        {{ $item->qtd_bedrooms }}
                                    </p>
                                </div>
                            </div>
                            <div class="card m-2 shadow-sm">
                                <div class="card-body">
                                    <p><strong>Imagem: </strong></p>
                                    <p class="card-text">
                                        {{ $item->image}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
