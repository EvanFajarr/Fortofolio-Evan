<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class education extends Model
{
    use HasFactory;
    protected $fillable = [ 'judul','desc','foto' ];
    protected $table = 'education';
    public $timestamps = false;
}
