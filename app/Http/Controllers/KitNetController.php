<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KitNet;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class KitNetController extends Controller
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
        $kitnets = KitNet::orderBy('number')->get();

        foreach ($kitnets as $kitnet) {
            $kitnet->imagens=DB::table('image_kit_net')->where('kit_net_id', $kitnet->id)->get();
        }

        return $kitnets->toJson();
    }



    public function store(Request $request)
    {
        /*Validator::make(
            $request->all(),
            $this->rules($request)
        )->validate();*/

        KitNet::create($request->all());

        $validatedData = $request->validate([
            'number' => 'required',
            'image' => 'required',
            'qtd_bedrooms' => 'required',
            'qtd_bathrooms' => 'required',
            'value' => 'required',
            'condominium_id' => 'required',
            ]);
    
        $kitnet = KitNet::create([
            'number' => $validatedData['number'],
            'image' => $validatedData['image'],
            'qtd_bedrooms' => $validatedData['qtd_bedrooms'],
            'qtd_bathrooms' => $validatedData['qtd_bathrooms'],
            'value' => $validatedData['value'],
            'condominium_id' => $validatedData['condominium_id'],
            ]);
    
        return response()->json('Kit-Net criado!');
    }
    
    public function show($id)
    {
        $kitnet = KitNet::find($id);
        $kitnet->imagens=DB::table('image_kit_net')->where('kit_net_id', $kitnet->id)->get();
        
        return $kitnet->toJson();
    }


    public function update(Request $request, $id)
    {
        $item = KitNet::findOrFail($id);

        Validator::make(
            $request->all(),
            $this->rules($request, $item->getKey())
        )->validate();


        $item->fill($request->all())->save();

        return response()->json('Condominio Atualizado!');
    }

    public function destroy($id)
    {
        $item = KitNet::findOrFail($id);

        try {
            $item->delete();
            return response()->json('Kit-net deletada!');
        } catch (\Exception $e) {
            return response()->json('Kit-net vinculada a outra Tabela!');
        }
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
