<?php


class DatabaseAdapter {

    protected $connection;

    function __construct(PDO $connection)
    {

        $this->connection = $connection;

    }

    public function fetchAll($tableName)
    {

        return $this->connection->query('select * from '. $tableName)->fetchAll();

    }

    public function sql($sql, $parameters)
    {

        return $this->connection->prepare($sql)->execute($parameters);

    }
}