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
    <div class="col-md-12">
        {!!Form::textarea('description', 'Description')!!}
    </div>

    <!--<div class="container mt-5">
        <label for="formFileDisabled" class="form-label">Disabled file input example</label>
        <input class="form-control" type="file" id="formFileDisabled"/>
    </div>-->

    <table class="table" id="table-document">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col">Imagens</th>
          </tr>
        </thead>
        <tbody>
          <tr class="dynamic-form-documents">
            <td>
                <button type="button" class="btn-sm btn-danger btn-remove"><i
                        class="fas fa-trash"></i></button>
            </td>
            <td>
                <input class="form-control" name="imagens[]" type="file" id="formFileDisabled"/>
            </td>
          </tr>
        </tbody>
        
    </table>
    <div class="row increment mt-4">
        <div class="col-12 text-left">
            <button class="btn btn-success btn-add" type="button"><i class="fas fa-plus"></i>Adicionar
                Documento</button>
        </div>
    </div>

    

</div>

<div>
    <table>
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col">Lista de Imagens:</th>
          </tr>
        </thead>
        <tbody>
            
            
          

                @if(isset($imagens))
                    @foreach($imagens as $item)
                        <tr>
                            <input type="hidden" id="custId" name="SavesImagens[]" value="{{$item->id}}">
                            <td>
                                <button type="button" class="btn-sm btn-danger btn-remove"><i
                                        class="fas fa-trash"></i></button>
                            </td>
                            <td>
                                <img id="{{$item->id}}" class="img-upload" src="{{asset((isset($item) && $item->image!= null)?'storage/'.$item->image:'img/noimage.png')}}" alt="Minha Figura">
                            </td>
                        </tr>
                    @endforeach

                @else
                    <tr>
                        <td>
                            
                        </td>
                        <td>
                            <p>Sem imagem</p>
                        </td>
                    </tr>
                @endif
            
        </tbody>
        
    </table>

</div>
<div class="row">
    <div class="col-12">
        <button type="submit" class="btn btn-success float-right mt-4">Salvar</button>
    </div>
</div>

<!--@push('js')
<script>
$(document).ready(function() {
    $('#inp-affiliated_id').select2({
        minimumInputLength: 3,
        language: "pt-BR",
        placeholder: 'Busca filiado por nome e CPF',
        ajax: {
            cache: true,
            url: getUrl() + '/api/v1/public/pacients',
            dataType: 'json',
            data: function(params) {
                var query = {
                    search: params.term
                }
                return query;
            },
            processResults: function(data) {
                var results = [];
                $.each(data.data, function(i, v) {
                    var o = {};
                    o.id = v.id;
                    o.text = v.name +' - '+ v.nif;
                    o.value = v.id;
                    results.push(o);
                })
                return {
                    results: results
                };
            }
        }
    });
});
</script>
@endpush-->
