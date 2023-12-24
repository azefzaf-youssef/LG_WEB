<?php

namespace App\Services\Illustration;

use Auth;
use App\Models\Traduction;
use App\Models\Illustration;

class IllustrationServiceImpl implements IllustrationService
{

    public function addPostIllustration($request)
    {

        try {

            $illustration = new Illustration();
            $path = 'public/illustrattion/' . date('y-m-d');
            $rs = \Storage::putFile($path, $request->file('illustration'));
            $rs = str_replace("public", "storage", $rs);
            $illustration->path_illustration = $rs;
            $illustration->titre = $request->get('titre');
            $illustration->id_langue = $request->get('langue');
            $illustration->id_domaine = $request->get('domaine');
            $illustration->id_user = Auth::user()->id;

            $illustration->save();

            return response()->json(['message'], 200);

        } catch (\Throwable $th) {

            return response()->json(['error' => $th], 400);

        }

    }

    public function deleteIllustration($titre)
    {

        $illustration = $this->getIllustration($titre);
        if ($illustration->delete()) {
            return true;

        }
        return false;

    }

    public function deleteIllustrationTraduction($id)
    {

        $traduction = Traduction::find($id);
        if ($traduction->delete()) {
            return true;

        }
        return false;

    }

    public function getIllustration($titre)
    {
        return Illustration::where('titre',$titre)->first();
    }

    public function getListPaginationIllustrationByUser($id, $pagination)
    {
        return Illustration::where('id_user', $id)->paginate($pagination);
    }

    public function getListPaginationIllustration($pagination)
    {
        return Illustration::paginate($pagination);
    }

    public function addComposants($request)
    {

        try {

            $traduction = new Traduction();
            $illustration = $this->getIllustration($request->get('titre'));
            $traduction->id_user = Auth::user()->id;
            $traduction->id_langue = $illustration->id_langue;
            $traduction->composants_json = $request->get('composants');
            $traduction->id_illustration = $illustration->id;
            $traduction->default = true;
            $traduction->save();

            return response()->json(['message'], 200);

        } catch (\Throwable $th) {

            return response()->json(['error' => $th], 400);

        }
    }



    public function editComposants($request)
    {

        try {
            $illustration = $this->getIllustration($request->get('titre'));

            $traduction = Traduction::where('id_illustration',$illustration->id)->where('default',true)->first();
            $traduction->id_user = Auth::user()->id;
            $traduction->id_langue = $illustration->id_langue;
            $traduction->composants_json = $request->get('composants');
            $traduction->id_illustration = $illustration->id;
            $traduction->default = true;
            $traduction->save();

            return response()->json(['message'], 200);

        } catch (\Throwable $th) {

            dd($th);

            return response()->json(['error' => $th], 400);

        }
    }


    public function addTraductionComposants($request)
    {
        try {

            $traduction = new Traduction();
            $illustration = $this->getIllustration($request->get('id'));
            $traduction->id_user = Auth::user()->id;
            $traduction->id_langue = $request->get('id_langue');
            $traduction->composants_json = $request->get('composants');
            $traduction->id_illustration = $request->get('id');
            $traduction->default = false;
            $traduction->save();

            return response()->json(['message'], 200);

        } catch (\Throwable $th) {

            return response()->json(['error' => $th], 400);

        }

    }

    public function editTraductionComposants($request)
    {
        try {

            $traduction =  Traduction::where('id_langue',$request->get('id_langue'))->where('id_illustration',$request->get('id'))->first();
            $traduction->composants_json = $request->get('composants');
            $traduction->save();

            return response()->json(['message'], 200);

        } catch (\Throwable $th) {

            return response()->json(['error' => $th], 400);

        }

    }

}
