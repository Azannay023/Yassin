<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>


	<div class='box'>
		<div class='box-form'>
			<div class='box-login-tab'></div>
			<div class='box-login-title'>
				<div class='i i-login'></div>
				<h2>LOGIN</h2>
			</div>
			<div class='box-login'>
				<div class='fieldset-body' id='login_form'>
					<button onclick="openLoginInfo();" class='b b-form i i-more' title='Opties'></button>
					<form action="functions.php" method="post">
                     
					<?php
                    session_start();


                    // Controleer of er een succesqueryparameter is ingesteld
                    if (isset($_GET['signup']) && $_GET['signup'] == 'success') {
						echo '<p style="color: green; text-align: center;">Account succesvol aangemaakt!</p>';
						// Je kunt deze sessievariabele gebruiken om de boodschap slechts één keer weer te geven
						$_SESSION['signup_success'] = true;
					}
					


					
                    if (isset($_SESSION['login_error'])) {
                        echo '<p style="color: red; text-align: center; margin-bottom: 0;">' . $_SESSION['login_error'] . '</p>';
                        unset($_SESSION['login_error']);
                    }
                    ?>


					<p class='field'>
						<label for='user'>Gebruikersnaam</label>
						<input type='text' id='user' name='username' title='Username' required/>
						<span id='valida' class='i i-warning'></span>
					</p>
					<p class='field'>
						<label for='pass'>Wachtwoord</label>
						<input type='password' id='pass' name='password' title='Password' required />
						<span id='valida' class='i i-close'></span>
					</p>

					  <input class='button' type='submit' id='do_login' value='Login' title='Login' />
					</form>
				</div>
			</div>
		</div>
		<div class='box-info'>
			<p><button onclick="closeLoginInfo();" class='b b-info i i-left' title='Terug'></button>
				<h3>Hulp Nodig?</h3>
			</p>
			<div class='line-wh'></div>
			<button onclick="window.location.href='forgot_password.php';" class='b-support' title='Wachtwoord Vergeten?'> Wachtwoord Vergeten?</button>


			<div class='line-wh'></div>
			<button onclick="window.location.href='signup.php';" class='b-support' title='Account Aanmaken'> Account Aanmaken</button>
		</div>
	</div>

<script>

$(document).ready(function() {
    $("#do_login").click(function() { 
       closeLoginInfo();
       $(this).parent().find('span').css("display","none");
       $(this).parent().find('span').removeClass("i-save");
       $(this).parent().find('span').removeClass("i-warning");
       $(this).parent().find('span').removeClass("i-close");
       
        var proceed = true;
        $("#login_form input").each(function(){
            
            if(!$.trim($(this).val())){
                $(this).parent().find('span').addClass("i-warning");
            	$(this).parent().find('span').css("display","block");  
                proceed = false;
            }
        });
       
        if(proceed) 
        {
            $(this).parent().find('span').addClass("i-save");
            $(this).parent().find('span').css("display","block");
        }
    });
    
    
    $("#login_form input").keyup(function() { 
        $(this).parent().find('span').css("display","none");
    });
 
  openLoginInfo();
  setTimeout(closeLoginInfo, 1000);
});

function openLoginInfo() {
    $(document).ready(function(){ 
    	$('.b-form').css("opacity","0.01");
      $('.box-form').css("left","-37%");
      $('.box-info').css("right","-37%");
    });
}

function closeLoginInfo() {
    $(document).ready(function(){ 
    	$('.b-form').css("opacity","1");
    	$('.box-form').css("left","0px");
      $('.box-info').css("right","-5px"); 
    });
}

$(window).on('resize', function(){
      closeLoginInfo();
});

</script>


</body>

</html>