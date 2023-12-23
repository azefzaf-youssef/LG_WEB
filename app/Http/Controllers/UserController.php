<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Langue;
use App\Models\Traduction;
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
        $this->middleware('auth');
        $this->data = [];
        $this->utilisateurService = $utilisateurService;
    }

    public function index()
    {
        $data = $this->data ;
        $data['user'] =$user= Auth::user();
        $data['langues'] = Langue::all();
        $data['illustrations'] = $this->utilisateurService->getListPaginationIllustrationByUser($user->id,6);

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

        $data = $this->data ;
        $data['illustration']=$illustration=$this->utilisateurService->getIllustration($id);
        $data['composants'] = json_decode($illustration->getComposantLangueDefaultJson());
        $data['langues'] = Langue::all();
        return view('utilisateur.affichage_composant')->with($data);

    }

    public function addComposantIllustration($id)
    {
        $data = $this->data ;
        $data['illustration']=$this->utilisateurService->getIllustration($id);
        return view('utilisateur.add_composant')->with($data);

    }

    public function editComposantIllustration($id)
    {
        $data = $this->data ;
        $data['illustration']=$illustration=$this->utilisateurService->getIllustration($id);
        $data['composants'] = json_decode($illustration->getComposantLangueDefaultJson());
        return view('utilisateur.edit_composant')->with($data);

    }

    public function postAddComposantIllustration(Request $request)
    {

        return $this->utilisateurService->addComposants($request);


    }

    public function postEditComposantIllustration(Request $request)
    {

        return $this->utilisateurService->editComposants($request);


    }
}
