<div class="row">

    <div class="col-md-6">
        {!!Form::text('name', 'Nome')
        ->attrs(['maxlength' => 50])!!}
    </div>

    <div class="col-md-6">
        {!!Form::text('address', 'Endereço')
        ->attrs(['maxlength' => 60])
        !!}
    </div>

    <div class="col-md-6">
        {!!Form::text('image', 'Imagem')
        ->attrs(['maxlength' => 60])
        !!}
    </div>
</div>
<div class="row">
    <div class="col-12">
        <button type="submit" class="btn btn-success float-right mt-4">Salvar</button>
    </div>
</div>
