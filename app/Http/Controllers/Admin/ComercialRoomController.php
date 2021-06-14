<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\CommercialRoom;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ComercialRoomController extends Controller
{
    public function __construct()
    {
        /*$this->middleware('permission:banks_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:banks_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:banks_view', ['only' => ['show', 'index']]);
        $this->middleware('permission:banks_delete', ['only' => ['destroy']]);*/
    }

    public function index()
    {
        $data = CommercialRoom::orderBy('number')->paginate(5);
        return view('comercialrooms.index', compact('data'));
    }

    public function create()
    {
        return view('comercialrooms.create');
    }



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'number' => 'required',
            'image' => 'required',
            'qtd_bedrooms' => 'required',
            'address' => 'required',
            'value' => 'required',
            ]);
    
        $commercialroom = CommercialRoom::create([
            'number' => $validatedData['number'],
            'image' => $validatedData['image'],
            'qtd_bedrooms' => $validatedData['qtd_bedrooms'],
            'address' => $validatedData['address'],
            'value' => $validatedData['value'],
            ]);
    
        return redirect()->route('comercialrooms.index')
            ->withStatus('Registro criado com sucesso.');
    }
    
    public function show($id)
    {
        $item = CommercialRoom::find($id);
        return view('comercialrooms.show', compact('item'));
    }


    public function update(Request $request, $id)
    {
        $item = CommercialRoom::findOrFail($id);

        /*Validator::make(
            $request->all(),
            $this->rules($request, $item->getKey())
        )->validate();*/
        $validatedData = $request->validate([
            'number' => 'required',
            'image' => 'required',
            'qtd_bedrooms' => 'required',
            'address' => 'required',
            'value' => 'required',
            ]);


        $item->fill($request->all())->save();

        return redirect()->route('comercialrooms.index')
            ->withStatus('Registro atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $item = CommercialRoom::findOrFail($id);

        try {
            $item->delete();
            return redirect()->route('comercialrooms.index')
                ->withStatus('Registro deletado com sucesso.');
        } catch (\Exception $e) {
            return redirect()->route('comercialrooms.index')
                ->withError('Registro vinculado á outra tabela, somente poderá ser excluído se retirar o vinculo.');
        }
    }

    public function edit($id)
    {
        $item = CommercialRoom::findOrFail($id);
        return view('comercialrooms.edit', compact('item'));
    }

    /*private function rules(Request $request, $primaryKey = null, bool $changeMessages = false)
    {
        $rules = [
            'name' => ['required'],
            'code' => ['required'],
            'is_enabled' => ['required']
        ];

        $messages = [];

        return !$changeMessages ? $rules : $messages;
    }*/
}
