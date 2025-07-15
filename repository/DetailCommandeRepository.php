<?php

class DetailCommandeRepository 
{

    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::connect();
    }
}

?>