<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;
   // protected $table = 'autre nom';

    protected $fillable = [
        'title',
        'body',
        'user_id',
        'categorie_id'
    ];
    public function blogHasUser(){
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function blogHasCategorie(){
        return $this->hasOne('App\Models\Categorie', 'id', 'categorie_id');
    }

}
