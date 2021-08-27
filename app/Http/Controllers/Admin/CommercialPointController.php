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
        //dd($data);

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

        if($request->file('banner'))
        {
            $banner = $request->file('banner');
            $bannerName = $banner->getClientOriginalName();
        }
        

        $commercialpoint = CommercialPoint::create([
            'name' => $validatedData['name'],
            'address' => $validatedData['address'],
            ]);
        
        if($request->file('banner')){

            $banner = $request->file('banner');
            $bannerName = $banner->getClientOriginalName();
            $banner->storeAs('public/condominium/'.$commercialpoint->id.'/banner/', $bannerName);
            $ban='/condominium/'.$commercialpoint->id.'/banner/'. $bannerName;
            $commercialpoint->banner=$ban;
            $commercialpoint->save();
        }

        $files = $request->file('imagens');

        if($request->hasFile('imagens'))
        {
            foreach ($files as $file) {

                $name = $file->getClientOriginalName();

                DB::table('image_commercial_point')->insert([
                    'image' => '/commercialpoints/'.$commercialpoint->id.'/'.$name,
                    'commercial_point_id' => $commercialpoint->id
                ]);
                $file->storeAs('public/commercialpoints/'.$commercialpoint->id, $name);
            }
        }
    
        return redirect()->route('comercialpoints.index')
            ->withStatus('Registro criado com sucesso.');
    }
    
    public function show($id)
    {
        $item = CommercialPoint::find($id);
        $imagens = DB::table('image_commercial_point')->where('commercial_point_id','=', $id)->get();
        return view('comercialpoints.show', compact('item','imagens'));
    }


    public function update(Request $request, $id)
    {
        $item = CommercialPoint::findOrFail($id);

        $this->uploadImages($id, $request->SavesImagens);

        $item->fill($request->all())->save();

        if($request->file('banner'))
        {
            $banner = $request->file('banner');
            $bannerName = $banner->getClientOriginalName();
            $banner->storeAs('public/commercialpoints/'.$item->id.'/banner/', $bannerName);
            $ban='/commercialpoints/'.$item->id.'/banner/'. $bannerName;
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

                DB::table('image_commercial_point')->insert([
                    'image' => '/commercialpoints/'.$item->id.'/'.$name,
                    'commercial_point_id' => $item->id

                ]);
                $file->storeAs('public/commercialpoints/'.$item->id, $name);
            }
        }

        return redirect()->route('comercialpoints.index')
            ->withStatus('Registro atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $item = CommercialPoint::findOrFail($id);
        $this->deleteAll($id);

        try {
            $item->delete();
            return redirect()->route('comercialpoints.index')
                ->withStatus('Registro deletado com sucesso.');
        } catch (\Exception $e) {
            return redirect()->route('comercialpoints.index')
                ->withError('Registro vinculado á outra tabela, somente poderá ser excluído se retirar o vinculo.');
        }
    }

    protected function deleteAll($id)
    {
        Storage::deleteDirectory('/public/commercialpoints/'.$id);
        DB::table('image_commercial_point')->where('commercial_point_id', $id)->delete();
    }

    protected function uploadImages($id, $imagens)
    {
        $imgs = DB::table('image_commercial_point')
        ->where('commercial_point_id', '=', $id)
        ->get();

        foreach ($imgs as $img) {
            $exists=$this->updateImages($img->id, $imagens,$id);

            if($exists==false)
            {
                Storage::disk('public')->delete($img->image);
                DB::table('image_commercial_point')->where('id', $img->id)->delete();
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

    public function edit($id)
    {
        
        $item = CommercialPoint::findOrFail($id);
        $imagens = DB::table('image_commercial_point')->where('commercial_point_id','=', $id)->get();
        return view('comercialpoints.edit', compact('item','imagens'));
    }
}
