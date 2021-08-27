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

    <div class="col-md-12">
        {!!Form::textarea('description', 'Description')!!}
    </div>


    <div>
        <table>
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Banner:</th>
            </tr>
            </thead>
            <tbody>
                
                
            

                    @if(isset($item->banner))
                        
                            <tr>
                                <td></td>

                                <td>
                                <img id="{{$item->id}}" class="img-upload-banner" src="{{asset((isset($item) && $item->banner!= null)?'storage/'.$item->banner:'img/noimage.png')}}" alt="Minha Figura">
                                </td>
                            </tr>
                        

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

</div>

    <div class="card-deck">
        
        <div class="card-body">
            <p><strong>Banner: </strong></p>
            <input type="hidden" />
            <div class="custom-file">
                @if(isset($item->banner))
                <input type="text" class="custom-file-input" name="ban" id="input_img_itens" value="{{$item->banner}}" hidden>
                @endif
                <input type="file" class="custom-file-input" name="banner" id="input_img_itens">
                <label class="custom-file-label" for="input_img_itens">Escolha o arquivo</label>
            </div>
        </div>
        
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
