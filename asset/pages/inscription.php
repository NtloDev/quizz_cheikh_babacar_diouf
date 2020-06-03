<?php
        if (isset($_POST['save'])) 
        {
            $prenom= $_POST['prenomphp'];
        $nom= $_POST['nomphp'];
        $login= $_POST['loginphp'];
        $mdp= $_POST['passwordphp'];
            try
            {
                // On se connecte à MySQL
                $bdd = new PDO('mysql:host=localhost;dbname=quizz;charset=utf8', 'root', '');
            }
            catch(Exception $e)
            {
                // En cas d'erreur, on affiche un message et on arrête tout
                die('Erreur : '.$e->getMessage());
            }
            $sql= "INSERT INTO `user` (`id_user`, `type_user`, `login_user`, `pwd_user`, `name_user`, `prenom_user`) VALUES (NULL, 'joueur', '$login', '$mdp', '$nom', '$prenom')";
            $reponse= $bdd->exec($sql);  
            exit('success');                
        }
?>
<div class="container-fluid" style="margin-top: 10px; height: 300px;">
    <div class="mx-auto" style="background-color: rgb(255, 255, 255);  color:white;width: 50%; height: 510px;">
        <nav class="navbar navbar-expand" style="background-color: #51BFD0; height: 60px;">
            <p class="navbar-brand mx-auto" style="font-size: 14px; margin-top: 4px;">Je m'inscris</p>        
        </nav>
        <div class="mx-auto text-center" style="margin-top:20px;">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <form method="post" action="" id="form-connexion2" class="mx-auto text-center">
                <input type="text" name="prenom" placeholder="Prenom" error ="error-3" id="prenom" class="input2">
                <div class="error-form" id="eprenom">ce champ n'est pas valide</div>
                <input type="text" name="nom" placeholder="Nom" error ="error-4" id="nom" class="input2">
                <div class="error-form" id="enom">ce champ n'est pas valide</div>
                <input type="text" name="login" placeholder="Login" error ="error-5" id="login" class="input2">
                <div class="error-form" id="elogin">ce champ n'est pas valide</div>
                <input type="password" name="password" placeholder="Password" error ="error-6" id="password" class="input2">
                <div class="error-form" id="epassword">ce champ n'est pas valide</div>
                <input type="password" name="confirm-password" placeholder="Confirm password" id="cpassword" error ="error-7" class="input2" >
                <div class="error-form" id="ecpassword">les mots de pass ne correspondent pas</div>
                <div class="avatar2" style="color:black;">Avatar<input type="file" name="photo" class="fileUpload2" id="imgInp" accept="image/png, image/jpeg" id="imgInp"></div>
                <img src="#"/><br>
                <input type="button" name="creer" value="Inscription" id="creer" class="creer2">
            </form>
        </div>
    </div>
</div>
   
