<?php
include 'init.php';

$likID = trim($_GET['id']);

$lik = new LikoviClass();
$lik->setLikID((int)$likID);

$sacuvano = $lik->obrisi($konekcija);

if($sacuvano){
    header("Location: administracija.php?poruka=Uspesno obrisan lik");
}else{
    header("Location: administracija.php?poruka=Neuspesno brisanje lika");
}