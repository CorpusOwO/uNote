<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $fillabe = [
        'user_id',
        'title',
        'content',
        'category_id',
    ];
    protected $table = 'notes';

    public function category(){
        return $this->belongsTo('App\Models\Nomenclator');
    }
    public function User(){
        return $this->belongsTo('App\Models\User');
    }
}
