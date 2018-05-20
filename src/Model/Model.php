<?php

require_once 'src/Datasource/Database.php';
require_once 'src/Utilities/Text.php';

abstract class Model
{
    /**
     * Database object
     *
     * @var Object
     */
    private $__connection = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        $database = new Database();
        $this->__connection = $database->getConnection();
    }

    /**
     * getDatabase method it will return a database connection
     *
     * @return PDOStatement
     */
    public function getConnection()
    {
        return $this->__connection;
    }

    /**
     * execute method It will execute the queries
     *
     * @param string $sql SQL statement
     * @return mixed PDOStatement|bool 
     */
    public function execute($sql)
    {
        $statement = $this->getConnection()->query($sql);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * create method It will create a record
     *
     * @param string $sql SQL statement
     * @return bool 
     */
    public function create($data)
    {
        $describe = $this->describe();
        $tableName = $this->tableName();
        $data = array_diff($data, $describe);

        $columns = implode(', ', array_keys($data));
        $sql = "INSERT INTO " . $tableName . " (" . $columns . ") VALUES (";

        $values = '';
        foreach ($data as $key => $value) {
            $values .= ':' . $key . ', ';
        }
        $values = substr($values, 0, -2);

        $sql .= $values . ') ';

        $statement = $this->getConnection()->prepare($sql);

        $statement->execute($data);

        return $statement->rowCount();
    }

    /**
     * update method It will update a record
     *
     * @param string $sql SQL statement
     * @return bool 
     */
    public function update($data)
    {
        $describe = $this->describe();
        $tableName = $this->tableName();
        $data = array_diff($data, $describe);

        $sql = "UPDATE " . $tableName . " SET %s WHERE id = :id";

        $values = '';
        foreach ($data as $key => $value) {
            $values .= $key . ' = :' . $key . ', ';
        }

        $values = substr($values, 0, -2);
        $sql = sprintf($sql, $values);

        $statement = $this->getConnection()->prepare($sql);
        foreach ($data as $field => $value) {
            $statement->bindValue(':' . $field, $value);  
        }

        $statement->execute();

        return $statement->rowCount();
    }

    /**
     * read method It will get a record
     *
     * @param string $sql SQL statement
     * @return bool 
     */
    public function read($id)
    {
        $tableName = $this->tableName();
        $sql = "SELECT * FROM " . $tableName . " WHERE id = :id";

        $statement = $this->getConnection()->prepare($sql);

        $statement->execute(['id' => $id]);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * delete method It will delete the record
     *
     * @param string $sql SQL statement
     * @return bool 
     */
    public function delete($id)
    {
        $tableName = $this->tableName();
        $sql = "DELETE FROM " . $tableName . " WHERE id = :id";

        $statement = $this->getConnection()->prepare($sql);

        $statement->execute(['id' => $id]);

        return $statement->rowCount();
    }

    /**
     * delete method It will list the records
     *
     * @param string $sql SQL statement
     * @return bool 
     */
    public function list()
    {
        $tableName = $this->tableName();

        $statement = $this->getConnection()->prepare("SELECT * FROM " . $tableName);

        $statement->execute(['id' => $id]);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * describe method It will describe the current table
     *
     * @return bool 
     */
    public function describe()
    {
        $tableName = $this->tableName();
        $table = $this->execute('SHOW FULL COLUMNS FROM ' . $tableName);
        
        foreach ($table as $key => $value) {
            $table[$value['Field']] = $value['Field'];
            unset($table[$key]);
        }

        return $table;
    }

    /**
     * tableName method It will return the table name based on the model instance
     *
     * @return string 
     */
    public function tableName()
    {
        $modelName = strtolower(get_class($this));

        $tableName = Text::plural($modelName);

        return $tableName;
    }
}