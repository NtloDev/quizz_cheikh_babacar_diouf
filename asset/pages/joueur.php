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
        <div class="col-4" style="background-coor:red;height:40px; margin-left:3%;text-align:center;">
        <?php
                try{
                    // On se connecte à MySQL
                    $bdd = new PDO('mysql:host=localhost;dbname=quizz;charset=utf8', 'root', '');
                }
                catch(Exception $e){
                    // En cas d'erreur, on affiche un message et on arrête tout
                    die('Erreur : '.$e->getMessage());
                } 
                $data = $bdd->query("SELECT `val_score` FROM user, score WHERE login_user ='{$_SESSION['user']['login_user']}' AND user.id_user = score.id_user ");
                $user=$data->fetchAll();    
               
            ?>
            <p class="menu3"><button type='button' class='buttonj' id='' style='cursor:pointer;'>score : <?php  echo $user[0]['val_score']; ?></button></p>
           
        </div>
       
    </div>
</div>
<div class="container-fluid" style="margin-left: 0%; width:100%; height: 500px; background-color:white; height: 515px;">
    <div  class="row" style="height: 405px; background-color:white;">
        <div class="col-4 text-center" style="background-color:#51BFD0;;">
            <?php
                try{
                    // On se connecte à MySQL
                    $bdd = new PDO('mysql:host=localhost;dbname=quizz;charset=utf8', 'root', '');
                }
                catch(Exception $e){
                    // En cas d'erreur, on affiche un message et on arrête tout
                    die('Erreur : '.$e->getMessage());
                }     
                $data = $bdd->query("SELECT `login_user`, `name_user` , `prenom_user`, `val_score` FROM user, score WHERE type_user = 'joueur' AND user.id_user = score.id_user ORDER BY val_score DESC LIMIT 5 ");
                    $user=$data->fetchAll();?>
                    <p class="menu2"><button type='button' class='buttonj' id='' style='cursor:pointer;'>Tops</button></p>
                    <p class="topscor"><?php 
                        echo $user[0]['prenom_user'];
                        echo " ";
                        echo $user[0]['name_user'].' : ';
                        echo $user[0]['val_score'].' ';
                        echo "points";
                    ?></p>
                    <p class="topscor"><?php 
                        echo $user[1]['prenom_user'];
                        echo " ";
                        echo $user[1]['name_user'].' : ';
                        echo $user[1]['val_score'].' ';
                        echo "points";
                    ?></p>
                    <p class="topscor"><?php 
                        echo $user[2]['prenom_user'];
                        echo " ";
                        echo $user[2]['name_user'].' : ';
                        echo $user[2]['val_score'].' ';
                        echo "points";
                    ?></p>
                    <p class="topscor"><?php 
                        echo $user[3]['prenom_user'];
                        echo " ";
                        echo $user[3]['name_user'].' : ';
                        echo $user[3]['val_score'].' ';
                        echo "points";
                    ?></p>
                    <p class="topscor"><?php 
                        echo $user[4]['prenom_user'];
                        echo " ";
                        echo $user[4]['name_user'].' : ';
                        echo $user[4]['val_score'].' ';
                        echo "points";
                    ?></p><?php
            ?>
        </div>
        <div class="col-8 box" style="background-color:white;left:-0.2%;" >
        <?php       
            if (isset($_POST['pagej'])){
                if($_POST['pagej']==0){
                    if(isset($_SESSION['fausse'])){
                        unset($_SESSION['fausse']);
                    }
                    if(isset($_SESSION['trouve'])){
                       unset($_SESSION['trouve']);
                    }
                }
                if ($_SESSION['i']!=$_SESSION['val'][0]['val_nbrquestion']+1){
                
                    $c=count($_POST);
                    try{
                        // On se connecte à MySQL
                        $bdd = new PDO('mysql:host=localhost;dbname=quizz;charset=utf8', 'root', '');
                    }
                    catch(Exception $e){
                        // En cas d'erreur, on affiche un message et on arrête tout
                        die('Erreur : '.$e->getMessage());
                    }     
                    $y= $_SESSION['i']-1;
                    
                        $k=$_SESSION['q'][$y]['intitule_question'];  
                               
                    $datac = $bdd->query("SELECT `choix1`, `choix2`, `choix3`, `choix4` FROM question WHERE intitule_question = '{$k}' ");
                    $userc=$datac->fetchAll();
                    for($m=0;$m<=3;$m++){
                        if(empty($userc[0][$m])){
                           $z[$m]=$userc[0][$m];
                        }
                    }
                   $ze=count($z);
                    
                }
               
                $page= $_POST['pagej'];
                $_SESSION['i']=$page+1;
                $_SESSION['compteur']=0;
                if($_POST['pagej']!=0){
                    $_SESSION['n']=$_SESSION['q'][$_SESSION['i']-2]['nbrpoints_question'];
                }
                
                    
                
               
                
                try{
                    // On se connecte à MySQL
                    $compare = new PDO('mysql:host=localhost;dbname=quizz;charset=utf8', 'root', '');
                }
                catch(Exception $e){
                    // En cas d'erreur, on affiche un message et on arrête tout
                    die('Erreur : '.$e->getMessage());
                }                 
                if (isset($_POST['r1'])){            
                    $r1=$_POST['r1'];
                    $i= $_SESSION['i']-2;
                    $l=$_SESSION['q'][$i]['intitule_question'];
                    $comparer = $compare->query("SELECT `choix1` FROM question WHERE choix1 = '{$r1}' AND intitule_question='{$l}' ");
                    $results=$comparer->fetchAll();
                    $rows=count($results);
                    if (!empty($results)){
                        $_SESSION['compteur']=$_SESSION['compteur']+1;
                        
                        $_SESSION['trouve'][$i]=$l;
                        
                    }
                    else{
                        $_SESSION['compteur']=0;
                        $_SESSION['fausse'][$i]=$l;
                        
                    }
                }
                
                if (isset($_POST['r2'])){             
                    $r2=$_POST['r2'];
                    $i= $_SESSION['i']-2;
                    $l=$_SESSION['q'][$i]['intitule_question'];
                    $comparer = $compare->query("SELECT `choix1` FROM question WHERE choix2 = '{$r2}' AND intitule_question='{$l}' ");
                    $results=$comparer->fetchAll();
                    $rows=count($results);
                    if (!empty($results)){
                        $_SESSION['compteur']=$_SESSION['compteur']+1;
                        $_SESSION['trouve'][$i]=$l;
                        
                   }
                   else{
                        $_SESSION['compteur']=0;
                        $_SESSION['fausse'][$i]=$l;
                        
                   }
                }
                if (isset($_POST['r3'])){              
                    $r3=$_POST['r3'];
                    $i= $_SESSION['i']-2;
                    $l=$_SESSION['q'][$i]['intitule_question'];
                    $comparer = $compare->query("SELECT `choix1` FROM question WHERE choix3 = '{$r3}' AND intitule_question='{$l}' ");
                    $results=$comparer->fetchAll();
                    $rows=count($results);
                    if (!empty($results)){
                        $_SESSION['compteur']=$_SESSION['compteur']+1;
                        $_SESSION['trouve'][$i]=$l;
                        
                   }
                   else{
                        $_SESSION['compteur']=0;
                        $_SESSION['fausse'][$i]=$l;
                    
                    }
                }
                if (isset($_POST['r4'])){         
                    $r4=$_POST['r4'];
                    $i= $_SESSION['i']-2;
                    $l=$_SESSION['q'][$i]['intitule_question'];
                    $comparer = $compare->query("SELECT `choix1` FROM question WHERE choix4 = '{$r4}' AND intitule_question='{$l}' ");
                       $results=$comparer->fetchAll();
                       $rows=count($results);
                       if (!empty($results)){
                           $_SESSION['compteur']=$_SESSION['compteur']+1;
                           $_SESSION['trouve'][$i]=$l;
                        
                       }
                       else{
                        $_SESSION['compteur']=0;
                        $_SESSION['fausse'][$i]=$l;
                        
                       }
                }
                
                
                if (isset($ze)){
                    if($_SESSION['compteur']==4-$ze){
                        $_SESSION['score'][$i]=$_SESSION['sc']+$_SESSION['n'];
                        $_SESSION['scoree']=array_sum($_SESSION['score']);
                        
                        unset($_SESSION['compteur']);
                   
                    }
                    else{
                        unset($_SESSION['compteur']);
                    }
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
                $_SESSION['sc']=0;        
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
                    if ($_SESSION['i']==$_SESSION['val'][0]['val_nbrquestion']+1){?>
                        <h2>Vous avez <?php echo $_SESSION['scoree']; ?> points</h2>
                        <h4>Vous avez trouvé les questions suivantes</h4><br>
                       <?php if (isset($_SESSION['trouve'])){
                            foreach($_SESSION['trouve'] as $valeur)
                            {
                                echo $valeur;
                                echo '<br>';
                            }
                            echo "<button type='button' id='retour' style='cursor:pointer; color:black;'>Rejouer</button>"; 
                        }
                        
                      
                    }
                    
              ?>
            </div>
            <div class="col-5" style="border-left:2px solid #51BFD0;left:13%; ">
                <?php 
                    if ($_SESSION['i']==$_SESSION['val'][0]['val_nbrquestion']+1){?>
                        <h4>Vous avez faussé les questions suivantes</h4><br>
                      <?php  if (isset($_SESSION['fausse'])){
                        foreach($_SESSION['fausse'] as $valeur2)
                        {
                            echo $valeur2;
                            echo '<br>';
                        }
                        

                    }
                        
                    }
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
                if ($_SESSION['i']>1 && $_SESSION['i']!=$_SESSION['val'][0]['val_nbrquestion']+1){
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