<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phase extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'duree',
        'date_de_debut',
        'date_de_fin',
        'statut'
    ];

    public function employe()
    {
        return $this->hasOne(User::class);
    }

    public function projet()
    {
        return $this->hasOne(Projet::class);
    }
}
