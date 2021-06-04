<?php
    require_once('db.php');
    if(isset($_GET['controller']) && isset($_GET['action'])){
        $controller=$_GET['controller'];
        $action=$_GET['action'];
    }
    else{
        $controller='guest';
        $action='index';
    }
    
    require_once('routes.php');

?>
