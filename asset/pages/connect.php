<div class="container-fluid" style="margin-top: 100px; height: 300px;">
    <div class="mx-auto" style="background-color: rgb(255, 255, 255);  color:white;width: 40%; height: 300px;">
        <nav class="navbar navbar-expand" style="background-color: #51BFD0; height: 60px;">
            <p class="navbar-brand mx-auto" style="font-size: 14px; margin-top: 4px;">Je me connecte</p>        
        </nav>
        <div class="mx-auto text-center" >
            <form method="post" action ="" id="form-connexion">
                <div class="input-form" style="height: 60px; margin: 5px 35px;">
                    <input type="texte" name="id" error ="error-1" placeholder="Login" style="width: 100%; height: 35px;border-radius: 10px;font-size: 10px; border: 1px solid #51BFD0;padding: 5px; margin-top: 25px;">
                    <div class="error-form" id="error-1"></div>
                </div>
                <div class="input-form" style="height: 60px;margin: 5px 35px;">
                    <input type="password" name="mdp" error ="error-2" placeholder="Password" style="width: 100%;height: 35px;border-radius: 10px;font-size: 10px; border: 1px solid #51BFD0;padding: 5px;margin-top: 25px;">
                    <div class="error-form" id="error-2"></div>
                </div>
                <div class="input-form" style="height: 60px;margin: 5px 35px;">
                    <button type="submit"  name="connexion" class="btn-form" >Connexion</button>
                    <a href='index.php?inscription' class="link-form" style="font-size: 10px;" >M'inscrir</a>
                </div>
            </form>                  
        </div>
    </div>
</div>
    
</div>
<?php
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

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table
$reponse = $bdd->query('SELECT * FROM joueur');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
    <p>
     <?php echo $donnees['name_user']; ?>
    
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
<script>
    const inputs =  document.getElementsByTagName("input");
    for(input of inputs)
    {
        input.addEventListener("keyup",function(e)
        {
           if(e.target.hasAttribute("error")) 
           {
               var idDivError=e.target.getAttribute("error");
               document.getElementById(idDivError).innerText=""
           }
        })
    } 
    document.getElementById("form-connexion").addEventListener("submit",function(e)
    {
        const inputs =  document.getElementsByTagName("input");
        var error = false;
        for(input of inputs)
        {
            if(input.hasAttribute("error"))
            {
               var idDivError=input.getAttribute("error")
                if(!input.value)
                {    
                    document.getElementById(idDivError).innerText="Ce champs est obligatoire"
                    error = true
                }
            }
        }
        if(error)
        {
            e.preventDefault();
        }
        return false
    })
</script>
<?php
    if (isset($_POST['connexion'])) 
    {
        // affectation des variables
        $login = $_POST['id'];
        $mdp = $_POST['mdp'];
        $result = connexion($login,$mdp);
        if ($result=="error")
        {
            echo "Donnees incorrectes";
        }
        else
        {
            header("location:index.php?lien=".$result);
        }
     }        
?>