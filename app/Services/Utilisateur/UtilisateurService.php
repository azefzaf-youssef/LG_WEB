<?php

namespace App\Services\Utilisateur;

interface UtilisateurService
{

    public function addPostIllustration($request);

    public function deleteIllustration($id);

    public function getIllustration($id);

    public function getListPaginationIllustrationByUser($id,$pagination);

    public function getListPaginationIllustration($pagination);

    public function addComposants($request);


}
