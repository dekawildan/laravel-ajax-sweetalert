<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komentar extends Model
{
    use HasFactory;
    protected $table = 'komentars';
    protected $fillable = ['nama','email','komentar'];
    protected $primaryKey = 'id_komentar';
    public $incrementing = true;
    public $timestamps = true;
}
