<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Jurat PhotoAcció </title>
						  <meta charset="UTF-8">
						  <meta name="viewport" content="width=device-width, initial-scale=1">
  						<link rel="icon" type="image/png" href="../imagenes/blue-camera.png"/>
							<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">	
<link rel="stylesheet" href="css/style.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:500&display=swap" rel="stylesheet">
    					  <link rel="stylesheet" href="css/style.css">
</head>
						<nav class="navbar navbar-expand-lg  dark-nav">
			<a class="navbar-brand text-black googlesans" >
			🏆 Jurat PhotoAcció   </a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							
						</li>
						
					</ul>
					<span class='badge  btn-rodo badge-light' style="font-size:16px;">Un cop punutades totes les fotos, pots tornar a inici --></span>	<a href="../home/"  class="btn btn-primary btn-rodo"><i class="fas fa-home"></i> Tornar a inici </a>	
				</div>
			</nav>
	
			<div class="tot">
			<div class="container" style=" text-align:center; ">
					
<?php
include "../php/bbdd.php";
session_start();
 if(!empty($_SESSION)){
	 if(isset($_SESSION["email"])){	
		$activity = selectUsuari($_SESSION["email"]);
								while ($fila = mysqli_fetch_assoc($activity)) {
										extract($fila);
										$id_soci = $id;
								
								}
		$idconcurs = "";
		if(isset($_POST["idconcurs"]))
		{
			$_SESSION['cedula'] =  $idconcurs = $_POST["idconcurs"];
		}
		elseif(isset($_SESSION["cedula"]))
		{
			$idconcurs = $_SESSION['cedula'];
		}
		$conexion = conectar();
$query = "SELECT * FROM concurs where id='$idconcurs' ";
$query_searched = mysqli_query($conexion,$query);
$count_results = mysqli_num_rows($query_searched);	
while ($row_searched = mysqli_fetch_array($query_searched)) {                                       
	$concurs = $row_searched['nom']; 
	$id_concurs = $row_searched['id']; 						
	}
		$conexion4 = conectar();
		$query4 = "SELECT count(*) as total FROM valoracions where id_concurs=$id_concurs and id_jurat=$id_soci ";
		$query_searched4 = mysqli_query($conexion4,$query4);
		$count_results4 = mysqli_num_rows($query_searched4);
		while ($row_searched4 = mysqli_fetch_array($query_searched4)) {
			$foto_puntuades = $row_searched4['total'];
			
		}
		$conexion3 = conectar();
		$query3 = "SELECT count(*) as total2 FROM participacions where concurs_id=$id_concurs ";
		$query_searched3 = mysqli_query($conexion3,$query3);
		$count_results3 = mysqli_num_rows($query_searched3);
		while ($row_searched3 = mysqli_fetch_array($query_searched3)) {
			$per_puntuar = $row_searched3['total2'];
			
		}
			
					$conexion = conectar();
					$query = "SELECT * FROM concurs where id='$idconcurs' ";
					$query_searched = mysqli_query($conexion,$query);
					$count_results = mysqli_num_rows($query_searched);	
					while ($row_searched = mysqli_fetch_array($query_searched)) {                                       
						$concurs = $row_searched['nom']; 						
						}
					?> <h1 class='googlesans'> <?php echo utf8_encode($concurs); ?></h1>
						<span class='badge  btn-rodo badge-secondary' style="font-size:14px;">Has puntuat <?php echo $foto_puntuades; ?> fotos d'un total de <?php echo $per_puntuar; ?> </span><br><br>
				
					<span class='badge  btn-rodo badge-light' style="font-size:15px;">Fes click a cualsevol foto per ampliarla i veure-la a tamany original.</span><br><br>
				
<div class="container">
<div class="container gallery-container">
    <div class="tz-gallery">
        <div class="row">
		<?php 

	

	$conexion = conectar();
$query = "SELECT * FROM participacions where concurs_id=$id_concurs ";
$query_searched = mysqli_query($conexion,$query);
$count_results = mysqli_num_rows($query_searched);	
while ($row_searched = mysqli_fetch_array($query_searched)) {  
	$concurs2 = $row_searched['concurs_id'];
	$socisid = $row_searched['socis_id']; 
	$nomarxiu = $row_searched['nomarxiu'];
	$parti_id = $row_searched['parti_id'];
			$puntuacio1 = 0;
			$conexion2 = conectar();
			$query2 = "SELECT * FROM valoracions where id_concurs=$id_concurs and id_jurat=$id_soci and id_foto=$parti_id ";
			$query_searched2 = mysqli_query($conexion2,$query2);
			$count_results2 = mysqli_num_rows($query_searched2);
			while ($row_searched2 = mysqli_fetch_array($query_searched2)) {
				$puntuacio1 = $row_searched2['puntuacio'];
				
			}

					echo '<div class="card" style="width: 18rem; margin:25px; margin-left: 30px;">
				
					<a name="'.$parti_id.'">
							<a class="lightbox" href="https://photoaccio.afr.cat/img/'.$idconcurs.'/'.$socisid.'/'.$nomarxiu.'">
							<img class="card-img-top" src="https://photoaccio.afr.cat/img/'.$idconcurs.'/'.$socisid.'/'.$nomarxiu.'" style="height:220px;">
							</a>
							<div class="card-body">
									
							<h5 class="card-title">Prticipant: '.$socisid.' </h5>
							<p class="card-text">Id foto: '.$parti_id.' </p>
							<form  method="post" action="guardar_vot.php">
							<input type="hidden" id="idfoto" name="idfoto" value="'.$parti_id.'">
							<input type="hidden" id="idconcurs" name="idconcurs" value="'.$id_concurs.'">
							<input type="hidden" id="idsoci" name="idsoci" value="'.$id_soci.'">
							<select class="form-control form-control-lg" name="punts" id="punts">
							
							 '; 
	
							for($i = 0; $i <= 10; $i++){ 
							 	if($i==$puntuacio1){
								 echo' <option value="'.$i.'" selected>'.$i.'</option> ';
								}else{
									echo' <option value="'.$i.'">'.$i.'</option> ';
								}
							 } 
								echo ' 
							</select><br>
							<button class="btn btn-success btn-rodo">Confirmar puntuació </button>
							</form>
					
					</div>
					</div>';
	
	
					
	
	}
	
?>	
				
        </div>
    </div>
</div>
<div class="d-flex justify-content-center"><span class='badge  btn-rodo badge-secondary'>No hi ha més fotos</span></div><br>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>
					
<?php
						}
						
				}else{
					print "<script>window.location='../home/';</script>";
				}
	 