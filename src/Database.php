<?php

namespace JacaDanseBack;

use Exception;
use mysqli;

class Database
{
    /**
     * @var mysqli
     */
    private $connection;

    public function getDsn()
    {
        switch (ENV) {
            case 'dev':
                return array(
                    'host' => '127.0.0.1',
                    'database' => 'jacadanse',
                    'login' => 'root',
                    'password' => '',
                );
                break;
            case 'prod':
                return array(
                    'host' => '127.0.0.1',
                    'database' => 'jacadanse',
                    'login' => 'root',
                    'password' => '',
                );
                break;
            default:
                throw new Exception('Fichier de configuration erroné');
        }
    }

    /*
     * Connexion à la base de donnée
     */
    public function connect()
    {
        $dsn = $this->getDsn();
        $con = new mysqli($dsn['host'], $dsn['login'], $dsn['password'], $dsn['database']);

        if ($con->connect_errno) {
            throw new Exception('Connect failed (' . $con->connect_errno . ') ' . $con->connect_error);
        }

        $this->connection = $con;
    }

    /*
     * Fermeture de la connexion
     */
    public function close()
    {
        $this->connection->close();
    }

    /*
     * Destruction des tables de la base
     */
    public function dropTables()
    {
        /* USER */
        $sql = "DROP TABLE IF EXISTS user";

        if (!$this->connection->query($sql)) {
            throw new Exception('Problèmes lors de la suppression de la table User : ' . $this->connection->error);
        }

        /* ACTUALITE */
        $sql = "DROP TABLE IF EXISTS actualite";

        if (!$this->connection->query($sql)) {
            throw new Exception('Problèmes lors de la suppression de la table Actualité : ' . $this->connection->error);
        }
    }

    /*
     * Création des tables de la base
     */
    public function initSchema()
    {
        /* USER */
        $sql = "CREATE TABLE IF NOT EXISTS user(
                    id int(11) NOT NULL AUTO_INCREMENT,
                    email varchar(32) NULL,
                    password varchar(32) NULL,
                    PRIMARY KEY (id)
                )
                ENGINE=MyISAM DEFAULT CHARSET=utf8";

        if (!$this->connection->query($sql)) {
            throw new Exception('Problèmes lors de la création de la table User : ' . $this->connection->error);
        }

        /* ACTUALITE */
        $sql = "CREATE TABLE IF NOT EXISTS actualite(
                    id int(11) NOT NULL AUTO_INCREMENT,
                    titre varchar(32) NULL,
                    description text NULL,
                    date datetime NULL,
                    PRIMARY KEY (id)
                )
                ENGINE=MyISAM DEFAULT CHARSET=utf8";

        if (!$this->connection->query($sql)) {
            throw new Exception('Problèmes lors de la création de la table Actualité : ' . $this->connection->error);
        }
    }

    public function insertUser($email, $password)
    {
        $sql = 'INSERT INTO user (email, password)
                VALUES (' . $email . ', ' . $password . ');';

        if (!$this->connection->query($sql)) {
            throw new Exception('Error: ' . $this->connection->error . ' (' . $sql . ')');
        }
    }

    public function insertActualite($titre, $description, $date)
    {
        if (!$titre || !$description) {
            return false;
        }
        // TODO : fix insert date
        $date = date("Y-m-d H:i:s", strtotime($date));
        $sql = 'INSERT INTO actualite (titre, description, date)
                VALUES (' . $titre . ', ' . $description . ', "' . $date . '");';

        if (!$this->connection->query($sql)) {
            throw new Exception('Error: ' . $this->connection->error . ' (' . $sql . ')');
        }

        return true;
    }

    public function fetchActualites()
    {
        if ($result = $this->connection->query('SELECT * FROM actualite')) {
            $data = array();
            while ($row = $result->fetch_array()) {
                $data[] = $row;
            }
            $result->close();
            return $data;
        } else {
            throw new Exception('Error: ' . $this->connection->error);
        }
    }

    public function checkLogin($email, $password)
    {
        if ($result = $this->connection->query('SELECT * FROM user')) {
            $data = array();
            while ($row = $result->fetch_array()) {
                if ($row['email'] == $email && $row['password'] == $password) {
                    return true;
                }
            }
            $result->close();
            return false;
        } else {
            throw new Exception('Error: ' . $this->connection->error);
        }
    }

    private function escape($values, $quotes = true)
    {
        $quotes = array(
            "\xC2\xAB"     => '"', // « (U+00AB) in UTF-8
            "\xC2\xBB"     => '"', // » (U+00BB) in UTF-8
            "\xE2\x80\x98" => "'", // ‘ (U+2018) in UTF-8
            "\xE2\x80\x99" => "'", // ’ (U+2019) in UTF-8
            "\xE2\x80\x9A" => "'", // ‚ (U+201A) in UTF-8
            "\xE2\x80\x9B" => "'", // ‛ (U+201B) in UTF-8
            "\xE2\x80\x9C" => '"', // “ (U+201C) in UTF-8
            "\xE2\x80\x9D" => '"', // ” (U+201D) in UTF-8
            "\xE2\x80\x9E" => '"', // „ (U+201E) in UTF-8
            "\xE2\x80\x9F" => '"', // ‟ (U+201F) in UTF-8
            "\xE2\x80\xB9" => "'", // ‹ (U+2039) in UTF-8
            "\xE2\x80\xBA" => "'", // › (U+203A) in UTF-8
        );

        if (is_array($values)) {
            foreach ($values as $key => $value) {
                $values[$key] = $this->escape($value, $quotes);
            }
        } else {
            if ($values === null || strlen(trim($values)) == 0) {
                $values = 'NULL';
            } else {
                if (is_bool($values)) {
                    $values = $values ? 1 : 0;
                } else {
                    if (!is_numeric($values)) {
                        $values = $this->connection->real_escape_string($values);
                        if ($quotes) {
                            $values = '"' . trim(preg_replace('!\s+!', ' ', $values)) . '"';
                            $values = strtr($values, $quotes);
                        }
                    }
                }
            }
        }
        return $values;
    }
}