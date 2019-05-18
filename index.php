<?php
	include "php/bbdd.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>PhotoAcció 🏆 Classificacions</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="imagenes/blue-camera.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<!--===============================================================================================-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		
<!--===============================================================================================-->

<body>
<div class="container h-100">
    <div class="row align-items-center h-100">
        <div class="col-6 mx-auto">
            <div class="jumbotron" style="border-radius:16px;">
				<form  method="post" action="">
				<h1 class="text-center titol">🏆 Classificacions</h1>
				<h6 class="text-center">Versió 1.1</h6> 
					<div class="form-group">
					<label for="exampleInputEmail1"><b>Correu electrònic</b></label>
						<input  class="form-control btn-rodo"  type="email" id="username" name="username" placeholder="Escriu el teu correu electrònic" required>
						<small id="emailHelp" class="form-text text-muted">Mai compartirem el teu correu electrònic.</small>
					</div>
					<div class="form-group">
					<label for="exampleInputEmail1"><b>Contrasenya</b></label>
						<input class="form-control btn-rodo" type="password" id="pass"  placeholder="Escriu la teva contrasenya" name="pass" required>
					</div>
					<button class="btn btn-primary btn-rodo">Entrar </button><br><br>
				 <a class="btn btn-success btn-rodo" href="https://photoaccio.afr.cat"> PhotoAcció </a>			
				
				
				</form>
				<?php
						
							if(!empty($_POST)){
								if(isset($_POST["username"])){	
									$password=null;
									$con = conectar(); 
									$sql1= "select pass from jurat where (email=\"$_POST[username]\") ";
									$query = $con->query($sql1);
									while ($r=$query->fetch_array()) {
									$password=$r["pass"]; 									
									break; }
									$email = $_POST["username"];
									if(password_verify($_POST["pass"], $password)){
										session_start(); 
										$_SESSION["email"] = $email;
										header('Location: home/');				
									}else{
										echo "<br><div class='alert alert-secondary' role='alert'><i class='fas fa-exclamation-triangle'></i> Dades incorrectes, web@afr.cat</a></a></div>";
									}
								}
							}
							?>
			</div>
			<div class="alert alert-primary mic" role="alert">Aplicació desenvolupada per Arnau Canal Rial, <a class='alert-link' href="https://paypal.me/arnaucanal2"> convida'm a un cafè :) </a></div>
	</div>
    </div>
</div>

</body>
</html>