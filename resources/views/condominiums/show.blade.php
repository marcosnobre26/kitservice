@extends('layouts.app', ['page' => 'Condominio', 'pageSlug' => 'condominio'])

@section('content')
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Condominio</h3>
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
                                    <p><strong>Nome: </strong></p>
                                    <p class="card-text">
                                        {{ $item->name }}
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
                            <div class="container">
                                <p><strong>Banner: </strong></p>
                                <div class="card-deck">
                                    <div class="row">
                                        @if(isset($item->banner))
                                                
                                                
                                            <div class="col-4 p-2">
                                                
                                                    
                                                <img id="{{$item->id}}" class="img-upload-show" src="{{asset((isset($item) && $item->banner!= null)?'storage/'.$item->banner:'img/noimage.png')}}" alt="Minha Figura">

                                                
                                            </div>
                                                
                                                
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
