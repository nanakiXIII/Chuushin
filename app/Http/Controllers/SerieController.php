<?php

namespace App\Http\Controllers;


use App\genre;
use App\Jobs\ProcessImage;
use App\serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class SerieController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'clearance'])->except('index', 'detail');
    }

    public function index(string $type){
        //$series = DB::table('series')->orderBy('etat', 'ASC')->orderBy('titre')->where('type', $type)->get();
        $series = serie::where('type', $type)->orderBy('etat')->get();
        return view('serie.show', compact('series', 'type'));
    }
    public function detail( string $type, string $slug){
        $serie = serie::where('type', $type)->where('slug', $slug)->first();
        return view('serie.detail', compact('serie', 'type', 'slug'));
    }
    public function list(string $type) {
        $series = serie::where('type', $type)->orderBy('etat')->get();
        return view('admin.serie.list', compact('series', 'type'));
    }
    public function adminDetail(string $type, string $slug) {
        $serie = serie::where('type', $type)->where('slug', $slug)->first();
        return view('admin.serie.detail', compact('serie', 'type'));
    }
    public function create(string $type) {
        $genre = genre::pluck('name', 'id')->toArray();
        return view('admin.serie.new', compact('type', 'genre'));
    }
    public function insert(string $type,Request $request) {

        $imageName = 'serie-'.str_slug($request->titre,'-').time().'.'.$request->image->getClientOriginalExtension();
        $request->image->storeAs('serie',$imageName);

        if ($type == "Animes"){
            $episode = $request->episode;
            $oav = $request->oav;
            $film = $request->films;
            $bonus = $request->bonus;
        }
        else{
            $episode = 0;
            $oav = 0;
            $film = 0;
            $bonus = 0;
        }
        if ($type == "Scan"){
            $scan = $request->scan;
        }
        else{
            $scan = 0;
        }
        if ($type == "Light-novel"){
            $ln = $request->light-novel;
        }
        else{
            $ln = 0;
        }
        if ($type == "Visual-novel"){
            $vn = $request->visual-novel;
        }
        else{
            $vn = 0;
        }
        $serie = serie::create([
            'titre' => $request->titre,
            'titre_original' => $request->titre_original,
            'titre_alternatif' => $request->titre_alternatif,
            'annee' => $request->annee,
            'studio' => $request->studio,
            'auteur' => $request->auteur,
            'episode' => $episode,
            'oav' => $oav,
            'films' => $film,
            'bonus' => $bonus,
            'scan' => $scan,
            'light-novel' => $ln,
            'visual_novel' => $vn,
            'synopsis' => $request->synopsis,
            'staff' => $request->staff,
            'type' => $type,
            'slug' => str_slug($request->titre,'-'),
            'image' => $imageName
        ]);

        ProcessImage::dispatch("serie/$imageName", 'medium', '340', '120');
        ProcessImage::dispatch("serie/$imageName", 'large', '420', '236');
    }


}
