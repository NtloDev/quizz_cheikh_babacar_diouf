<?php 
    if (isset($_POST['save3'])) 
    { 
    $question= $_POST['questionphp'];
    $pts= $_POST['ptsphp'];
    $type= $_POST['typephp'];
    $rep1= $_POST['rep1php'];
    $choix1=$_POST['choix1php'];
    if(isset($_POST['rep2php']) ){
        $rep2= $_POST['rep2php'];
    }
    if(isset($_POST['rep3php']) ){
        $rep3= $_POST['rep3php'];
    }
    if(isset($_POST['rep4php']) ){
        $rep4= $_POST['rep4php'];
    }
    if(isset($_POST['choix2php']) ){
        $choix2= $_POST['choix2php'];
    }
    if(isset($_POST['choix3php']) ){
        $choix3= $_POST['choix3php'];
    }
    if(isset($_POST['choix4php']) ){
        $choix4= $_POST['choix4php'];
    }
    
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
        $sql= "INSERT INTO `question` (`id_question`, `intitule_question`, `nbrpoints_question`, `type_question`, `reponse1`,`reponse2`,`reponse3`, `reponse4`,`choix1`,`choix2`, `choix3`, `choix4`) VALUES (NULL, '$question', '$pts', '$type', '$rep1', '$rep2', '$rep3', '$rep4', '$choix1', '$choix2', '$choix3', '$choix4')";
        $reponse= $bdd->exec($sql);  
        exit('successA');                
    }
?>
<div class="container-fluid" style="margin-left: 1%; width:98%; height: 500px; background-color:white; height: 515px;">
<div class="row" style="height: 405px;">
    <div class="col-4 text-center">
    <img src="asset/IMG/images/profils/IMG-20200513-WA0033.jpg" class="rounded-circle img-profil2" alt="Cinque Terre" ><br>
    </div>
    <div class="col-8 box">
        <div class="mx-auto" style="background-color: rgb(255, 255, 255);  color:white;width: 100%; height: 510px;">
            <nav class="navbar navbar-expand" style="background-color: #51BFD0; height: 30px;">
                <p class="navbar-brand mx-auto" id="inscrir">CREER UNE QUESTION</p>        
            </nav>
            <div class="mx-auto text-center" style="margin-top:20px;">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <form method="post" action="" id="form-question" class="mx-auto text-center">
                    <label for = "question" class="titres-input">Questions</label><br>
                    <input type="text" name="question" class="input2" id ="error-3"><br>
                    <div class="error-form" id="equestion">ce champ n'est pas valide</div>
                    <label for = "nbrpoints" class="titres-input">Nbre de points</label><br>
                    <input type="number" name="nbrpoints" class="input3" id ="error-4">
                    <div class="error-form" id="enbrpoints">ce champ n'est pas valide</div>
                    <label for = "typereponse" class="titres-input">Type de reponse</label><br>
                    <select class="input2" name="typereponse" id="select" >
                        <option value="">Donner le type de reponse</option>
                        <option value="choixmultiple" >Choix multiple</option>
                        <option value="unseulchoix" >Un seul choix</option>
                        <option value="texte" >Texte</option>
                    </select><br>
                    <button type="button" class="input4" id="ajout-reponse" name="button" onclick="AddInput()"></button><br>      
                    <button type="button" name="enregistrer" id="creer3" class="creer3">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    var nbrinput= 0;
    <?php $nbrinput=0; ?>
    
    function AddInput()
    {
        var b = document.querySelector("select"); 
        b.setAttribute("hidden", "");
        nbrinput++;
        <?php $nbrinput++; ?>        
        const   texte = document.getElementById("select").options[document.getElementById('select').selectedIndex].text;
        if (texte == "Texte")
        {         
            
            var divInputs = document.getElementById('form-question');
            var newInput = document.createElement('div');
            newInput.innerHTML = '<label for = \"reponsetexte\" class=\"titres-input2\">Reponse' + nbrinput + ' </label>' +
                                 '<input type=\"text\" name=\"rep'+nbrinput+'\" error =\"error-6\" id=\"rep'+nbrinput+'\" class=\"input5-1\">' + '<a href=\"\" class=\"link-form\"><img src=\"asset/IMG/Images/Icônes/ic-supprimer.png\" class=\"supp2\" /></a>' +                   
                                 '<div class=\"error-form\" id=\"error-6\"></div>';
            divInputs.appendChild(newInput);  
        
        } 
        else if (texte == "Choix multiple")
        {                
            var divInputs = document.getElementById('form-question');
            var newInput = document.createElement('div');
            newInput.innerHTML = 
                    '<label for = \"reponsetexte\" class=\"titres-input2\">Reponse' +nbrinput+ '  </label>' +
                    '<input type=\"text\" name=\"rep'+nbrinput+'\" class=\"input5-1\" id=\"rep'+nbrinput+'\" error =\"error-6\">' +                
                    '<input type = \"checkbox\" name=\"choix' +nbrinput+ '\" id=\"choix'+nbrinput+'\" value=\"reponse'+nbrinput+'\" class =\"input6\">' +
                    '\<a href=\'\' class=\"link-form\"><img src=\"asset/IMG/Images/Icônes/ic-supprimer.png\" class=\"supp\" /></a>' +
                    '<div class=\"error-form\" id=\"error-6\"></div>'  ;
            divInputs.appendChild(newInput);       
        } 
        else if (texte == "Un seul choix")
        {                
            var divInputs = document.getElementById('form-question');
            var newInput = document.createElement('div');
            newInput.innerHTML = 
                    '<label for = \"reponsetexte\" class=\"titres-input2\">Reponse' +nbrinput+ ' </label>' +
                    '<input type=\"text\" name=\"rep'+nbrinput+'\" error ="\error-6\" id=\"rep'+nbrinput+'\" class=\"input5-1\">' +
                    '<input type = \"radio\" name=\"Choix'+nbrinput+'\" id=\"choix'+nbrinput+'\" value=\"reponse'+nbrinput+'\" class =\"input7\">' +    
                    '<a href=\'\' class=\"link-form\"><img src=\"asset/IMG/Images/Icônes/ic-supprimer.png\" class=\"supp\" /></a>' +
                    '<div class=\"error-form\" id=\"error-6\"></div>'  ;
            divInputs.appendChild(newInput);       
        }             
    }
</script>