<?php

class Database
{
    /**
     * Connection object
     *
     * @var Object
     */
    private $__connection = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->__connection();
    }

    /**
     * __connection method it will connect to the database
     *
     * @return void
     */
    private function __connection()
    {
        include 'src/Config/database.php';
        try {
            $dns = "mysql:host={$databaseConfig['host']};dbname={$databaseConfig['database']}";
            $this->__connection = new PDO(
                $dns,
                $databaseConfig['username'],
                $databaseConfig['password']
            );
        } catch (PDOException $e) {
            echo $e->getMessage();
            die;
        }
    }

    /**
     * getConnection method it will return the PDO connection.
     *
     * @return PDOStatement
     */
    public function getConnection()
    {
        return $this->__connection;
    }
}