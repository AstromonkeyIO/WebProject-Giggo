<?php

try {
    $bdd = new PDO("mysql:host = localhost; dbname=Chat", "root", "root");
}catch(Exception $e) {
    
    die("ERROR : " . $e->getMessage());
    
};


?>
