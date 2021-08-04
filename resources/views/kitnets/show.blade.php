@extends('layouts.app', ['page' => 'Kitnet', 'pageSlug' => 'kitnet'])

@section('content')
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Kitnet</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('condominiums.index') }}" class="btn btn-sm btn-primary">Voltar</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="card-deck">
                            <div class="card m-2 shadow-sm">
                                <div class="card-body">
                                    <p><strong>Nome do Condominio: </strong></p>
                                    <p class="card-text">
                                        {{ $item->condominium->name }}
                                    </p>
                                </div>
                            </div>
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
                                    <p><strong>Numero de Quartos: </strong></p>
                                    <p class="card-text">
                                        {{ $item->qtd_bedrooms }}
                                    </p>
                                </div>
                            </div>
                            <div class="card m-2 shadow-sm">
                                <div class="card-body">
                                    <p><strong>Quantidade de Banheiros: </strong></p>
                                    <p class="card-text">
                                        {{ $item->qtd_bathrooms }}
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
                        </div>
                        
                    </div>
                    <div class="container">
                        <p><strong>Imagens: </strong></p>
                        <div class="card-deck">
                            <div class="row">
                                @if(isset($imagens))
                                        @foreach($imagens as $item)
                                        
                                            <div class="col-4 p-2">
                                                
                                                    
                                                            <img id="{{$item->id}}" class="img-upload-show" src="{{asset((isset($item) && $item->image!= null)?'storage/'.$item->image:'img/noimage.png')}}" alt="Minha Figura">

                                                
                                            </div>
                                        
                                        @endforeach
                                @else
                                    <div class="card m-2 shadow-sm">
                                        <div class="card-body">
                                            
                                            <p>Sem imagem</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
