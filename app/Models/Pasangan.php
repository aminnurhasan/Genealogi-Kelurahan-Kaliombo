<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasangan extends Model
{
    use HasFactory;

    protected $table = "pasangan";

    protected $fillable = [
        'nik_suami',
        'nik_istri',
        'tglMenikah',
        'status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
