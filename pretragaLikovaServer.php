<?php

include 'init.php';

$idFilma = $_GET['id'];

$lik = new LikoviClass();

$likovi = $lik->pretraziPoFilmu($konekcija,$idFilma);

echo json_encode($likovi);

