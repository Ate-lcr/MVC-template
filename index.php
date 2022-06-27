<?php
//Inclusion des fichiers principaux
include_once '_config/config.php';
include_once '_config/db.php';
include_once '_functions/function.php';

//Définition de la page courante
if(isset($_GET['page']) && !empty($_GET['page'])){
    $page = str_secur(strtolower($_GET['page']));
}else{
    $page = 'home';
}

//Array contenant toutes les pages du dossier controller
$allPages = scandir('controllers/');

//Verification de l'existence de la page
if(in_array($page . '_controller.php', $allPages)){
    include_once 'models/' . $page . '_model.php';
    include_once 'controllers/' . $page . '_controller.php';
    include_once 'views/' . $page . '_view.php';

}else{
    echo 'Erreur 404';
}
