<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nomenclator extends Model
{
    protected $table = 'nomenclator';
    public static function getCategories(){
        $categories = Nomenclator::where('father', '1')->get();
        return $categories;
    }

    public function notes(){
        return $this->hasMany('App\Models\Notes');
    }
    use HasFactory;
}
