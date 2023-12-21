<?php

namespace App\Services\Utilisateur;
use App\Models\Illustration;
use Auth ;


class UtilisateurServiceImpl implements UtilisateurService
{

    public function addPostIllustration($request){

       try {

        $illustration = new Illustration();
        $path = 'public/illustrattion/' . date('y-m-d');
        $rs = \Storage::putFile($path, $request->file('illustration'));
        $rs = str_replace("public", "storage", $rs);
        $illustration->path_illustration = $rs ;
        $illustration->titre = $request->get('titre') ;
        $illustration->id_langue = $request->get('langue') ;
        $illustration->id_user = Auth::user()->id;

        $illustration->save();

        return response()->json(['message'],200) ;


       }
        catch (\Throwable $th) {
            //throw $th;
        return response()->json(['error'=>$th],400) ;

        }

    }


    public function deleteIllustration($id){

        $illustration = Illustration::find($id);
        if($illustration->delete())
        {
            return true;

        }
        return false;

    }


}
