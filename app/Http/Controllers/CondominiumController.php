<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KitNet;
use App\Models\Condominium;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CondominiumController extends Controller
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
        $condominiums = Condominium::orderBy('name')->get();
        foreach ($condominiums as $condominium) {
            $condominium->imagens=DB::table('image_condominium')->where('condominium_id', $condominium->id)->get();
        }
        return $condominiums->toJson();
    }

    public function create()
    {
        return view('banks.create');
    }

    public function store(Request $request)
      {
        $validatedData = $request->validate([
          'name' => 'required',
          'image' => 'required',
          'address' => 'required',
        ]);

        $condominium = Condominium::create([
          'name' => $validatedData['name'],
          'image' => $validatedData['image'],
          'address' => $validatedData['address'],
        ]);

        return response()->json('Condominio criado!');
      }
    
    public function show($id)
    {
        $condominium = Condominium::with('kitnets')->find($id);
        $condominium->imagens=DB::table('image_condominium')->where('condominium_id', $condominium->id)->get();
        return response()->json($condominium);
    }

    public function getForCondominium(Request $request, $id)
    {
        $kitnets = KitNet::where('condominium_id', $request->id)->get();

        foreach ($kitnets as $kitnet) {
            $kitnet->imagens=DB::table('image_kit_net')->where('kit_net_id', $kitnet->id)->get();
        }

        return $kitnets->toJson();
    }

    public function update(Request $request, $id)
    {
        $item = Condominium::findOrFail($id);

        Validator::make(
            $request->all(),
            $this->rules($request, $item->getKey())
        )->validate();


        $item->fill($request->all())->save();

        return response()->json('Condominio Atualizado!');
    }

    public function destroy($id)
    {
        $item = Condominium::findOrFail($id);

        try {
            $item->delete();
            return response()->json('Condominio deletado!');
        } catch (\Exception $e) {
            return response()->json('condominio Vinculado a outra Tabela!');
        }
    }

    private function rules(Request $request, $primaryKey = null, bool $changeMessages = false)
    {
        $rules = [
            'name' => ['required'],
            'image' => ['required'],
            'address' => ['required']
        ];

        $messages = [];

        return !$changeMessages ? $rules : $messages;
    }
}
