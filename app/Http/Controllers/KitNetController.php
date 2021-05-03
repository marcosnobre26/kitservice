<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KitNet;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class KitNetController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:banks_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:banks_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:banks_view', ['only' => ['show', 'index']]);
        $this->middleware('permission:banks_delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $condominiums = KitNet::orderBy('name')->get();
        return $condominiums->toJson();
    }

    public function create()
    {
        return view('banks.create');
    }

    public function store(Request $request)
    {
        Validator::make(
            $request->all(),
            $this->rules($request)
        )->validate();


        Bank::create($request->all());

        return redirect()->route('banks.index')
            ->withStatus('Registro criado com sucesso.');
    }
    
    public function show($id)
    {
        $item = Bank::findOrFail($id);
        return view('banks.show', compact('item'));
    }

    public function edit($id)
    {
        $item = Bank::findOrFail($id);
        return view('banks.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Bank::findOrFail($id);

        Validator::make(
            $request->all(),
            $this->rules($request, $item->getKey())
        )->validate();


        $item->fill($request->all())->save();

        return redirect()->route('banks.index')
            ->withStatus('Registro atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $item = Bank::findOrFail($id);

        try {
            $item->delete();
            return redirect()->route('banks.index')
                ->withStatus('Registro deletado com sucesso.');
        } catch (\Exception $e) {
            return redirect()->route('banks.index')
                ->withError('Registro vinculado á outra tabela, somente poderá ser excluído se retirar o vinculo.');
        }
    }

    private function rules(Request $request, $primaryKey = null, bool $changeMessages = false)
    {
        $rules = [
            'name' => ['required'],
            'code' => ['required'],
            'is_enabled' => ['required']
        ];

        $messages = [];

        return !$changeMessages ? $rules : $messages;
    }
}
