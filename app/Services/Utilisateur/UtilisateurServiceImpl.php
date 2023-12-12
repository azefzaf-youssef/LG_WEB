<?php

namespace App\Services\Utilisateur;
use App\Models\Illustration;
use Auth ;


class UtilisateurServiceImpl implements UtilisateurService
{

    public function addPostIllustration($request){

        $illustration = new Illustration();
        $path = 'public/illustrattion/' . date('y-m-d');
        $rs = \Storage::putFile($path, $request->file('illustration'));
        $illustration->path_illustration = $rs ;
        $illustration->titre = $request->get('titre') ;
        $illustration->id_langue = $request->get('langue') ;
        $illustration->id_user = Auth::user()->id;

        if($illustration->save())
        {
            return true;

        }
        return false;




    }

}
