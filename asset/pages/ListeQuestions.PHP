<div class="container-fluid" style="margin-left: 0%; width:100%; height: 500px; background-color:white; height: 515px;">
    <div id="row" class="row" style="height: 405px;">
        <div class="col-4 text-center">
            <div class="row" style="height: 80px;">
                <div class="col-11 text-center box2">
                <h5>Definir le nombre de<br> question par jeu</h5>
                <form method="post" action="" id="nbqquestion" class="mx-auto text-center">
                    <input type="number" name="nbrquestion" class="input3" id ="error-4">
                    <button type="button" name="ok" id="nbrqu" onclick ="nbq(1)" class="ok" >OK</button>
                    <?php 
                        if (isset($_POST['strr'])){
                            $nbq=$_POST['val'];
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
                    
                                $data6 = $bdd->query("UPDATE `nbrquestion` SET `val_nbrquestion`='{$nbq}' WHERE id_nbrquestion='1'");
                                exit('successC');  
                        }              
                    ?>
                </form>
                </div>
            </div> 
        </div>
    <div class="col-8 box" >
    <?php 
                    try{
                        // On se connecte à MySQL
                        $bdd = new PDO('mysql:host=localhost;dbname=quizz;charset=utf8', 'root', '');
                    }
                    catch(Exception $e){
                        // En cas d'erreur, on affiche un message et on arrête tout
                        die('Erreur : '.$e->getMessage());
                    }
                    $data = $bdd->query("SELECT `id_question`, `intitule_question`,`type_question`, `reponse1`, `reponse2`, `reponse3`, `reponse4`, `choix1`, `choix2`, `choix3`, `choix4` FROM question ");
                    $user=$data->fetchAll();
                    $rows=count($user);
                   
                ?> 
                <div class="row" id="target" style=" margin-left:0.5%; overflow: scroll; width: 100%; height: 400px;height: 430px;background-color: rgb(255, 255, 255); border-radius: 10px;border: 15px solid  #FFFF;">
                    <div class="col-12 text-center" id="fetching"  style="margin-top:50px;">
                       <?php 
                       if (isset ($_POST['numero'])){
                        $f=$_POST['numero'];
                        try{
                            // On se connecte à MySQL
                            $bdd = new PDO('mysql:host=localhost;dbname=quizz;charset=utf8', 'root', '');
                        }
                        catch(Exception $e){
                            // En cas d'erreur, on affiche un message et on arrête tout
                            die('Erreur : '.$e->getMessage());
                        }
                    $sqla= $bdd->query("DELETE FROM question WHERE id_question='{$f}'");
                    $userr=$sqla->fetchAll();
                        exit('succeed');
                       }
                       if (isset($_POST['action'])){ 
                            for ($i=0; $i<$rows ;$i++){
                              ?><p style="font-weight:bold; color:white; background-color: #283D3F; border-radius: 10px;border: 15px solid  #51BFD0;"><?php 
                                     echo $i+1;
                                     echo ' ';
                                     echo $user[$i]['intitule_question'];?>
                                </p><?php
                                if ($user[$i]['type_question']=="unseulchoix"){
                                    for ($j=1 ;$j<=4; $j++){
                                        if($user[$i]['reponse'.$j]!= ""){
                                            echo '<input type="radio" />';
                                            echo ' ';
                                            echo $user[$i]['reponse'.$j];
                                            echo ' ';
                                       
                                        }
                                    
                                    }
                                    echo '<br>'; 
                                    echo '<br>'; ?><?php $num=$user[$i]['id_question'];?>
                                    <input type="button" value="Supprimer" style="background-color:rgb(207, 16, 29);" class="suppr" onclick="deletedata(<?php echo $num;?>)" id="<?php echo 'supprimer'.$i; ?>"/>
                                    <a style="color:black;border-radius: 10px;border: 2px solid rgb(145, 193, 212);" href='index.php?lien=accueil&link=4&m=<?php echo $num; ?>'>Modifier</a>
                                    <?php
                                }
                                
                                if ($user[$i]['type_question']=="choixmultiple"){
                                    for ($j=1 ;$j<=4; $j++){
                                        if($user[$i]['reponse'.$j]!= ""){
                                            echo '<input type="checkbox" />';
                                            echo ' ';
                                            echo $user[$i]['reponse'.$j];
                                            echo ' ';
                                        }
                                    }
                                    echo '<br>'; 
                                    echo '<br>'; 
                                    ?><?php $num=$user[$i]['id_question'];?>
                                    <input type="button" value="Supprimer" style="background-color:rgb(207, 16, 29);" class="suppri" onclick="deletedata(<?php echo $num; ?>)" id="<?php echo 'supprimer'.$i; ?>"/>
                                    <a style="color:black;border-radius: 10px;border: 2px solid rgb(145, 193, 212);" href='index.php?lien=accueil&link=4&m=<?php echo $num; ?>'>Modifier</a>
                                    <?php
                                }
                                
                                if ($user[$i]['type_question']=="texte"){
                                            echo '<input type="textarea" />';
                                            echo ' ';
                                            echo $user[$i]['reponse1'];
                                            echo ' ';
                                            echo '<br>'; 
                                            echo '<br>'; 
                                            ?><?php $num=$user[$i]['id_question'];?>
                                    <input type="button" value="Supprimer" style="background-color:rgb(207, 16, 29);" class="suppr" onclick="deletedata(<?php echo $num; ?>)" id="<?php echo 'supprimer'.$i; ?>"/>
                                    <a style="color:black;border-radius: 10px;border: 2px solid rgb(145, 193, 212);" href='index.php?lien=accueil&link=4&m=<?php echo $num; ?>'>Modifier</a><?php
                                        }
                                     
                                        echo '<br>'; 
                                        echo '<br>'; 
                                } 
                            }
                       ?>
                    </div>
                </div>
        <div id="log"></div>
    </div>
</div>