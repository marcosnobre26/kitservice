@extends('layouts.app', ['page' => 'Pontos Comerciais', 'pageSlug' => 'comercialpoints'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title"><i class="fas fa-map-marked-alt"></i> Pontos Comerciais</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('comercialpoints.create') }}" class="btn btn-sm btn-primary">Adicionar Novo</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('alerts.success')
                @include('alerts.error')

                {!!Form::open()->fill(request()->all())->get()!!}
    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    {!!Form::text('address', 'Endereço')
                                    ->required(false)
                                    ->attrs(['class' => 'form-control'])!!}
                                </div>
                            </div>
                            <button type="submit" class="btn btn-filtro btn-sm btn-primary">Filtrar
                                <i class="fas fa-search"></i></button>
                            </div>
                        </div>
    
                    </div>
                {!!Form::close()!!}

                <div class="">
                    <table class="table tablesorter table-striped" id="">
                        <thead class=" text-primary">
                            <th scope="col">Nome</th>
                            <th scope="col">Endereço</th>
                            <th scope="col" class="text-right">Ação</th>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->address }}</td>
                                <td class="text-right">
                                    <form action="{{ route('comercialpoints.destroy', $item->id) }}" method="POST"
                                        id="form-{{$item->id}}">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('comercialpoints.show', $item) }}">
                                            <button type="button" class="btn btn-primary">Visualizar</button>
                                        </a>
                                    
                                        <a href="{{ route('comercialpoints.edit', $item) }}">
                                            <button type="button" class="btn btn-success">Editar</button>
                                        </a>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button class="btn btn-danger m-1">Excluir</button>
                                    </form>
                                </td>
                                
                            </tr>
                            @empty
                            <tr>
                                <td colspan="20" style="text-align: center; font-size: 1.1em;">
                                    Nenhuma informação cadastrada.
                                </td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="d-felx justify-content-center">
                {{ $data->links() }}
            </div>

        </div>
    </div>
</div>
@endsection
