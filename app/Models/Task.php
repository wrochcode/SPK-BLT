<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /*penggunaan guarded bisa digunakan untuk website yang bersifat pribadi */
    // protected $guarded = []; 

    /*penggunaan fillable bisa digunakan untuk website yang bersifat publik seperti pendaftaran online dll */
    protected $fillable = ['list'];

    
}
