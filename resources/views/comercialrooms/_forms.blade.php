<div class="row">

    <div class="col-md-6">
        {!!Form::text('number', 'Numero')
        ->attrs(['maxlength' => 50])!!}
    </div>

    <div class="col-md-6">
        {!!Form::select('commercial_point_id', 'Condominio')
        ->options($comercialpoints->prepend('Selecione',''),'name')
        ->required()
        !!}
    </div>
    

    <div class="col-md-12">
        {!!Form::textarea('description', 'Description')!!}
    </div>

    <div class="col-md-4">
        {!!Form::text('qtd_bedrooms', 'Quantidade de Banheiros')
        ->attrs(['maxlength' => 60])
        !!}
    </div>

    <div class="col-md-2">
        {!!Form::select('status', 'Disponivel', ['0' => 'Sim', '1' => 'Não'])
        ->value(isset($item) ? $item->status : 0)
        !!}
    </div>

    <div class="col-md-3">
        {!!Form::text('rate', 'Taxa de Limpeza')
        ->attrs(['maxlength' => 60, 'class'=>'money'])
        !!}
    </div>

    <div class="col-md-3">
        {!!Form::text('value', 'Preço')
        ->attrs(['maxlength' => 60, 'class'=>'money'])
        !!}
    </div>

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

@push('js')
<script>

    $(document).ready(function(){
        $('.date').mask('00/00/0000');
        $('.time').mask('00:00:00');
        $('.cep').mask('00000-000');
        $('.phone').mask('(00) 00000-0000');
        $('.cpf').mask('000.000.000-00');
        $(".money").mask("0.000.000,00", {
           reverse: true,
        });
    });

</script>
@endpush
