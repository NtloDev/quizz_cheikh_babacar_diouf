<div class="container-fluid" style="margin-left: 0%; width:100%; height: 500px; background-color:white; height: 515px;">
    <div class="row" style="height: 405px;">
        <div class="col-4 text-center">
            <img src="asset/IMG/images/profils/IMG-20200513-WA0033.jpg" class="rounded-circle img-profil2" alt="Cinque Terre" ><br>
        </div>
        <div class="col-8 box">
            <div class="mx-auto" id="results" style="background-color: rgb(255, 255, 255);  color:white;width: 100%; height: 510px;">
                <nav class="navbar navbar-expand" style="background-color: #51BFD0; height: 30px;">
                    <p class="navbar-brand mx-auto" id="inscrir">LISTE DES JOUEURS</p>        
                </nav>
                <?php 
                if (isset ($_POST['numero'])){
                    $numb= $_POST['numero'];
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

                    $data5 = $bdd->query("UPDATE `user` SET `type_user`='joueurbloque' WHERE login_user='{$numb}'");
                    $datann5=$data5->fetch();
                    var_dump($datann);
                }
                $rowsperpage= 10;
                if (isset($_POST['page'])){
                    $page= $_POST['page'];
                }
                else{
                    $page= 1;
                }
                $debut= ($page-1) * $rowsperpage;
                    try{
                        // On se connecte à MySQL
                        $bdd = new PDO('mysql:host=localhost;dbname=quizz;charset=utf8', 'root', '');
                    }
                    catch(Exception $e){
                        // En cas d'erreur, on affiche un message et on arrête tout
                        die('Erreur : '.$e->getMessage());
                    }
                    $data = $bdd->query("SELECT `login_user`, `name_user` , `prenom_user`, `val_score` FROM user, score WHERE type_user = 'joueur' AND user.id_user = score.id_user ORDER BY val_score DESC LIMIT ".$debut.", ".$rowsperpage."");
                    $user=$data->fetchAll();
                    


                    $row = $bdd->query("SELECT `prenom_user`, `name_user`, `val_score` FROM user, score WHERE type_user = 'joueur' AND user.id_user = score.id_user");
                    $rows=$row->fetchAll();
                    $rowscount=count($rows);
                    $totalpage=ceil($rowscount/$rowsperpage);
                ?> 
                <div class="row" id="blo" style="height: 430px;background-color:#51BFD0; border-radius: 10px;border: 15px solid  #FFFF;">
                    <div class="col-4 text-center"  style=" margin-top:50px;">
                        <H8 class="text-secondary">PRENOM</H8><br>
                        <?php 
                            for($i=0; $i<$rowsperpage ;$i++){
                                if (isset($user[$i]['prenom_user'])){
                                echo $user[$i]['prenom_user'];
                                echo '<br>';
                            }
                        }
                        ?>
                    </div>
                    <div class="col-4 text-center" style=" margin-top:50px;">
                        <H8 class="text-secondary">NOM</H8><br>
                        <?php 
                            for($i=0; $i<$rowsperpage ;$i++){
                                if (isset($user[$i]['name_user'])){
                                    echo $user[$i]['name_user'];
                                   
                                    echo '<br>';
                                }
                                
                            }
                        ?>
                    </div>
                    <div class="col-4 text-center"  style=" margin-top:50px;">
                        <H8 class="text-secondary">SCORE</H8><br>
                        <?php 
                            for($i=0; $i<$rowsperpage ;$i++){
                                if (isset($user[$i]['val_score'])){
                                echo $user[$i]['val_score'];
                                $number=$user[$i]['login_user'];
                                echo " ";
                                echo "points";
                                echo " ";
                                echo "<button type='button' class='blok' id='".$number."' style='cursor:pointer; color:black;position: relative;border-radius: 10px;border: 2px solid #51BFD0;background-color: red;font-size: 13px;height: 20px;'>Bloquer</button>"; 
                                echo '<br>';
                            }
                        }
                        ?>
                    </div>
                </div>
                <?php 
                    for($i=1; $i<=$totalpage; $i++){
                        echo "<button type='button' class='pagination_link' id='".$i."' style='cursor:pointer; color:black;'>".$i."</button>"; 
                     }
                ?>
            </div>
        </div>
    </div>
</div>