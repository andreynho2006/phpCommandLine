#! /usr/bin/env php

<?php

use Acme\SayHelloCommand;

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

require 'vendor/autoload.php';

$app = new Application('Laracast Demo', '1.0');

$app->add(new SayHelloCommand);

$app->run();