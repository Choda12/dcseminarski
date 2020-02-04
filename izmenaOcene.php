<?php
include 'init.php';

$likID = trim($_POST['lik']);
$ocena = trim($_POST['ocenaIzmena']);

$lik = new LikoviClass();
$lik->setOcena((int) $ocena);
$lik->setLikID((int) $likID);

$sacuvano = $lik->izmeni($konekcija);

if($sacuvano){
    header("Location: administracija.php?poruka=Uspesno izmenjena ocena lika");
}else{
    header("Location: administracija.php?poruka=Neuspesno izmenjena ocena lika");
}