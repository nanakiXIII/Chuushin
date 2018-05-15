<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class serie extends Model
{
    protected $fillable = ['titre', 'titre_original', 'titre_alternatif', 'annee', 'studio', 'auteur', 'episode', 'oav', 'films', 'bonus', 'scan', 'light-novel', 'visual-novel', 'synopsis', 'staff', 'type', 'publication', 'slug', 'image'];

    public function genres(){
        return $this->belongsToMany('App\genre');
    }

    public function setSlugAttribute($value){

        if (empty($value)){
            $this->attributes['slug'] = Str::slug($this->titre);
        }
    }
    public function setImageAttribute($value){

        $this->attributes['image'] = $this->slug.'.'.$value->getClientOriginalExtension();
    }
    //public function setGenresListAttribute($value){
    //    return $this->genres()->sync($value);
    //}


    public function getGenresListAttribute(){
        dd($this);
        if ($this->id){
            return $this->genres->pluck('id')->toArray();
        }
    }




}
