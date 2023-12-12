<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Langue;
use Auth;
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
        $data['user'] = Auth::user();
        $data['langues'] = Langue::all();
        return view('utilisateur.index')->with($data);
    }

    public function addPost(Request $request)
    {
        return response()->json([$this->utilisateurService->addPostIllustration($request)]);

    }

}
