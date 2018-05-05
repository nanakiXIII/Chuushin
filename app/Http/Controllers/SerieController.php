<?php

namespace App\Http\Controllers;


use App\serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SerieController extends Controller
{

    public function index(string $type){
        //$series = DB::table('series')->orderBy('etat', 'ASC')->orderBy('titre')->where('type', $type)->get();
        $series = serie::where('type', $type)->orderBy('etat')->get();
        return view('serie.show', compact('series', 'type'));
    }
    public function detail( string $type, string $slug){
        $serie = serie::where('type', $type)->where('slug', $slug)->first();
        return view('serie.detail', compact('serie', 'type', 'slug'));
    }

}
