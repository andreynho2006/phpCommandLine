#! /usr/bin/env php

<?php

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

require 'vendor/autoload.php';

$app = new Application('Laracast Demo', '1.0');

$app->register("sayHelloTo")
->setDescription("Offer a greeting to the giving person")
    ->addArgument("name", InputArgument::OPTIONAL, 'Your name')
    ->setCode(function(InputInterface $input, OutputInterface $output)
    {
        $message  = 'Hello, ' . $input->getargument('name');

        $output->writeln("<info>{$message}</info>");
    });

    $app->run();