<?php
include "init.php";
$_SESSION['korisnik'] = null;
$_SESSION['admin'] = false;
header("Location: index.php");