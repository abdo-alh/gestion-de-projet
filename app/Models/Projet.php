<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'reference',
        'titre',
        'budget',
        'periodeestimeee',
        'datedebut',
        'datefin',
        'matriculation'
    ];

    public function employe()
    {
        return $this->hasOne(User::class);
    }


}
