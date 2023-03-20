<?php

namespace App\Service;

use App\Entity\Favourite;
use App\Entity\Fruit;
use App\Repository\FavouriteRepository;
use Doctrine\ORM\EntityManagerInterface;

class FavouriteService
{
    private EntityManagerInterface $entityManager;
    private FavouriteRepository $favouriteRepository;

    /**
     * @param EntityManagerInterface $entityManager
     * @param FavouriteRepository $favouriteRepository
     */
    public function __construct(EntityManagerInterface $entityManager, FavouriteRepository $favouriteRepository)
    {
        $this->entityManager = $entityManager;
        $this->favouriteRepository = $favouriteRepository;
    }

    public function updateFavourite(Fruit $fruit): bool
    {
        $favourite = $fruit->getFavourite();

        if ($favourite) {
            $this->favouriteRepository->remove($favourite, true);

            return true;
        } else {
            $favouritesCount = $this->favouriteRepository->findAll();
            if (count($favouritesCount) < 10) {
                $favourite = new Favourite();
                $favourite->setFruit($fruit);
                $this->favouriteRepository->save($favourite, true);

                $fruit->setFavourite($favourite);

                return true;
            }
        }

        return false;
    }
}
