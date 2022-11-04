<?php


try {
    $username= "root";
    $password ="";
    $dbh = new PDO('mysql:host=localhost;dbname=funeral_db',$username,$password); // this is the db hanlder
    return $dbh;
} catch (PDOException $e) {
    print "EnockEroo! :". $e->getMessage(). "<br>";
    die();
}
?>


