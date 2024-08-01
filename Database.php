<?php

// class Person
// {

//     public $name;
//     public $age;
//     public function breathe()
//     {
//         echo "$this->name is breathing";
//     }


// }

// $person = new Person();

// $person->name = "Jhon Doe";
// $person->age = "25";

// dd($person->breathe());

class Database
{

    public $connection;

    public $statement;

    public function __construct($config, $username = 'root', $password = 'Infedele1980!')
    {



        $dsn = 'mysql:' . http_build_query($config, '', ';'); //better version of dsn
        // dd($dsn);
        // $dsn = "mysql:host={$config['host']}; port={$config['port']};dbname={$config['dbname']}; charset={$config['charset']}";



        $this->connection = new PDO($dsn, $username, $password, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);

    }

    public function query($query, $params = [])
    {

        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this;

    }

    public function find()
    {

        return $this->statement->fetch();
    }

    public function findOrFail()
    {

        $result = $this->find();

        if (!$result) {
            abort();
        }

        return $result;
    }

    public function get()
    {

        return $this->statement->fetchAll();

    }

}