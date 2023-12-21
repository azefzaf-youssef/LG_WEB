<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Langue;
use App\Models\Illustration;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\IllustrationRequest;
use  App\Services\Utilisateur\UtilisateurService;

class UserController extends Controller
{
    //
    private $utilisateurService;
    private $data;

    public function __construct(UtilisateurService $utilisateurService) {
        $this->data = [];
        $this->utilisateurService = $utilisateurService;
    }

    public function index()
    {
        $data = $this->data ;
        $data['user'] =$user= Auth::user();
        $data['langues'] = Langue::all();
        $data['illustrations'] = Illustration::where('id_user',$user->id)->paginate(6);

        return view('utilisateur.index')->with($data);
    }

    public function addPost(IllustrationRequest $request)
    {

        return $this->utilisateurService->addPostIllustration($request);

    }

    public function deleteIllustration($id)
    {
        return response()->json([$this->utilisateurService->deleteIllustration($id)]);

    }

    public function afficherIllustration($id)
    {

        return view('utilisateur.affichage_composant')->with($data);

    }

    public function addComposantIllustration($id)
    {
        return view('utilisateur.add_composant')->with($data);

    }
}
