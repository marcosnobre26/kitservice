@extends('layouts.app', ['page' => 'Pontos Comerciais', 'pageSlug' => 'comercialpoints'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title"><i class="fas fa-map-marked-alt"></i> Sobre Nós</h4>
                    </div>
                    
                </div>
            </div>
            <div class="card-body">
                @include('alerts.success')
                @include('alerts.error')

                <div class="">
                    
                    <div class="card-body">
                        {!!Form::open()
                        ->post()
                        ->route('about.store')
                        ->multipart()!!}
                        <div class="col-md-12">
                            {!!Form::textarea('about', 'Sobre Nós')
                            ->value((isset($data)) ? $data->about : '')!!}
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success float-right mt-4">Salvar</button>
                            </div>
                        </div>
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
