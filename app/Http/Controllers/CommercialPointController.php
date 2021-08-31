<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommercialRoom;
use App\Models\CommercialPoint;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CommercialPointController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $commercialpoints = CommercialPoint::orderBy('name')->get();
        foreach ($commercialpoints as $commercialpoint) {
            $commercialpoint->imagens=DB::table('image_commercial_point')->where('commercial_point_id', $commercialpoint->id)->get();
        }

        return $commercialpoints->toJson();
    }

    public function show($id)
    {
        $commercialpoint = CommercialPoint::find($id);

        $commercialpoint->imagens=DB::table('image_commercial_point')->where('commercial_point_id', $id)->get();

        $commercialpoint->comercialrooms=DB::table('commercial_room')->where('commercial_point_id', $id)->get();

        foreach ($commercialpoint->comercialrooms as $commercialroom) {
            $commercialroom->imagens=DB::table('image_commercial_room')->where('commercial_room_id', $commercialroom->id)->get();
        }

        return $commercialpoint->toJson();
    }

    public function getForCommercialPoint(Request $request, $id)
    {
        $commercialrooms = CommercialRoom::where('commercial_point_id', $request->id)->get();

        foreach ($commercialrooms as $commercialroom) {
            $commercialroom->imagens=DB::table('image_commercial_room')->where('commercial_room_id', $commercialroom->id)->get();
        }

        return $commercialrooms->toJson();
    }
}