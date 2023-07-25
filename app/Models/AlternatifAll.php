<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlternatifAll extends Model
{
    use HasFactory;
    protected $fillable = ['id_kriteria', 'id_subkriteria', 'name_warga'];
}
