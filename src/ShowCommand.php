<?php

namespace Acme;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class ShowCommand extends Command 

    private $database;
{
    public function __construct(DatabaseAdapter $database) 
    {
        $this->database = $database;

        parent::__construct();
    }

    public function configure()
    {
        $this->setName("sayHelloTo")
             ->setDescription("Offer a greeting to the giving person");
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->showTasks($output);
    }

    public function showTasks($output)
    {
        $tasks = $this->database->fetchAll('tasks');

        $table = new Table($output);

        $table->setHeaders(['Id', 'Description'])
              ->setRows($tasks)
              ->render();
    }
}