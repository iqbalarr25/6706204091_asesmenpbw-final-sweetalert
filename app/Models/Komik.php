<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komik extends Model
{
    use HasFactory;
    protected $table = 'komik';
    protected $fillable = ['isbn','judul','penulis','penerbit','tahun_terbit','harga','image'];
    protected $guarded = [];
}
