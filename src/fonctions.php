<?php 
    function deconnexion(){
        unset($_SESSION['user']);
        unset( $_SESSION['statut']);
        session_destroy();
    }
    function is_connect (){
        if (!isset($_SESSION['statut'])){
            header ("location:index.php");
        }
    }
    
?>