<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommercialRoom;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CommercialRoomController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $commercialroom = CommercialRoom::orderBy('number')->get();
        return $commercialroom->toJson();
    }

    public function get($id)
    {
        $commercialroom = CommercialRoom::find($id)->get();
        return $commercialroom->toJson();
    }

    public function store(Request $request)
    {
        Validator::make(
            $request->all(),
            $this->rules($request)
        )->validate();


        CommercialRoom::create($request->all());

        $validatedData = $request->validate([
            'number' => 'required',
            'image' => 'required',
            'qtd_bedrooms' => 'required',
            'value' => 'required',
            ]);
    
        $commercialroom = CommercialRoom::create([
            'number' => $validatedData['number'],
            'image' => $validatedData['image'],
            'qtd_bedrooms' => $validatedData['qtd_bedrooms'],
            'value' => $validatedData['value']
            ]);
    
        return response()->json('Sala Comercial criada!');
    }
    
    public function show($id)
    {
        $commercialroom = CommercialRoom::find($id);
        return $commercialroom->toJson();
    }

    public function update(Request $request, $id)
    {
        $item = CommercialRoom::findOrFail($id);

        Validator::make(
            $request->all(),
            $this->rules($request, $item->getKey())
        )->validate();


        $item->fill($request->all())->save();

        return response()->json('Sala Comercial Atualizada!');
    }

    public function destroy($id)
    {
        $item = CommercialRoom::findOrFail($id);

        try {
            $item->delete();
            return response()->json('Sala Comercial deletada!');
        } catch (\Exception $e) {
            return response()->json('Sala Comercial vinculada a outra Tabela!');
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
