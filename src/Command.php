<?php

namespace Acme;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class Command extends SymfonyCommand 
{
    protected $database;


    public function __construct(DatabaseAdapter $database) 
    {
        $this->database = $database;

        parent::__construct();
    }
}