
$(".input2").hover(function(){
    $(this).css("background-color", "#51BFD0");
    }, function(){
    $(this).css("background-color", "rgb(236, 243, 241)");
  });
  $(".creer2").hover(function(){
    $(this).css("background-color", "#51BFD0");
    }, function(){
    $(this).css("background-color", "rgb(147, 201, 209)");
  });
  $(".creer3").hover(function(){
    $(this).css("background-color", "#51BFD0");
    }, function(){
    $(this).css("background-color", "rgb(147, 201, 209)");
  });
  $(".input1").hover(function(){
    $(this).css("background-color", "#51BFD0");
    }, function(){
    $(this).css("background-color", "rgb(236, 243, 241)");
  });
  $(".btn-form").hover(function(){
    $(this).css("background-color", "#51BFD0");
    }, function(){
    $(this).css("background-color", "rgb(147, 201, 209)");
  });
  $(function(){
    $("#eprenom").css('color', 'white');
    $("#enom").css('color', 'white');
    $("#elogin").css('color', 'white');
    $("#epassword").css('color', 'white');
    $("#ecpassword").css('color', 'white');
    $("#error-1").css('color', 'white');
    $("#error-2").css('color', 'white');
    $("#equestion").css('color', 'white');
    $("#enbrpoints").css('color', 'white');

    var error_prenom = false;
    var error_nom = false;
    var error_login = false;
    var error_password = false;
    var error_cpassword = false;
    var error_1 = false;
    var error_2 = false;
    var equestion = false;
    var enbrpoints = false;
    $("#id").focusout(function(){
       
        check_id();
    });
    $("#mdp").focusout(function(){
       
        check_mdp();
    });
    $("#prenom").focusout(function(){
       
        check_prenom();
    });
    $("#nom").focusout(function(){
       
        check_nom();
    });
    $("#login").focusout(function(){
       
        check_login();
    });
    $("#password").focusout(function(){
       
        check_password();
    });
    $("#cpassword").focusout(function(){
       
        check_cpassword();
    });
    $("#error-3").focusout(function(){
       
        check_error3();
    });
    $("#error-4").focusout(function(){
       
        check_error4();
    });

    function check_id(){
        var idval = $("#id").val().length;
        if (idval < 3){
            $("#error-1").css('color', 'red');
            $("#id").css('border', '1px solid red');
            error_id = true;
        }
        else{
            $("#error-1").css('color', 'white');
            $("#id").css('border', '0px solid black');
        }
    }
    function check_mdp(){
        var mdpval = $("#mdp").val().length;
        if (mdpval < 3){
            $("#error-2").css('color', 'red');
            $("#mdp").css('border', '1px solid red');
            error_id = true;
        }
        else{
            $("#error-2").css('color', 'white');
            $("#mdp").css('border', '0px solid black');
        }
    }
    function check_prenom(){
        var prenomval = $("#prenom").val().length;
        if (prenomval < 3){
            $("#eprenom").css('color', 'red');
            $("#prenom").css('border', '1px solid red');
            error_prenom = true;
        }
        else{
            $("#eprenom").css('color', 'white');
            $("#prenom").css('border', '0px solid red');
        }
    }
    function check_nom(){
        var nomval = $("#nom").val().length;
        if (nomval < 3){
            $("#enom").css('color', 'red');
            $("#nom").css('border', '1px solid red');
            error_nom = true;
        }
        else{
            $("#enom").css('color', 'white');
            $("#nom").css('border', '0px solid red');
        }
    }
    function check_login(){
        var loginval = $("#login").val().length;
        if (loginval < 3){
            $("#elogin").css('color', 'red');
            $("#login").css('border', '1px solid red');
            error_login = true;
        }
        else{
            $("#elogin").css('color', 'white');
            $("#login").css('border', '0px solid red');
        }
    }
    function check_password(){
        var passwordval = $("#password").val().length;
        if (passwordval < 4){
            $("#epassword").css('color', 'red');
            $("#password").css('border', '1px solid red');
            error_passwors = true;
        }
        else{
            $("#epassword").css('color', 'white');
            $("#password").css('border', '0px solid red');
        }
    }
    function check_cpassword(){
        var passwordvalue = $("#password").val();
        var cpasswordval = $("#cpassword").val();
        if (cpasswordval != passwordvalue){
            $("#ecpassword").css('color', 'red');
            $("#cpassword").css('border', '1px solid red');
            error_cpassword = true;
        }
        else{
            $("#ecpassword").css('color', 'white');
            $("#cpassword").css('border', '0px solid red');
        }   
    }
    function check_error3(){
        var quesval = $("#error-3").val().length;
        if (quesval < 3){
            $("#equestion").css('color', 'red');
            $("#error-3").css('border', '1px solid red');
            error_equestion = true;
        }
        else{
            $("#equestion").css('color', 'white');
            $("#error-3").css('border', '0px solid red');
        }
    }
    function check_error4(){
        var ptsval = $("#error-4").val();
        if (ptsval < 5){
            $("#enbrpoints").css('color', 'red');
            $("#error-4").css('border', '1px solid red');
            error_equestion = true;
        }
        else{
            $("#enbrpoints").css('color', 'white');
            $("#error-4").css('border', '0px solid red');
        }
    }
});
$(document).ready(function(){
    $("#button").on('click', function(){
        var id = $("#id").val();
        var mdp = $("#mdp").val();
        if (id=="" || mdp==""){
            alert("veillez saisir des donnees valides");
        }
        else{
            $.ajax({
                url: 'index.php',
                method : 'POST',
                data: {
                    login: 1,
                    idphp: id,
                    mdpphp: mdp,            
                },
                success: function(response){
                    console.log(response);
                    if (response.indexOf('successA')>=0){
                        window.location = 'index.php?lien=accueil';
                    }
                    else if (response.indexOf('successJ')>=0){
                        window.location = 'index.php?lien=joueur';
                    }
                },
                datatype: 'text'
            })
        }
            
    })
})
$(document).ready(function(){
    $("#creer").on('click', function(){
        var prenom = $("#prenom").val();
        var nom = $("#nom").val();
        var login = $("#login").val();
        var password = $("#password").val();
        var cpassword = $("#cpassword").val();
        if (nom=="" || prenom=="" || login=="" || password=="" || cpassword==""){
            alert("veillez saisir des donnees valides");
        }
        else{
                $.ajax({
                    url: 'index.php?inscription',
                    method : 'POST',
                    datatype: 'text',
                    data: {
                        save: 1,
                        prenomphp: prenom,
                        nomphp: nom,   
                        loginphp: login,
                        passwordphp: password,
                        cpasswordphp: cpassword,             
                    },
                    success: function(response){
                        console.log(response);
                        if (response.indexOf('success')>=0){
                            window.location = 'index.php';
                        }
                    },
                    });
        }
        
             
               
    })
})
$(document).ready(function(){
    $("#creer2").on('click', function(){
        var prenom = $("#prenom").val();
        var nom = $("#nom").val();
        var login = $("#login").val();
        var password = $("#password").val();
        var cpassword = $("#cpassword").val();
        if (nom=="" || prenom=="" || login=="" || password=="" || cpassword==""){
            alert("veillez saisir des donnees valides");
        }
        else{
                $.ajax({
                    url: 'index.php?lien=accueil&link=2',
                    method : 'POST',
                    datatype: 'text',
                    data: {
                        save2: 1,
                        prenomphp: prenom,
                        nomphp: nom,   
                        loginphp: login,
                        passwordphp: password,
                        cpasswordphp: cpassword,             
                    },
                    success: function(response){
                        console.log(response);
                        if (response.indexOf('successA')>=0){
                            window.location = '';
                        }
                    },
                    });
        }
        
             
               
    })
})

$(document).ready(function(){
    $("#creer3").on('click', function(){
        var question = $("#error-3").val();
        var pts = $("#error-4").val();
        var type = $("#select").val();
        var rep1 = $("#rep1").val();
        var rep2 = $("#rep2").val();
        var rep3 = $("#rep3").val();
        var rep4 = $("#rep4").val();
        if($("#choix1").is(':checked')){var choix1 = $("#choix1").val();}
        if($("#choix2").is(':checked')){var choix2 = $("#choix2").val();}
        if($("#choix3").is(':checked')){var choix3 = $("#choix3").val();}
        if($("#choix4").is(':checked')){var choix4 = $("#choix4").val();}
        
        if (question=="" || pts=="" || type=="" || rep1==""){
            alert("veillez saisir des donnees valides");
        }
        else{
                $.ajax({
                    url: 'index.php?lien=accueil&link=4',
                    method : 'POST',
                    datatype: 'text',
                    data: {
                        save3: 1,
                        questionphp: question,
                        ptsphp: pts,   
                        typephp: type,
                        rep1php: rep1,
                        rep2php: rep2,
                        rep3php: rep3,
                        rep4php: rep4, 
                        choix1php: choix1, 
                        choix2php: choix2, 
                        choix3php: choix3,
                        choix4php: choix4,            
                    },
                    success: function(response){
                        console.log(response);
                        if (response.indexOf('successA')>=0){
                            window.location = '';
                        }
                    },
                    });
        }
        
             
               
    })
})
