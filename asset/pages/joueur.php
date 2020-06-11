<?php is_connect ();

    
?>

<div class="container-fluid" id="con" style="margin-left: 0%; width:100%; height: 500px; background-color:white; height: 110px;">
    <div class="row" style="height: 100px;">
        <div class="col-10 conteneur">
            <p class="navbar-brand text-center parametres" >AMUSEZ VOUS!</p>
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
        <div class="col-2" style="background-coor:red;height:40px; margin-left:0%; text-align:center;">
            <p class="menu2"><button type='button' class='buttonj' id='' style='cursor:pointer;'>Tops</button></p>
        </div>
        <div class="col-2" style="background-coor:red;height:40px; margin-left:3%;text-align:center;">
            <p class="menu3"><button type='button' class='buttonj' id='' style='cursor:pointer;'>score</button></p>
        </div>
        <div class="col-2" style="background-coor:red;height:40px; margin-left:3%;text-align:center;">
            <p class="menu4"><button type='button' value='1' onclick="jouer(1)" class='buttonj' id='jouer' style='cursor:pointer;'>JOUER</button></p>
        </div>
    </div>
</div>
<div class="container-fluid" style="margin-left: 0%; width:100%; height: 500px; background-color:white; height: 515px;">
    <div  class="row" style="height: 405px; background-color:white;">
        <div class="col-4 text-center" style="background-color:#51BFD0;;">
            
        </div>
        <div class="col-8 box" style="background-color:white;left:-0.2%;" >
        <?php       
            if (isset($_POST['pagej'])){
                $page= $_POST['pagej'];
                $_SESSION['i']=$page+1;
                $_SESSION['compteur']=0;
                try{
                    // On se connecte à MySQL
                    $compare = new PDO('mysql:host=localhost;dbname=quizz;charset=utf8', 'root', '');
                }
                catch(Exception $e){
                    // En cas d'erreur, on affiche un message et on arrête tout
                    die('Erreur : '.$e->getMessage());
                }                 
                if (isset($_POST['r1'])){            
                    var_dump($_POST['r1']);
                    $r1=$_POST['r1'];
                    $i= $_SESSION['i']-2;
                    $l=$_SESSION['q'][$i]['intitule_question'];
                    var_dump($l);
                    $comparer = $compare->query("SELECT `choix1` FROM question WHERE choix1 = '{$r1}' AND intitule_question='{$l}' ");
                    $results=$comparer->fetchAll();
                    $rows=count($results);
                    var_dump($results);
                    if (!empty($results)){
                        $_SESSION['compteur']='trouve';
                        var_dump($_SESSION['compteur']);
                    }
                   else{
                        $_SESSION['compteur']=$_SESSION['compteur']+1;
                        var_dump($_SESSION['compteur']);
                   }
                }
                else{
                    $_SESSION['compteur']=0;
                }
                if (isset($_POST['r2'])){
                    var_dump($_POST['r2']);                
                    $r2=$_POST['r2'];
                    $i= $_SESSION['i']-2;
                    $l=$_SESSION['q'][$i]['intitule_question'];
                    var_dump($l);
                    $comparer = $compare->query("SELECT `choix1` FROM question WHERE choix2 = '{$r2}' AND intitule_question='{$l}' ");
                    $results=$comparer->fetchAll();
                    $rows=count($results);
                    var_dump($results);
                    if (!empty($results)){
                        $_SESSION['compteur']='trouve';
                        var_dump($_SESSION['compteur']);
                   }
                   else{
                        $_SESSION['compteur']=$_SESSION['compteur']+1;
                        var_dump($_SESSION['compteur']);
                   }
                }
                if (isset($_POST['r3'])){
                    var_dump($_POST['r3']);                
                    $r3=$_POST['r3'];
                    $i= $_SESSION['i']-2;
                    $l=$_SESSION['q'][$i]['intitule_question'];
                    var_dump($l);
                    $comparer = $compare->query("SELECT `choix1` FROM question WHERE choix3 = '{$r3}' AND intitule_question='{$l}' ");
                    $results=$comparer->fetchAll();
                    $rows=count($results);
                    var_dump($results);
                    if (!empty($results)){
                        $_SESSION['compteur']='trouve';
                        var_dump($_SESSION['compteur']);
                   }
                   else{
                        $_SESSION['compteur']=$_SESSION['compteur']+1;
                        var_dump($_SESSION['compteur']);
                    }
                }
                if (isset($_POST['r4'])){
                    var_dump($_POST['r4']);            
                    $r4=$_POST['r4'];
                    $i= $_SESSION['i']-2;
                    $l=$_SESSION['q'][$i]['intitule_question'];
                    var_dump($l);
                    $comparer = $compare->query("SELECT `choix1` FROM question WHERE choix4 = '{$r4}' AND intitule_question='{$l}' ");
                       $results=$comparer->fetchAll();
                       $rows=count($results);
                       var_dump($results);
                       if (!empty($results)){
                           $_SESSION['compteur']='trouve';
                           var_dump($_SESSION['compteur']);
                       }
                       else{
                        $_SESSION['compteur']=$_SESSION['compteur']+1;
                        var_dump($_SESSION['compteur']);
                       }
                }
                var_dump($_SESSION['compteur']);
                if($_SESSION['compteur']=='trouve'){
                    echo"question trouvé";
                    unset($_SESSION['compteur']);
                }
                else{
                    echo"question faussé";
                    unset($_SESSION['compteur']);
                }
            }
            else{
                $page= 0;
                $_SESSION['i']=$page+1;
                try{
                    // On se connecte à MySQL
                    $bdd = new PDO('mysql:host=localhost;dbname=quizz;charset=utf8', 'root', '');
                }
                catch(Exception $e){
                    // En cas d'erreur, on affiche un message et on arrête tout
                    die('Erreur : '.$e->getMessage());
                }                    
                $data7 = $bdd->query("SELECT `id_nbrquestion`, `val_nbrquestion` FROM nbrquestion");
                $user7=$data7->fetchAll();        
                $data = $bdd->query("SELECT `id_question`, `intitule_question`, `nbrpoints_question`,`type_question`, `reponse1`, `reponse2`, `reponse3`, `reponse4`, `choix1`, `choix2`, `choix3`, `choix4` FROM question ORDER BY rand() LIMIT ".$user7[0]['val_nbrquestion']."");
                $user=$data->fetchAll();
                $rows=count($user);
                $_SESSION['val']=$user7;
                $_SESSION['q']=$user;             
                $rowsperpage= 1;
                
            }
                
                  
                  
                
    
                ?> 
        <nav class="navbar navbar-expand" style="background-color: #51BFD0; height: 30px;">
            <p class="navbar-brand mx-auto" id="inscrir">Question <?php echo $_SESSION['i']; ?> /<?php echo $_SESSION['val'][0]['val_nbrquestion']; ?></p>        
        </nav>
        <div class="row" style="position:relative;left:2%;top:10px; height: 350px;">
            <div class="col-5" style="">
              <?php  
                        $i= $_SESSION['i']-1;
                        if (isset($_SESSION['q'][$i]['intitule_question'])){?>
                        <p class="text-center" style="color:white;background-color: #283D3;"> <?php echo $_SESSION['q'][$i]['nbrpoints_question']; echo' ';echo "points"; ?> </p>
                      <p class="text-center qjeu" style="background-color: #283D3F;"> <?php echo $_SESSION['q'][$i]['intitule_question']; ?></p><?php
                        echo '<br>';
                    }
                
              ?>
            </div>
            <div class="col-5" style="border-left:2px solid #51BFD0;left:13%; ">
                <?php 
                    $i= $_SESSION['i']-1;
                    if (isset($_SESSION['q'][$i]['reponse1'])AND $_SESSION['q'][$i]['reponse1']!=""){?><p class="text-center reponses" style="background-color: #51BFD0;"><?php
                        if ($_SESSION['q'][$i]['type_question']=="unseulchoix"){
                            echo '<input type="radio" id="r1" value="reponse1" class="inputreponses" style="border: 2px solid #51BFD0;" />';
                        }
                        else if($_SESSION['q'][$i]['type_question']=="choixmultiple"){
                            echo '<input type="checkbox" id="r1" value="reponse1" class="inputreponses" style="border: 2px solid #51BFD0;" />';
                        }
                        else{
                            echo '<input type="textarea" id="r1" value="reponse1" class="inputreponses" style="border: 2px solid #51BFD0;"  />';
                        }
                        echo $_SESSION['q'][$i]['reponse1'];
                        echo '<br>';?></p><?php
                    }
                    if (isset($_SESSION['q'][$i]['reponse2'])AND $_SESSION['q'][$i]['reponse2']!=""){?><p class="text-center reponses" style="background-color: #51BFD0;"><?php
                        if ($_SESSION['q'][$i]['type_question']=="unseulchoix"){
                            echo '<input type="radio" id="r2" value="reponse2" class="inputreponses" />';
                        }
                        else if($_SESSION['q'][$i]['type_question']=="choixmultiple"){
                            echo '<input type="checkbox" id="r2" value="reponse2" class="inputreponses" />';
                        }
                        else{
                            echo '<input type="textarea" value="reponse2" class="inputreponses" />';
                        }
                        echo $_SESSION['q'][$i]['reponse2'];
                        echo '<br>';?></p><?php
                    }
                    if (isset($_SESSION['q'][$i]['reponse3']) AND $_SESSION['q'][$i]['reponse3']!=""){?><p class="text-center reponses" style="background-color: #51BFD0;"><?php
                        if ($_SESSION['q'][$i]['type_question']=="unseulchoix"){
                            echo '<input type="radio" id="r3" value="reponse3" class="inputreponses" />';
                        }
                        else if($_SESSION['q'][$i]['type_question']=="choixmultiple"){
                            echo '<input type="checkbox" id="r3" value="reponse3" class="inputreponses" />';
                        }
                        else{
                            echo '<input type="textarea" value="reponse3" class="inputreponses" />';
                        }
                        echo $_SESSION['q'][$i]['reponse3'];
                        echo '<br>';?></p><?php
                    }
                    if (isset($_SESSION['q'][$i]['reponse4'])AND $_SESSION['q'][$i]['reponse4']!=""){?><p class="text-center reponses"style="background-color: #51BFD0;"><?php
                        if ($_SESSION['q'][$i]['type_question']=="unseulchoix"){
                            echo '<input type="radio" id="r4" value="reponse4" class="inputreponses" />';
                        }
                        else if($_SESSION['q'][$i]['type_question']=="choixmultiple"){
                            echo '<input type="checkbox" id="r4" value="reponse4" class="inputreponses" />';
                        }
                        else{
                            echo '<input type="textarea" value="reponse4" class="inputreponses" />';
                        }
                        echo $_SESSION['q'][$i]['reponse4'];
                        echo '<br>';?></p><?php
                    }
                ?>
            </div>
        </div>
        <div class="row" style="">
            <div class="col-6" style=" ">
            <?php 
                $k=$_SESSION['i']-2;
                if ($_SESSION['i']>1){
                    echo "<button type='button' class='suivant_link' id='".$k."' style='cursor:pointer; color:black;'>precedent</button>"; 
                }
            ?>
            </div>
            <div class="col-5" style=" ">
             
                    <?php if ($_SESSION['i']!=$_SESSION['val'][0]['val_nbrquestion']+1){
                        ?><button type='button' class='suivant_link' id="<?php echo $_SESSION['i']; ?>" style='position:relative; cursor:pointer; color:black;left:12.5%;'>Suivant</button>
                   <?php }       
            ?>
            </div>
        </div>
        </div>
    </div>
</div>    