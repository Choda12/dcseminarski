<?php
require 'flight/Flight.php';
include '../init.php';

Flight::route('/', function(){
   echo "Nas api za dc filmove";
});

Flight::route('GET /likovi',function (){
    header("Content-Type: application/json; charset=utf-8");
    /** @var Mysqli $konekcija */
    $konekcija = new Mysqli('localhost','root','','dcseminarski');
    $konekcija->set_charset('utf8');
    $rez = $konekcija->query("SELECT * FROM likovi");
    $niz = [];
    while($red = $rez->fetch_object()){
        $niz[] = $red;
    }
    echo(json_encode($niz));
});

Flight::route('GET /filmovi',function (){
    header("Content-Type: application/json; charset=utf-8");
    /** @var Mysqli $konekcija */
    $konekcija = new Mysqli('localhost','root','','dcseminarski');
    $konekcija->set_charset('utf8');
    $rez = $konekcija->query("SELECT * FROM film");
    $niz = [];
    while($red = $rez->fetch_object()){
        $niz[] = $red;
    }
    echo(json_encode($niz));
});

Flight::route('POST /noviFilm',function (){
    header("Content-Type: application/json; charset=utf-8");
    /** @var Mysqli $konekcija */
    $konekcija = new Mysqli('localhost','root','','dcseminarski');
    $konekcija->set_charset('utf8');
    $post_data = file_get_contents('php://input');
    $podaci = json_decode($post_data,true);
    $s = $konekcija->prepare("INSERT INTO film(nazivFilma,godina,opis) VALUES (?,?,?)");
    $s->bind_param("sis",$podaci['nazivFilma'],$podaci['godina'],$podaci['opis']);
    $rez = $s->execute();
    if($rez){
        echo json_encode("Uspesno");
    }else{
        echo(json_encode("Doslo je do greske"));
    }
});

Flight::start();
