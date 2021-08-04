<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\KitNet;
use App\Models\Condominium;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KitNetController extends Controller
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
        //dd($request);
        $condominiuns = Condominium::orderBy('name')->get();
        $data = KitNet::orderBy('number')
        ->with('condominium')
        ->when($request->has('condominium_id'), function ($query) use ($request) {
            return $query->where('kit_nets.condominium_id',$request->condominium_id);
        })
        ->paginate(5);

        foreach ($data as $money => $value) {
            $numero = $value->value;
            $moeda=number_format($numero, 2, ',', '.');
            $value->value=$moeda;
        }
        
        return view('kitnets.index', compact('data','condominiuns'));
    }

    public function create()
    {
        $condominiums = Condominium::orderBy('name')->get();
        return view('kitnets.create', compact('condominiums'));
    }



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'number' => 'required',
            'description' => 'required',
            'qtd_bedrooms' => 'required',
            'qtd_bathrooms' => 'required',
            'value' => 'required',
            'condominium_id' => 'required',
            ]);

        $moeda=str_replace(",", ".", $request->value);
        $request['value']=$moeda.'';
    
        $kitnet = KitNet::create([
            'number' => $validatedData['number'],
            'description' => $validatedData['description'],
            'qtd_bedrooms' => $validatedData['qtd_bedrooms'],
            'qtd_bathrooms' => $validatedData['qtd_bathrooms'],
            'value' => $request->value,
            'condominium_id' => $validatedData['condominium_id'],
        ]);

        $files = $request->file('imagens');

        if($request->hasFile('imagens'))
        {
            foreach ($files as $file) {

                $name = $file->getClientOriginalName();

                DB::table('image_kit_net')->insert([
                    'image' => '/kitnets/'.$kitnet->id.'/'.$name,
                    'kit_net_id' => $kitnet->id
                ]);
                $file->storeAs('public/kitnets/'.$kitnet->id, $name);
            }
        }
    
        return redirect()->route('kitnets.index')
            ->withStatus('Registro criado com sucesso.');
    }
    
    public function show($id)
    {
        $item = KitNet::with('condominium')->find($id);
        $imagens = DB::table('image_kit_net')->where('kit_net_id','=', $id)->get();

        $numero = $item->value;
        $moeda=number_format($numero, 2, ',', '.');
        $item->value=$moeda;

        
    

        return view('kitnets.show', compact('item','imagens'));
    }


    public function update(Request $request, $id)
    {
        $item = KitNet::findOrFail($id);

        $validatedData = $request->validate([
            'number' => 'required',
            'description' => 'required',
            'qtd_bedrooms' => 'required',
            'qtd_bathrooms' => 'required',
            'value' => 'required',
            'condominium_id' => 'required',
            ]);

        $moeda=str_replace(",", ".", $request->value);
        $request['value']=$moeda.'';
        
        $this->uploadImages($id, $request->SavesImagens);

        $item->fill($request->all())->save();

        $files = $request->file('imagens');

        if($request->hasFile('imagens'))
        {
            foreach ($files as $file) {

                $name = $file->getClientOriginalName();

                DB::table('image_kit_net')->insert([
                    //'kit_net_id' => $item->id,
                    'image' => '/kitnets/'.$item->id.'/'.$name,
                    //'type' => '1',
                    'kit_net_id' => $item->id

                ]);
                $file->storeAs('public/kitnets/'.$item->id, $name);
            }
        }

        return redirect()->route('kitnets.index')
            ->withStatus('Registro atualizado com sucesso.');
    }

    protected function uploadImages($id, $imagens)
    {
        $imgs = DB::table('image_kit_net')
        ->where('kit_net_id', '=', $id)
        ->get();

        foreach ($imgs as $img) {
            $exists=$this->updateImages($img->id, $imagens,$id);

            if($exists==false)
            {
                Storage::disk('public')->delete($img->image);
                DB::table('image_kit_net')->where('id', $img->id)->delete();
            }
        }

    }

    protected function updateImages($id, $imagens,$idKit)
    {
        $cont=0;
        if($imagens==null)
        {
            $this->deleteAll($idKit);
        }
        else{
            foreach ($imagens as $image) {
                if($image==$id)
                {
                    $cont=$cont+1;
                }
            }
    
            if($cont==0)
            {
                return false;
            }
            else{
                return true;
            }
        }
        
    }

    protected function deleteAll($id)
    {
        Storage::deleteDirectory('/public/kitnets/'.$id);
        DB::table('image_kit_net')->where('kit_net_id', $id)->delete();
    }

    public function destroy($id)
    {
        $item = KitNet::findOrFail($id);

        $this->deleteAll($id);

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
        $condominiums = Condominium::orderBy('name')->get();
        $imagens = DB::table('image_kit_net')->where('kit_net_id','=', $id)->get();
        return view('kitnets.edit', compact('item','condominiums','imagens'));
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
