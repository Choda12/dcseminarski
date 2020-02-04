<?php

include 'php/konekcija.php';
include 'php/FilmClass.php';
include 'php/LikoviClass.php';

session_start();

if(!isset($_SESSION['korisnik'])){
    $_SESSION['korisnik'] = null;
    $_SESSION['admin'] = false;
}