<?php
include 'init.php';

$film = trim($_POST['film']);
$nazivLika = trim($_POST['nazivLika']);
$nazivGlumca = trim($_POST['nazivGlumca']);
$ocena = trim($_POST['ocena']);

$filmKlasa = new FilmClass();
$filmKlasa->setFilmID((int)$film);

$lik = new LikoviClass();
$lik->setOcena((int)$ocena);
$lik->setNazivLika($nazivLika);
$lik->setNazivGlumca($nazivGlumca);
$lik->setFilm($filmKlasa);

$sacuvano = $lik->sacuvaj($konekcija);

if($sacuvano){
    echo 'Uspesno sacuvan lik';
}else{
    echo 'Neuspesno cuvanje lika';
}