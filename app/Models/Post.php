<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'titulo',
        'conteudo',
        'publica',
        'usuario'
    ];

    public function usuario() {
        return $this->belongsTo('App\Models\User', 'usuario');
    }
}
