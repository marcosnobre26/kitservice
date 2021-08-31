<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\CommercialRoom;
use App\Models\CommercialPoint;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ComercialRoomController extends Controller
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
        $comercialpoints = CommercialPoint::orderBy('name')->get();

        $data = CommercialRoom::with('commercialpoint')->orderBy('number')
        ->when($request->has('commercial_point_id'), function($query) use($request){
            return $query->where('commercial_point_id', '=' ,$request->commercial_point_id);
        })
        ->paginate(20);
        

        foreach ($data as $money => $value) {
            $numero = $value->value;
            $moeda=number_format($numero, 2, ',', '.');
            $value->value=$moeda;

            $numero1 = $value->rate;
            $moeda1=number_format($numero1, 2, ',', '.');
            $value->rate=$moeda1;
        }

        return view('comercialrooms.index', compact('data','comercialpoints'));
    }

    public function create()
    {
        $comercialpoints = CommercialPoint::orderBy('name')->get();
        return view('comercialrooms.create', compact('comercialpoints'));
    }



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'number' => ['required'],
            'description' => ['required'],
            'qtd_bedrooms' => ['required'],
            'value' => ['required'],
            'status' => ['required'],
            'rate' => ['required'],
            'commercial_point_id'=> ['required'],
            ]);

        $moeda=str_replace(",", ".", $request->value);
        $request['value']=$moeda.'';

        $moeda=str_replace(",", ".", $request->rate);
        $request['rate']=$moeda.'';

    
        $commercialroom = CommercialRoom::create([
            'number' => $validatedData['number'],
            'description' => $validatedData['description'],
            'qtd_bedrooms' => $validatedData['qtd_bedrooms'],
            'value' => $request->value,
            'status' => $validatedData['status'],
            'rate' => $request->rate,
            'commercial_point_id' => $request->commercial_point_id,
            ]);

        $files = $request->file('imagens');

        if($request->hasFile('imagens'))
        {
            foreach ($files as $file) {

                $name = $file->getClientOriginalName();

                DB::table('image_commercial_room')->insert([
                    'image' => '/commercialroom/'.$commercialroom->id.'/'.$name,
                    'commercial_room_id' => $commercialroom->id
                ]);
                $file->storeAs('public/commercialroom/'.$commercialroom->id, $name);
            }
        }
    
        return redirect()->route('comercialrooms.index')
            ->withStatus('Registro criado com sucesso.');
    }
    
    public function show($id)
    {
        $item = CommercialRoom::find($id);
        $imagens = DB::table('image_commercial_room')->where('commercial_room_id','=', $id)->get();

        $numero = $item->value;
        $moeda=number_format($numero, 2, ',', '.');
        $item->value=$moeda;

        $numero1 = $item->rate;
        $moeda1=number_format($numero1, 2, ',', '.');
        $item->rate=$moeda1;
        
        
        return view('comercialrooms.show', compact('item','imagens'));
    }


    public function update(Request $request, $id)
    {
        $item = CommercialRoom::findOrFail($id);

        $validatedData = $request->validate([
            'number' => ['required'],
            'description' => ['required'],
            'qtd_bedrooms' => ['required'],
            'value' => ['required'],
            'rate' => ['required'],
            'value' => ['required'],
            'commercial_point_id'=> ['required'],
            ]);

        $moeda=str_replace(",", ".", $request->value);
        $request['value']=$moeda.'';

        $moeda=str_replace(",", ".", $request->rate);
        $request['rate']=$moeda.'';


        $this->uploadImages($id, $request->SavesImagens);

        $item->fill($request->all())->save();

        $files = $request->file('imagens');

        if($request->hasFile('imagens'))
        {
            foreach ($files as $file) {

                $name = $file->getClientOriginalName();

                DB::table('image_commercial_room')->insert([
                    'image' => '/commercialroom/'.$item->id.'/'.$name,
                    'commercial_room_id' => $item->id

                ]);
                $file->storeAs('public/commercialroom/'.$item->id, $name);
            }
        }

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
        $comercialpoints = CommercialPoint::orderBy('name')->get();
        $imagens = DB::table('image_commercial_room')->where('commercial_room_id','=', $id)->get();
        return view('comercialrooms.edit', compact('item','imagens','comercialpoints'));
    }

    protected function deleteAll($id)
    {
        Storage::deleteDirectory('/public/commercialroom/'.$id);
        DB::table('image_commercial_room')->where('commercial_room_id', $id)->delete();
    }

    protected function uploadImages($id, $imagens)
    {
        $imgs = DB::table('image_commercial_room')
        ->where('commercial_room_id', '=', $id)
        ->get();

        foreach ($imgs as $img) {
            $exists=$this->updateImages($img->id, $imagens,$id);

            if($exists==false)
            {
                Storage::disk('public')->delete($img->image);
                DB::table('image_commercial_room')->where('id', $img->id)->delete();
            }
        }

    }

    protected function updateImages($id, $imagens,$idComercialRoom)
    {
        $cont=0;
        if($imagens==null)
        {
            $this->deleteAll($idComercialRoom);
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