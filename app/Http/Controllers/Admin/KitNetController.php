<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\KitNet;
use App\Models\Condominium;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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
        $data = KitNet::orderBy('number')->with('condominium')->paginate(5);
        return view('kitnets.index', compact('data'));
    }

    public function create()
    {
        $condominiums = Condominium::orderBy('name')->get();
        return view('kitnets.create', compact('condominiums'));
    }



    public function store(Request $request)
    {

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
    
        return redirect()->route('kitnets.index')
            ->withStatus('Registro criado com sucesso.');
    }
    
    public function show($id)
    {
        $item = KitNet::with('condominium')->find($id);
        return view('kitnets.show', compact('item'));
    }


    public function update(Request $request, $id)
    {
        $item = KitNet::findOrFail($id);

        Validator::make(
            $request->all(),
            $this->rules($request, $item->getKey())
        )->validate();


        $item->fill($request->all())->save();

        return redirect()->route('kitnets.index')
            ->withStatus('Registro atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $item = KitNet::findOrFail($id);

        try {
            $item->delete();
            return redirect()->route('kitnets.index')
                ->withStatus('Registro deletado com sucesso.');
        } catch (\Exception $e) {
            return redirect()->route('kitnets.index')
                ->withError('Registro vinculado á outra tabela, somente poderá ser excluído se retirar o vinculo.');
        }
    }

    public function edit($id)
    {
        $item = KitNet::findOrFail($id);
        return view('kitnets.edit', compact('item'));
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
