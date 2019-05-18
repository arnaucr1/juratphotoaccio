<html>
	<head>
	<title>PhotoAcció 🏆 Classificacions</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../imagenes/blue-camera.png"/>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/generic.css">
	</head>
	<?php
					include "../php/bbdd.php";
					session_start();
					if(!empty($_SESSION)){
						if(isset($_SESSION["email"])){	
							if($_SESSION["email"] == "admin@admin"){
								header('Location: ../admin/');		
							}else{
								$activity = selectUsuari($_SESSION["email"]);
								while ($fila = mysqli_fetch_assoc($activity)) {
										extract($fila);
										$id_soci = $id;
										$social_usu = $social;
										$estat = $actiu;
								}
								if($actiu == "1"){	

								if($social_usu == 1){
									$social_usu = "A <i class='fas fa-star'></i>";
									$concurs = selectConcursA();
								
								}else if($social_usu == 2){
									$social_usu = "B <i class='fas fa-star'></i>";
									$concurs = selectConcursB();	
								}
								else{
									$social_usu = "<i class='far fa-star'></i>";
									$concurs = selectConcurs();
								}
								$dataactual = datactual();
								$hora = strftime("%H");
								if($hora >= "13" AND $hora <= "20"){
									$momentdia = "Bona tarda :)";
								}else if($hora >= "5" AND $hora <= "13"){
									$momentdia = "Bon dia!";
								}else{
									$momentdia = "<i class='fas fa-moon'></i> Bona nit,";
								}
									?>
		<body>
			<nav class="navbar navbar-expand-lg  dark-nav">
			<a class="navbar-brand text-black googlesans" >
				 🏆 Classificacions </a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
						</li>
					</ul>
					 		<a href="../cerrar_sesion.php" class="btn btn-info btn-rodo" ><i class="fas fa-sign-out-alt"></i> Tancar Sessió </a>	
				</div>
			</nav>
			<div class="tot">			
									<div class="container"> 
									<?php echo '<h1 class="titol googlesans">'. $momentdia.' '.utf8_encode ($nom).'</h1>'; ?>
									<br><div class="btn btn-primary" style="pointer-events:none;">
									Codi jurat: <span class="badge badge-light"><?php echo $id_soci; ?> </span>
									</div>
									<br><br> 
									<table class="table table-striped ">
											<thead>
												<tr>
												<th scope="col"><span class="badge badge-concurs btn-rodo txt-concrs"><i class="fas fa-medal"></i> Concursos</span> </th>
												<th scope="col"><span class="badge btn-rodo txt-concrs">Tema</span> </th>
											
												<th scope="col"  class="text-center"><span class="badge  btn-rodo txt-concrs"><i class="fas fa-book"></i> Bases</span></th>
												<th scope="col" class="text-center"></th>
												</tr>
											</thead>
											<tbody>
									<?php	
										
										while ($fila = mysqli_fetch_assoc($concurs)) {
												extract($fila);
												$id_concurs = $id;
												$participat = NULL;
										$activity2 = selectParticipat($id_soci, $id_concurs);
										while ($fila2 = mysqli_fetch_assoc($activity2)) {
												extract($fila2);
											}
											if($tipus == 1){
												$tipus = "Grup A <i class='fas fa-star'></i>";
											}else if($tipus == 2){
												$tipus = "Grup B <i class='fas fa-star'></i>";
											}
											else{
												$tipus = "";
											}
											echo'

												<tr>
												<td> '.utf8_encode ($nom).' <span class="badge badge-pill badge-danger">'.$tipus.'</span> </td>
												<td> '.utf8_encode ($tema).' </td>
												<td  class="text-center"><a href="'.utf8_encode ($bases).'" class="badge badge-success btn-rodo" target="_blank">Consultar bases</a></td>
												'; 
												
												if($estat == 1){
												if($participat == 1){ echo'
											
													';} else{
														
													}}else{
														echo '
														<form action="../puntuar/index.php" method="post">
														<input type="hidden" name="idconcurs" value="'.$id.'" id="idconcurs"/>
														<td  class="text-center"><button type="submit" class="btn btn-primary btn-rodo">Puntuar</button></td>
														
														</form>
														';
													} echo'
												</tr>	
											';
										}	
										?>
										</tbody></table></div> 

										<?php }else{
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
				<h1 class="text-center titol">⏳ Esperant activació</h1>
				<h6 class="text-center">Gràcies per la teva paciència.</h6> 
					
				
				</form>
				
			</div>
			
	</div>
    </div>
</div>

</body>
</html>

<?php
										}
							}										
									}else{
										print "<script>window.location='../';</script>";
									}
									
								}else{
									print "<script>window.location='../';</script>";
								}
