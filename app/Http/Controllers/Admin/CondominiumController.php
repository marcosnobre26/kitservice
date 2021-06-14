<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\KitNet;
use App\Models\Condominium;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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
        $data = Condominium::orderBy('name')->paginate(5);
        return view('condominiums.index', compact('data'));
    }

    public function create()
    {
        return view('condominiums.create');
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

        return redirect()->route('condominiums.index')
            ->withStatus('Registro criado com sucesso.');
      }
    
    public function show($id)
    {
        $item = Condominium::with('kitnets')->find($id);
        return view('condominiums.show', compact('item'));
    }

    public function edit($id)
    {
        $item = Condominium::findOrFail($id);
        return view('condominiums.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Condominium::findOrFail($id);

        Validator::make(
            $request->all(),
            $this->rules($request, $item->getKey())
        )->validate();

        $item->fill($request->all())->save();

        return redirect()->route('condominiums.index')
            ->withStatus('Registro atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $item = Condominium::findOrFail($id);

        try {
            $item->delete();

            return redirect()->route('condominiums.index')
                ->withStatus('Registro deletado com sucesso.');
        } catch (\Exception $e) {
            return redirect()->route('condominiums.index')
                ->withError('Registro vinculado á outra tabela, somente poderá ser excluído se retirar o vinculo.');
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
