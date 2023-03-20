<?php

namespace App\Service;

use App\Entity\Fruit;
use App\Entity\Nutrition;
use App\Repository\FruitRepository;
use App\Repository\NutritionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class FruityViceApiService
{
    private HttpClientInterface $client;
    private EntityManagerInterface $entityManager;
    private FruitRepository $fruitRepository;
    private NutritionRepository $nutritionRepository;

    /**
     * @param HttpClientInterface $client
     * @param EntityManagerInterface $entityManager
     * @param FruitRepository $fruitRepository
     * @param NutritionRepository $nutritionRepository
     */
    public function __construct(
        HttpClientInterface $client,
        EntityManagerInterface $entityManager,
        FruitRepository $fruitRepository,
        NutritionRepository $nutritionRepository
    ) {
        $this->client = $client;
        $this->entityManager = $entityManager;
        $this->fruitRepository = $fruitRepository;
        $this->nutritionRepository = $nutritionRepository;
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function getAllFruits()
    {
        $response = $this->client->request(
            'GET',
            'https://fruityvice.com/api/fruit/all'
        );

        if ($response->getStatusCode() === 200) {
            $this->saveData($response->toArray());
        }
    }

    public function saveData(array $data): void
    {
        foreach ($data as $item) {
            $fruit = $this->entityManager->getRepository(Fruit::class)->findOneBy(['fruity_vice_id' => $item['id']]);

            if (!$fruit) {
                $fruit = new Fruit();
            }

            $fruit->setFruityViceId($item['id']);
            $fruit->setName($item['name']);
            $fruit->setFamily($item['family']);
            $fruit->setFruitOrder($item['order']);
            $fruit->setGenus($item['genus']);
            $this->fruitRepository->save($fruit, true);

            $nutrition = $this->entityManager->getRepository(Nutrition::class)->findOneBy(['fruit_id' => $fruit->getId()]);

            if (!$nutrition) {
                $nutrition = new Nutrition();
            }

            $nutrition->setFruitId($fruit->getId());
            $nutrition->setCarbohydrates($item['nutritions']['carbohydrates']);
            $nutrition->setProtein($item['nutritions']['protein']);
            $nutrition->setFat($item['nutritions']['fat']);
            $nutrition->setCalories($item['nutritions']['calories']);
            $nutrition->setSugar($item['nutritions']['sugar']);

            $this->nutritionRepository->save($nutrition, true);
        }
    }
}
