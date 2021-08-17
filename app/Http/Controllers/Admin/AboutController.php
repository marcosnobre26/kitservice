<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\KitNet;
use App\Models\Condominium;
use App\Models\About;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
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
        $data = About::first();
        
        return view('about.index', compact('data'));
    }

    public function store(Request $request)
    {
    
        About::query()->delete();
        $about = About::create([
            'about' => $request->about,
        ]);
    
        return redirect()->route('about.index')
            ->withStatus('Registro criado com sucesso.');
    }
}
