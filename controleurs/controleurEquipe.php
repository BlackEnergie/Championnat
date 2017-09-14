<?php

/*****************************************************************************************************
 * Instancier un objet contenant la liste des équipes et le conserver dans une variable de session
 *****************************************************************************************************/
if(!isset($_SESSION['listeEquipes'])){
	$_SESSION['listeEquipes'] = new Equipes(EquipeDAO::lesEquipes());
	
}

/*****************************************************************************************************
 * Conserver dans une variable de session l'item actif du menu equipe
 *****************************************************************************************************/
if(isset($_GET['equipe'])){
	$_SESSION['equipe']= $_GET['equipe'];
}
else
{
	if(!isset($_SESSION['equipe'])){
		$_SESSION['equipe']="0";
	}
}


/*****************************************************************************************************
 * Créer un menu vertical à partir de la liste des équipes
 *****************************************************************************************************/
$menuEquipe = new menu("menuEquipe");


foreach ($_SESSION['listeEquipes']->getEquipes() as $uneEquipe){
	$menuEquipe->ajouterComposant($menuEquipe->creerItemLien($uneEquipe->getNomEquipe() ,$uneEquipe->getIdEquipe()));
}

$leMenuEquipes = $menuEquipe->creerMenuEquipe($_SESSION['equipe']);



/*****************************************************************************************************
 * Récupérer l'équipe sélectionnée
 *****************************************************************************************************/
$equipeActive = $_SESSION['listeEquipes']->chercheEquipe($_SESSION['equipe']);


include_once 'vues/squeletteEquipe.php';