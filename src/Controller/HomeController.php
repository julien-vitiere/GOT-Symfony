<?php

namespace App\Controller;

use App\Repository\CharacterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="default")
     * @Route("/home", name="app_home")
     */
    public function index(CharacterRepository $postRepository): Response
    {
        $allCharacters = $postRepository->findAll();

        return $this->render('home/index.html.twig', [
            "allCharactersFromBdd" => $allCharacters,
        ]);
    }

     /**
     * @Route("/character/{id}", name="character_read", requirements={"id"="\d+"})
     */
    public function read($id, CharacterRepository $characterRepository)
    {
       
        // injection de dépendance du repository
        $characterFromBdd = $characterRepository->find($id);

        
        
        return $this->render("home/read.html.twig", [
            "character" => $characterFromBdd
            
        ]);
    }
}
