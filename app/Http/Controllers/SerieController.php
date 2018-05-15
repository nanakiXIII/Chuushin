<?php

namespace App\Http\Controllers;


use App\genre;
use App\Jobs\ProcessImage;
use App\serie;
use Illuminate\Http\Request;


class SerieController extends Controller
{
    public function __construct() {

        $this->middleware(['auth', 'clearance'])->except('index', 'detail');
        $this->middleware(['type']);

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
        $serie = serie::where('type', $type)->where('slug', $slug)->firstOrFail();
        return view('admin.serie.detail', compact('serie', 'type'));
    }
    public function create(string $type) {
        $genre = genre::pluck('name', 'id')->toArray();
        return view('admin.serie.new', compact('type', 'genre'));
    }
    public function edit(string $type, string $slug) {
        $serie = serie::where('type', $type)->where('slug', $slug)->firstOrFail();
        $genre = genre::pluck('name', 'id')->toArray();
        return view('admin.serie.edit', compact('type', 'genre', 'serie'));
    }
    public function insert(string $type,Request $request) {
        $request->validate([
            'titre' =>'required|max:30',
            'titre_original' =>'required',
            'studio' =>'required',
            'auteur' =>'required',
            'annee' =>'required|min:4|max:4',
            'synopsis' =>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $slug = str_slug($request->titre,'-');
        $imageName = $slug.'.'.$request->image->getClientOriginalExtension();
        $request->image->storeAs('serie/'.$type,$imageName);

        $serie = serie::create($request->all());
        $serie->genres()->sync($request->genres_list);
        ProcessImage::dispatch("serie/$type/$imageName", 'medium', '340', '120', $type);
        ProcessImage::dispatch("serie/$type/$imageName", 'large', '420', '236', $type);
        return redirect()->route('admin.serie.detail', [$type,$slug]);
    }
}
