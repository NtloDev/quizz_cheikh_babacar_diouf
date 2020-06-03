<?php 
    if (isset($_POST['login'])){
        $id= $_POST['idphp'];
        $mdp= $_POST['mdpphp'];
        try{
            // On se connecte à MySQL
            $bdd = new PDO('mysql:host=localhost;dbname=quizz;charset=utf8', 'root', '');
        }
        catch(Exception $e){
            // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : '.$e->getMessage());
        }
        $data = $bdd->query("SELECT * FROM user WHERE login_user = '{$id}' AND pwd_user = '{$mdp}'");
        
        if($data->rowCount()>0){
            $user=$data->fetch();
            if($user['type_user']=="admin"){
                $_SESSION['statut']="login";
                $_SESSION['user']=$user;
                echo "successA";
            }
            else if($user['type_user']=="joueur"){
                $_SESSION['statut']="login";
                $_SESSION['user']=$user;
                echo "successJ";
            }
           
           
        }
        else{
            echo "failed";
        }
    }
?>
<div class="container-fluid" style="margin-top: 100px; height: 300px;">
    <div class="mx-auto" style="background-color: rgb(255, 255, 255);  color:white;width: 40%; height: 300px;">
        <nav class="navbar navbar-expand" style="background-color: #51BFD0; height: 60px;">
            <p class="navbar-brand mx-auto" style="font-size: 14px; margin-top: 4px;">Je me connecte</p>        
        </nav>
        <div class="mx-auto text-center" >
            <form method="post" action ="" id="form-connexion">
                <div class="input-form" style="height: 60px; margin: 5px 35px;">
                    <input type="texte" id="id" class="input1" name="id" error ="error-1" placeholder="Login" style="width: 100%; height: 35px;border-radius: 10px;font-size: 10px; border: 1px solid #51BFD0;padding: 5px; margin-top: 25px;">
                    <div class="error-form" id="error-1">Ce champ est invalide</div>
                </div>
                <div class="input-form" style="height: 60px;margin: 5px 35px;">
                    <input type="password" name="mdp" class="input1" id="mdp" error ="error-2" placeholder="Password" style="width: 100%;height: 35px;border-radius: 10px;font-size: 10px; border: 1px solid #51BFD0;padding: 5px;margin-top: 25px;">
                    <div class="error-form" id="error-2">Ce champ est invlide</div>
                </div>
                <div class="input-form" style="height: 60px;margin: 5px 35px;">
                    <input type="button" name="connexion" value="Connexion" id="button" class="btn-form" >
                    <a href='index.php?inscription' class="link-form" style="font-size: 10px;" >M'inscrir</a>
                </div>
            </form>                  
        </div>
    </div>
</div>    
</div>