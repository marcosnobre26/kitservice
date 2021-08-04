@extends('layouts.app', ['page' => 'Ponto Comercial', 'pageSlug' => 'comercialpoint'])

@section('content')
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Ponto Comercial</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('comercialpoints.index') }}" class="btn btn-sm btn-primary">Voltar</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {!!Form::open()
                    ->post()
                    ->route('comercialpoints.store')
                    ->multipart()!!}
                    <div class="pl-lg-4">
                        @include('comercialpoints._forms')
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
