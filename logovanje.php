<?php
include "init.php";

$username = $_POST['username'];
$password = $_POST['password'];

$s = $konekcija->prepare("SELECT * FROM korisnik where username = ? AND password = ?");
$s->bind_param("ss",$username,$password);
$s->execute();

$rezultatUpita = $s->get_result();
$uspesno = false;
while($red = $rezultatUpita->fetch_object()){
    $_SESSION['korisnik'] = $red;
    $_SESSION['admin'] = $red->role == 'Admin';
    $uspesno = true;
}

if($uspesno){
    header("Location: index.php");
}else{
    header("Location: ulogujSe.php?poruka=Neuspesno logovanje");
}