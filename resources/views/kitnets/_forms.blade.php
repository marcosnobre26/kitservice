<div class="row">

    <div class="col-md-6">
        {!!Form::text('number', 'Numero')
        ->attrs(['maxlength' => 50])!!}
    </div>

    <div class="col-md-6">
        {!!Form::text('value', 'Preço')
        ->attrs(['maxlength' => 60])
        !!}
    </div>

    <div class="col-md-6">
        {!!Form::text('image', 'Imagem')
        ->attrs(['maxlength' => 60])
        !!}
    </div>

    <div class="col-md-6">
        {!!Form::text('qtd_bedrooms', 'Numero de Quartos')
        ->attrs(['maxlength' => 60])
        !!}
    </div>

    <div class="col-md-6">
        {!!Form::text('qtd_bathrooms', 'Numero de Banheiros')
        ->attrs(['maxlength' => 60])
        !!}
    </div>

    <div class="col-md-6">
        {!!Form::select('condominium_id', 'Condominio')
        ->options($condominiums->prepend('Selecione',''),'name')
        ->required()
        !!}
    </div>
</div>
<div class="row">
    <div class="col-12">
        <button type="submit" class="btn btn-success float-right mt-4">Salvar</button>
    </div>
</div>
