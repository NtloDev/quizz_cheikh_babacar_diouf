<div class="container-fluid" style="margin-top: 10px; height: 300px;">
        <div class="mx-auto" style="background-color: rgb(255, 255, 255);  color:white;width: 50%; height: 490px;">
        <nav class="navbar navbar-expand" style="background-color: #51BFD0; height: 60px;">
                <p class="navbar-brand mx-auto" style="font-size: 14px; margin-top: 4px;">Je m'inscris</p>        
        </nav>
    <div class="mx-auto text-center" style="margin-top:20px;">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <form method="post" action="" id="form-connexion2" class="mx-auto text-center">
                    <input type="text" name="prenom" placeholder="Prenom" error ="error-3" class="input2">
                    <div class="error-form" id="error-3"></div>
                    <input type="text" name="nom" placeholder="Nom" error ="error-4" class="input2">
                    <div class="error-form" id="error-4"></div>
                    <input type="text" name="login" placeholder="Login" error ="error-5" class="input2">
                    <div class="error-form" id="error-5"></div>
                    <input type="password" name="password" placeholder="Password" error ="error-6" class="input2">
                    <div class="error-form" id="error-6"></div>
                    <input type="password" name="confirm-password" placeholder="Confirm password" error ="error-7" class="input2" >
                    <div class="error-form" id="error-7"></div>
                    <div class="avatar2" style="color:black;">Avatar<input type="file" name="photo" class="fileUpload2" id="imgInp" accept="image/png, image/jpeg" id="imgInp">
                    </div>
                    <img src="#"/><br>
                    <input type="submit" name="creer" value="Inscription" class="creer2">
                </form>
    </div>
</div>
            <script>
        function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#imgupload').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // 
  }
}

$("#imgInp").change(function() {
  readURL(this);
});
</script>
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
        if (isset($_POST['creer'])) 
        {
            // on affecte les variables pour simplifier leurs ecritures
            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];
            $login = $_POST['login'];
            $mdp = $_POST['password'];
            $mdpc = $_POST['confirm-password'];
            $photo= $_POST['photo'];
            $score=0;
            // on verifie si les champs sont remplis
            if (!empty($prenom) && !empty($nom) && !empty($login) && !empty($mdp) && !empty($mdpc) && !empty($photo))
            {
                $users=jsondata('save');
                $val=0;
                foreach($users as $key => $user)
                {
                    if($user["login"]===$login)
                    {
                        $val=$val+1;
                    }
                }
                if($val==0)
                {    
                    // on cree un tableau $tab avec les noms des variables comme indices
                    $tab =
                        [
                            'prenom' => [],
                            'nom' => [],
                            'login' => [],
                            'mdp' => [],
                            'image' =>[],
                            'role'=>[],
                            $login.'score'=>[],
                        ];
                    // ensuite on affecte les donnes du formulaire sur le table tab
                    $tab['prenom'] = $prenom;
                    $tab['nom']= $nom;
                    $tab['login'] = $login;
                    $tab['mdp'] = $mdp;
                    $tab['image'] = $photo;
                    $tab['role'] = 'joueur';
                    $tab[$login.'score'] = 0;
                    // on appelle le fichier json
                    $save = file_get_contents('asset/JSON/save.json');
                    // on decode le fichier et le transformer sous forme de table c'estquoi j'ai mis true
                    $save = json_decode($save,true);
                    // on affecte le tableau tab dans le fichier json
                    $save[]=$tab;
                    // on code encore le fichier
                    $save = json_encode($save); 
                    // on sauvegarde le fichier
                    file_put_contents('asset/JSON/save.json',$save);
                    header("location:index.php");
                }
                else
                {
                    ?>
                    <div class="logerror"><?php echo "ce login existe deja";?></div>
                    <?php
                }
            }
        }
        
    ?>
