<?php
// Fichiers requis
require ('conf/connexion.php');
require ('conf/constantes.php');
require ('conf/functions.php');

// Fichiers modèles
require ('modele/m_home.php');
require ('modele/m_category.php');
require ('modele/m_product.php');
require ('modele/m_user.php');

// En-tête
include_once ('layouts/header.php');

// Contenu central
if(isset($_GET['vue']))
{
	$vue = $_GET['vue'];
	include ("vue/$vue");
}
else include ('vue/v_home.php');

// Pied de page	
include_once ('layouts/footer.php');
?>