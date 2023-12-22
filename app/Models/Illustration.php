<?php

namespace App\Models;

use App\Models\Langue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Illustration extends Model
{

    protected $table = 'illustration';

    public function langue()
    {
        return $this->belongsTo(Langue::class, 'id_langue');
    }

}
