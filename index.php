<!doctype html>
<html lang="en">
  <head>
    <title>JEU DE QUIZ</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="asset/CSS/style.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body style="background-image: URL('asset/IMG/images/img-bg.JPG');" >
    <script type="text/javascript" src="js/jquery.mon.js"></script>
    <nav class="navbar navbar-expand " style="background-color: #283D3F;  color:white; height: 50px;">
        <div class="mx-auto">
            <p class="navbar-brand text-center" style="font-size: 30px; margin-top: 4px;" >LE PLAISIR DE J<img src="asset/IMG/images/logo.jpeg" class="rounded-circle" alt="Cinque Terre" width="36" height="36" style="margin-top: -4px;">UER</p>
        </div>          
    </nav> 
    <?php 
            session_start();
            require_once("src/fonctions.php")  ;
            if (isset($_GET['lien']))
            {
                switch($_GET['lien'])
                {
                    case "accueil":
                        require_once("asset/pages/admin.php");
                        break;
                    case "jeux":
                        require_once("asset/pages/joueur.php");
                        $_SESSION['jouer']=1;
                        
                        break;
                }
            }
            else
            {
                if (isset($_GET['statut']) && $_GET['statut']==="logout")
                {
                    deconnexion();
                    require_once("asset/pages/connect.php")  ;
                }
                else
                {
                    if (isset($_GET['inscription']))
                    {
                        require_once("asset/pages/inscription.php")  ;
                    }
                    else
                    {
                        require_once("asset/pages/connect.php")  ;
                    }
                }
            } 
        ?>  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
  
</html>
