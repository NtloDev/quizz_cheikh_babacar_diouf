<?php is_connect ();

?>
<div class="container-fluid" style="margin-left: 0%; width:100%; height: 500px; background-color:white; height: 110px;">
    <div class="row" style="height: 100px;">
        <div class="col-10 conteneur">
            <a href="index.php?lien=accueil&link=5">Accueil</a>
            <p class="navbar-brand text-center parametres" >MES PARAMETRES</p>
        </div>
        <div class="col-2 profil text-center" >
            <div class="row text-center mx-auto">
            
                <p >
                    <img src="asset/IMG/images/profils/IMG-20200513-WA0033.jpg" class="rounded-circle img-profil" alt="Cinque Terre" ><br>
                
                </p>
            </div>
            <div class="row text-center mx-auto deconnex">
                <p class="text-center mx-auto"><?php echo $_SESSION['user']['prenom_user']; ?></p>
                <a class="text-center mx-auto" href="index.php?statut=logout" >Deconnexion</a>
            </div>
        </div>
    </div>
    <div class="row" style="position:relative; top:-50px;">
        <div class="col-2" style="background-coor:red;height:40px; margin-left:3%; text-align:center;">
            <p class="menu"><a style="text-decoration:none ;position:relative; top:2.5px; color:white;" href="index.php?lien=accueil&link=1">Liste des questions</a></p>
        </div>
        <div class="col-2" style="background-coor:red;height:40px; margin-left:3%;text-align:center;">
            <p class="menu"><a style="text-decoration:none; position:relative; top:2.5px;color:white;" href="index.php?lien=accueil&link=2">Nouveau Admin</a></p>
        </div>
        <div class="col-2" style="background-coor:red;height:40px; margin-left:3%;text-align:center;">
            <p class="menu"><a style="text-decoration:none;position:relative; top:2.5px; color:white;" href="index.php?lien=accueil&link=3&numPage=1">Liste des joueurs</a></p>
        </div>
        <div class="col-2" style="background-coor:red;height:40px; margin-left:3%;text-align:center;">
            <p class="menu"><a style="text-decoration:none;position:relative; top:2.5px; color:white;" href="index.php?lien=accueil&link=4">Creer des questions</a></p>
        </div>
    </div>
</div>
<?php 
    if (isset($_GET['link']))
    {
        $link=$_GET['link'];
        switch($link)
        {
            case 1:
                require_once("asset/pages/ListeQuestions.php");
                break;
            case 2:
                require_once("asset/pages/CreationCompteAdmin.php");
                break;
            case 3:
                require_once("asset/pages/ListeJoueur.php");
                break;
            case 4:
                require_once("asset/pages/CréerQuestions.php");
                break;
            case 5:
                require_once("asset/pages/dashbord.php");
                break;
        }
    }
?>
