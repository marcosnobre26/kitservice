<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\CommercialPoint;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CommercialPointController extends Controller
{
    public function __construct()
    {
        /*$this->middleware('permission:banks_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:banks_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:banks_view', ['only' => ['show', 'index']]);
        $this->middleware('permission:banks_delete', ['only' => ['destroy']]);*/
    }

    public function index(Request $request)
    {
        $data = CommercialPoint::orderBy('name')->paginate(10);

        return view('comercialpoints.index', compact('data'));
    }

    public function create()
    {
        return view('comercialpoints.create');
    }



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            ]);

        $commercialpoint = CommercialPoint::create([
            'name' => $validatedData['name'],
            'address' => $validatedData['address'],
            ]);
    
        return redirect()->route('comercialpoints.index')
            ->withStatus('Registro criado com sucesso.');
    }
    
    public function show($id)
    {
        $item = CommercialPoint::find($id);
        return view('comercialpoints.show', compact('item'));
    }


    public function update(Request $request, $id)
    {
        $item = CommercialPoint::findOrFail($id);
        $item->fill($request->all())->save();

        return redirect()->route('comercialpoints.index')
            ->withStatus('Registro atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $item = CommercialPoint::findOrFail($id);

        try {
            $item->delete();
            return redirect()->route('comercialpoints.index')
                ->withStatus('Registro deletado com sucesso.');
        } catch (\Exception $e) {
            return redirect()->route('comercialpoints.index')
                ->withError('Registro vinculado á outra tabela, somente poderá ser excluído se retirar o vinculo.');
        }
    }

    public function edit($id)
    {
        
        $item = CommercialPoint::findOrFail($id);
        return view('comercialpoints.edit', compact('item'));
    }
}
