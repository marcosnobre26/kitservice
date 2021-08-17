<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $about = About::get();

        return  $about->toJson();
    }


}
