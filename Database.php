<?php

class Database 
{
    public $connection;

    public function __construct($config)
    {

        

        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, 'root', '', [

            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC

        ]);
    
    }

    /**
     * Summary of query
     * @param mixed $query
     * @return PDOStatement|bool
     */
    public function query($query)
    {
        $statement = $this->connection->prepare($query);
        $statement->execute();

        return $statement;


    }
}
?>