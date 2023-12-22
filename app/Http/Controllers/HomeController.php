<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Langue;
use  App\Services\Utilisateur\UtilisateurService;


class HomeController extends Controller
{
    private $utilisateurService;
    private $data;

    public function __construct(UtilisateurService $utilisateurService) {
        $this->data = [];
        $this->utilisateurService = $utilisateurService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = $this->data ;
        $data['illustrations'] = $this->utilisateurService->getListPaginationIllustration(6);
        return view('home')->with($data);
    }
}
