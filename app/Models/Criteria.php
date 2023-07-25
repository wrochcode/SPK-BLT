<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;

    protected $fillable = ['kriteria', 'bobot_kriteria',];

    // public function user(){
        
    //     return $this->belongsTo(User::class);
    //     // return $this->belongsTo(User::class, 'foreign_key');
    // }
}


