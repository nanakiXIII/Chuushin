<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class serie extends Model
{
    protected $fillable = ['titre', 'titre_original', 'titre_alternatif', 'annee', 'studio', 'auteur', 'episode', 'oav', 'films', 'bonus', 'scan', 'light-novel', 'visual-novel', 'synopsis', 'staff', 'type', 'publication', 'slug', 'image'];

    public function genres(){
        return $this->belongsToMany('App\genre');
    }

    public function getGenresListAttribute(){
        if ($this->id){
            return $this->genres->lists('id');
        }
    }
    public function getGenresListName(){
        if ($this->id){
            return $this->genres->lists('name');
        }
    }
}
