<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categorie extends Model
{
    use HasFactory;

    public function selectCategorie($order = 'ASC') {
        $lang = session()->get('localeDB');       
        return $this::select('id',
        DB::raw("(case when name$lang is null then name else name$lang end) as name")
        )
            ->orderBy('name', $order)
            ->get();
    }
}
