<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novel extends Model
{
    use HasFactory;
    protected $table = 'novel';
    protected $fillable = ['isbn','judul','penulis','penerbit','tahun_terbit','harga','image'];
}