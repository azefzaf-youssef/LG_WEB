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

    public function getComposantLangueDefaultJson()
    {
        if(Traduction::where('id_illustration',$this->id)->where('default',true)->first())
        {
            return Traduction::where('id_illustration',$this->id)->where('default',true)->first()->composants_json;
        }
        return '[]';
    }

    public function getComposantLangueDefault()
    {

        return Traduction::where('id_illustration',$this->id)->where('default',true)->get();

    }
}
