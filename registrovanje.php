<?php
include "init.php";

$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$username = $_POST['username'];
$password = $_POST['password'];

$s = $konekcija->prepare("INSERT INTO korisnik VALUES (null,?,?,?,?,'Korisnik')");
$s->bind_param("ssss",$ime,$prezime,$username,$password);
$uspesno = $s->execute();


if($uspesno){
    header("Location: registrujSe.php?poruka=Uspesno ste se registrovali");
}else{
    header("Location: registrujSe.php?poruka=Neuspesna registracija");
}