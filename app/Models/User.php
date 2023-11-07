<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'user';
    
    protected $fillable = [
        'email',
        'password',
        'nama',
        'jk',
        'ayah',
        'ibu',
        'pasangan_id',
        'tglLahir',
        'agama',
        'anakKe',
        'tglMeninggal',
        'meninggal',
        'alamat',
        'hp',
        'status',
        'foto',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pasangan(){
        return $this->hasOne(Pasangan::class);
    }

    // public function profileLink($type = 'profile')
    // {
    //     $type = ($type == 'chart') ? 'chart' : 'show';
    //     return link_to_route('users.'.$type, $this->name, [$this->id]);
    // }
}
