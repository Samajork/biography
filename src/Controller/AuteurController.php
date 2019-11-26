<?php

namespace App\Controller;

use App\Repository\AuteurRepository;
use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AuteurController extends AbstractController
{
    /**
     * @Route("/auteur", name="auteur")
     */
    public function index()
    {
        return $this->render('auteur/index.html.twig', [
            'controller_name' => 'AuteurController',
        ]);
    }
    /**
     * @Route("/auteur_list", name="auteur_list")
     */
    public function auteurList(AuteurRepository $auteurRepository)
    {
        $auteurList = $auteurRepository->findAll();
        return $this->render('auteur/auteur.html.twig', [
            'auteurList' => $auteurList
        ]);
    }

        /**
     * @Route("/auteur{id}", name="auteur_id")
     */
    public function auteur(AuteurRepository $auteurRepository, $id){
        $auteur = $auteurRepository->find($id);
        return $this->render('auteur/auteurId.html.twig',[
            'auteur' => $auteur
        ]);


    }

    /**
     * @Route("/auteur_Bio/{word}", name="auteur_Bio")
     */
    public function getauteurbyBio(AuteurRepository $auteurRepository, $word)
    {//auteur repository contient une instance de la classe 'auteurRepository
        //généralement on obtient une instance de la classe objet en utilisant le mot clé 'new'
        $auteurs = $auteurRepository->GetAuteurByBio($word);
        //J'appelle la methode getauteurbybio de mon repo auteur
        // et je passe en parametre la variable word'
       // cette methode ira chercher les mots dans biographie
        return $this->render('auteur/auteur.html.twig',[
            'auteur' => $auteurs
        ]);

    }
}
