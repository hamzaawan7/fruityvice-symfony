<?php

namespace App\Controller;

use App\Repository\FavouriteRepository;
use App\Repository\FruitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FavouriteController extends AbstractController
{
    #[Route('/favourites', name: 'app_favourite_index', methods: ['GET'])]
    public function index(
        FavouriteRepository $favouriteRepository
    ): Response {
        return $this->render(
            'favourite/index.html.twig',
            [
                'favourites' => $favouriteRepository->findAll(),
            ]
        );
    }
}
