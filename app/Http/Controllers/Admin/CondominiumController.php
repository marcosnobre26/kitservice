<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\KitNet;
use App\Models\Condominium;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CondominiumController extends Controller
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
        $data = Condominium::orderBy('name')
        ->when($request->has('address'), function($query) use($request){
            return $query->where('address', 'like', '%' . $request->address . '%');
        })
        ->when($request->has('name'), function($query) use($request){
            return $query->where('name', 'like', '%' . $request->name . '%');
        })
        //->where('address', 'like', '%' . $request->address . '%')
        ->paginate(5);

        
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
          'description' => 'required',
          'address' => 'required',
        ]);

        if($request->file('banner'))
        {
            $banner = $request->file('banner');
            $bannerName = $banner->getClientOriginalName();
        }
        
        

        
        $condominium = Condominium::create([
          'name' => $validatedData['name'],
          'description' => $validatedData['description'],
          'address' => $validatedData['address'],
        ]);

        if($request->file('banner'))
        {
            $banner->storeAs('public/condominium/'.$condominium->id.'/banner/', $bannerName);
            $ban='/condominium/'.$condominium->id.'/banner/'. $bannerName;
            $condominium->banner=$ban;
            $condominium->save();
        }

        $files = $request->file('imagens');
        

        if($request->hasFile('imagens'))
        {
            foreach ($files as $file) {

                $name = $file->getClientOriginalName();

                DB::table('image_condominium')->insert([
                    //'image_id' => $kitnet->id,
                    'image' => '/condominium/'.$condominium->id.'/'.$name,
                    //'type' => '1',
                    'condominium_id' => $condominium->id
                ]);
                $file->storeAs('public/condominium/'.$condominium->id, $name);
            }
        }

        return redirect()->route('condominiums.index')
            ->withStatus('Registro criado com sucesso.');
      }
    
    public function show($id)
    {
        $item = Condominium::with('kitnets')->find($id);
        $imagens = DB::table('image_condominium')->where('condominium_id','=', $id)->get();

        return view('condominiums.show', compact('item','imagens'));
    }

    public function edit($id)
    {
        $item = Condominium::findOrFail($id);
        $imagens = DB::table('image_condominium')->where('condominium_id','=', $id)->get();
        
        return view('condominiums.edit', compact('item','imagens'));
    }

    public function update(Request $request, $id)
    {
        $item = Condominium::findOrFail($id);
        
        $this->uploadImages($id, $request->SavesImagens);

        $item->fill($request->all())->save();

        
        if($request->file('banner'))
        {
            $banner = $request->file('banner');
            $bannerName = $banner->getClientOriginalName();
            $banner->storeAs('public/condominium/'.$item->id.'/banner/', $bannerName);
            $ban='/condominium/'.$item->id.'/banner/'. $bannerName;
            $item->banner=$ban;
            $item->save();
        }
        else{
            $item->banner=$request->ban;
            $item->save();
        }
        
        $files = $request->file('imagens');
        
        $item->save();

        if($request->hasFile('imagens'))
        {
            foreach ($files as $file) {

                $name = $file->getClientOriginalName();

                DB::table('image_condominium')->insert([
                    'image' => '/condominium/'.$item->id.'/'.$name,
                    'condominium_id' => $item->id

                ]);
                $file->storeAs('public/condominium/'.$item->id, $name);
            }
        }

        return redirect()->route('condominiums.index')
            ->withStatus('Registro atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $item = Condominium::findOrFail($id);
        $this->deleteAll($id);
        try {
            $item->delete();

            return redirect()->route('condominiums.index')
                ->withStatus('Registro deletado com sucesso.');
        } catch (\Exception $e) {
            return redirect()->route('condominiums.index')
                ->withError('Registro vinculado á outra tabela, somente poderá ser excluído se retirar o vinculo.');
        }
    }

    protected function deleteAll($id)
    {
        Storage::deleteDirectory('/public/condominium/'.$id);
        DB::table('image_condominium')->where('condominium_id', $id)->delete();
    }

    /*protected function saveDocument($id, $file, $oficial_name)
    {
        Storage::disk('local')->putFileAs('/condominium/'.$id, $file,$oficial_name);
    }*/

    protected function uploadImages($id, $imagens)
    {
        $imgs = DB::table('image_condominium')
        ->where('condominium_id', '=', $id)
        ->get();

        foreach ($imgs as $img) {
            $exists=$this->updateImages($img->id, $imagens,$id);

            if($exists==false)
            {
                Storage::disk('public')->delete($img->image);
                DB::table('image_condominium')->where('id', $img->id)->delete();
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

    private function rules(Request $request, $primaryKey = null, bool $changeMessages = false)
    {
        $rules = [
            'name' => ['required'],
            'description' => ['required'],
            'address' => ['required']
        ];

        $messages = [];

        return !$changeMessages ? $rules : $messages;
    }
}
