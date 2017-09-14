<?php

require_once 'configs/param.php';
require_once 'lib/menu.php';
require_once 'lib/formulaire.php';
require_once 'lib/tableau.php';
require_once 'lib/dispatcher.php';
require_once 'modeles/dao.php';


if(isset($_GET['menuPrincipalC'])){
	$_SESSION['menuPrincipalC']= $_GET['menuPrincipalC'];
}
else
{
	if(!isset($_SESSION['menuPrincipalC'])){
		$_SESSION['menuPrincipalC']="equipe";
	}
}

$menuPrincipal = new Menu("menuPrincipal");

$menuPrincipal->ajouterComposant($menuPrincipal->creerItemImage("equipe",  "images/equipe.png" , "Equipes"));
$menuPrincipal->ajouterComposant($menuPrincipal->creerItemImage("match",  "images/match.png" , "Matchs"));
$menuPrincipal->ajouterComposant($menuPrincipal->creerItemImage("classement",  "images/classement.png" , "Classement"));
$menuPrincipal->ajouterComposant($menuPrincipal->creerItemImage("historique",  "images/historique.png" , "Historique"));


include_once dispatcher::dispatch($_SESSION['menuPrincipalC']);






