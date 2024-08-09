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

namespace Core;

use PDO;

class Database
{
    public $connection;
    public $statement;

    public function __construct($config, $username = 'root', $password = 'Infedele1980!')
    {


        $dsn = 'mysql:' . http_build_query($config, '', ';');
        // Primo parametro ($config): L'array che contiene i parametri di configurazione.
        //Secondo parametro (''): Questo parametro opzionale permette di specificare un prefisso per i nomi dei parametri (non è usato qui, quindi è una stringa vuota).
        //Terzo parametro (';'): Questo parametro opzionale definisce il separatore che verrà utilizzato tra i vari parametri nella query string generata. Qui, viene utilizzato ';' (punto e virgola) come separatore, che è lo standard per la stringa DSN di MySQL.
        //'host=localhost;port=3306;dbname=MyPhpApp;charset=utf8mb4'

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);

        $this->statement->execute($params);

        return $this;
    }

    public function get()
    {
        return $this->statement->fetchAll();
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
}