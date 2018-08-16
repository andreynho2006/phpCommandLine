#! /usr/bin/env php

<?php

use Symfony\Component\Console\Application;


require 'vendor/autoload.php';

$app = new Application('Task App', '1.0');


//connect to database
try 
{
    $pdo = new PDO('sqlite:db.sqlite');

    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $exception) 
{

    echo 'Could not connect to the database';
    exit(1);

}


//pass connection to adapter
$dbadapter = new Acme\DatabaseAdapter($pdo);


//pass adapter to show command
$app->add(new Acme\ShowCommand($dbadapter));

//pass adapter to add command
$app->add(new Acme\AddCommand($dbadapter));

//pass adapter to add command
$app->add(new Acme\CompleteCommand($dbadapter));

$app->run();
