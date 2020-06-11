<div class="container-fluid" style="margin-left: 0%; width:100%; background-color:white; height: 500px;background-color:#51BFD0;border-radius: 2px; border: 10px solid #283D3F;">
        <div class="row" style="height: 60px;">

        </div>
        <div class="row" style="height: 416px;">
        <div class="col-3 text-center"  style="">
        <?php 
                $rowsperpage2= 10;
                if (isset($_POST['page2'])){
                    $page2= $_POST['page2'];
                }
                else{
                    $page2= 1;
                }
                $debut2= ($page2-1) * $rowsperpage2;
                    try{
                        // On se connecte à MySQL
                        $bdd = new PDO('mysql:host=localhost;dbname=quizz;charset=utf8', 'root', '');
                    }
                    catch(Exception $e){
                        // En cas d'erreur, on affiche un message et on arrête tout
                        die('Erreur : '.$e->getMessage());
                    }
                    $data2 = $bdd->query("SELECT `id_user`, `prenom_user`, `name_user` FROM user WHERE type_user = 'admin'");
                    $user=$data2->fetchAll();
                    


                    $row2 = $bdd->query("SELECT `prenom_user`, `name_user` FROM user WHERE type_user = 'admin'");
                    $rows2=$row2->fetchAll();
                    $rowscount2=count($rows2);
                    $totalpage2=ceil($rowscount2/$rowsperpage2);
                ?> 
                        <H8 class="text-secondary">PRENOM</H8><br>
                        <?php  
                            for($i=0; $i<$rowsperpage2 ;$i++){
                                if (isset($user[$i]['prenom_user'])){
                                echo $user[$i]['prenom_user'];
                                echo '<br>';
                            }
                        }
                        ?>
                    </div>
                    <div class="col-3 text-center" style="">
                        <H8 class="text-secondary">NOM</H8><br>
                        <?php 
                            for($i=0; $i<$rowsperpage2 ;$i++){
                                if (isset($user[$i]['name_user'])){
                                    echo $user[$i]['name_user'];
                                    $num=$user[$i]['id_user'];?>
                                    <a href='index.php?lien=accueil&link=2&n=<?php echo $num; ?>'>Modifier</a><?php
                                    echo '<br>';
                                }
                               
                                
                            }
                        ?>
                    </div>
                    <div class="col-3 text-center"  style="">
                    <H8 class="text-secondary">TOTAL QUESTIONS</H8><br>
                   <?php try{
                        // On se connecte à MySQL
                        $bdd = new PDO('mysql:host=localhost;dbname=quizz;charset=utf8', 'root', '');
                    }
                    catch(Exception $e){
                        // En cas d'erreur, on affiche un message et on arrête tout
                        die('Erreur : '.$e->getMessage());
                    }
                    $data = $bdd->query("SELECT `id_question`, `intitule_question`,`type_question`, `reponse1`, `reponse2`, `reponse3`, `reponse4`, `choix1`, `choix2`, `choix3`, `choix4` FROM question ");
                    $user=$data->fetchAll();
                    $rows=count($user);?>
                    <?php echo $rows; ?>
                    </div>
                    <div class="col-3 text-center"  style="">
                    <H8 class="text-secondary">TOTAL D'UTILISATEURS</H8><br>
                    <?php try{
                        // On se connecte à MySQL
                        $bdd = new PDO('mysql:host=localhost;dbname=quizz;charset=utf8', 'root', '');
                    }
                    catch(Exception $e){
                        // En cas d'erreur, on affiche un message et on arrête tout
                        die('Erreur : '.$e->getMessage());
                    }
                    $row = $bdd->query("SELECT `prenom_user`, `name_user`, `val_score` FROM user, score WHERE type_user = 'joueur' AND user.id_user = score.id_user");
                    $rows=$row->fetchAll();
                    $rowscount=count($rows);
                     echo $rowscount; ?>
                    </div>
        </div>
        <?php 
                    for($j=1; $j<=$totalpage2; $j++){
                        echo "<button type='button' class='pagination_link2' id='".$j."' style='cursor:pointer; color:black;'>".$j."</button>"; 
                     }
                ?>
    </div>