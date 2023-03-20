<?php

namespace App\Command;

use App\Service\FruityViceApiService;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(
    name: 'app:get-all-fruits',
    description: 'Gets all fruits from FruityVice',
    aliases: ['app:get-all-fruits'],
    hidden: false
)]
class GetAllFruitsCommand extends Command
{
    private FruityViceApiService $fruityViceApiService;

    /**
     * @param $projectDir
     * @param FruityViceApiService $FruityViceApiService
     */
    public function __construct($projectDir, FruityViceApiService $FruityViceApiService)
    {
        $this->fruityViceApiService = $FruityViceApiService;

        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription("Get All Fruit");
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $this->fruityViceApiService->getAllFruits();
            return Command::SUCCESS;
        } catch (TransportExceptionInterface $e) {
            return Command::FAILURE;
        }
    }
}