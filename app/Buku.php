<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table='buku';
    protected $primaryKey='id';
    protected $fillable =['judul','penulis','deskripsi','tgl_terbit','foto'];
    protected $dates=['tgl_terbit'];
}
