<?php
/*------------------------------------------------------------------------*/
/*------------------- Class perso de connexion BDD -----------------------*/
/*-- Faire $BDD = new connexionBDD($dbname, $dbhost, $dbuser, $dbpass); --*/
/*-- Lancer la connexion avec $BDD->connexion(); -------------------------*/
/*------------------------------------------------------------------------*/
class ConnexionBDD {
	var $namedb;
	var $hostdb;
	var $userdb;
	var $passdb;
	
	function ConnexionBDD($BDDname, $BDDhost, $BDDuser, $BDDpass) {
		$this->namedb = $BDDname;
		$this->hostdb = $BDDhost;
		$this->userdb = $BDDuser;
		$this->passdb = $BDDpass;
		
		if (!$BDDquery = mysql_connect($this->hostdb, $this->userdb, $this->passdb)) {
			echo 'Connexion impossible à Mysql';
			exit;
		}
		if (!mysql_select_db($this->namedb, $BDDquery)) {
			echo 'Sélection de base de données impossible';
		}
	}
}

// Gestion de la connexion SQL (avec ma méthode personnalisée)
$base    = "docteur";
$serveur = "localhost";
$login   = "root";
$passe   = "";
$connect = new ConnexionBDD($base, $serveur, $login, $passe);
?>