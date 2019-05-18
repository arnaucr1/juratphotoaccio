<meta charset="UTF-8">
  						<title>PhotoAcció</title>
						  <meta charset="UTF-8">
						  <meta name="viewport" content="width=device-width, initial-scale=1">
  						<link rel="icon" type="image/png" href="../imagenes/blue-camera.png"/>
						  <link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
<link rel="stylesheet" href="css/style.css">
    					  <link rel="stylesheet" href="css/style.css">
						<nav class="navbar navbar-expand-lg  dark-nav">
			<a class="navbar-brand text-black googlesans" >
			🏆 Classificacions  </a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							
						</li>
						
					</ul>
					<a href="../home/"  class="btn btn-primary btn-rodo"><i class="fas fa-home"></i> Tornar a inici </a>	
				</div>
			</nav>
			<div class="tot">
			<div class="container" style=" text-align:center; height:600px; ">
					
<?php
include "../php/bbdd.php";
session_start();
 if(!empty($_SESSION)){
	 if(isset($_SESSION["email"])){	
		
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
						}
					?> <h1 class='googlesans'> <?php echo utf8_encode($concurs); ?></h1>
<div class="container">
	    <div id="gallery row clearfix">
												 

				<div class="gallery-item"><img src="http://placehold.it/300x200.png&text=image+1" alt="gallery image one" title="Gallery Image One"/></div>
				<div class="gallery-item"><img src="http://placehold.it/400x300.png&text=image+2" alt="gallery image two" /></div>
				<div class="gallery-item"><img src="http://placehold.it/300x150.png&text=image+3" alt="gallery image three" /></div>
				<div class="gallery-item"><img src="http://placehold.it/300x600.png&text=image+4" alt="gallery image four" /></div>
				<div class="gallery-item"><img src="http://placehold.it/250x250.png&text=image+5" alt="gallery image five" /></div>
				<div class="gallery-item"><img src="http://placehold.it/200x200.png&text=image+6" alt="gallery image six" /></div>
				<div class="gallery-item"><img src="http://placehold.it/300.png&text=image+7" alt="gallery image seven" /></div>
				<div class="gallery-item"><img src="http://placehold.it/300.png&text=image+8" alt="gallery image eight" /></div>
				<div class="gallery-item"><img src="http://placehold.it/300.png&text=image+9" alt="gallery image nine" /></div>
				<div class="gallery-item"><img src="http://placehold.it/300.png&text=image+10" alt="gallery image ten" /></div>
				<div class="gallery-item"><img src="http://placehold.it/300.png&text=image+11" alt="gallery image eleven" /></div>
				<div class="gallery-item"><img src="http://placehold.it/300.png&text=image+12" alt="gallery image twelve" /></div>
				<div class="gallery-item"><img src="http://placehold.it/300.png&text=image+13" alt="gallery image thirteen" /></div>
				<div class="gallery-item"><img src="http://placehold.it/300.png&text=image+14" alt="gallery image fourteen" /></div>
				<div class="gallery-item"><img src="http://placehold.it/300.png&text=image+15" alt="gallery image fifteen" /></div>
				<div class="gallery-item"><img src="http://placehold.it/300.png&text=image+16" alt="gallery image sixteen" /></div>
				<div class="gallery-item"><img src="http://placehold.it/300.png&text=image+17" alt="gallery image seventeen" /></div>
				<div class="gallery-item"><img src="http://placehold.it/300.png&text=image+18" alt="gallery image eighteen" /></div>
				<div class="gallery-item"><img src="http://placehold.it/300.png&text=image+19" alt="gallery image nineteen" /></div>
				<div class="gallery-item"><img src="http://placehold.it/300.png&text=image+20" alt="gallery image twenty" /></div>

			</div><!-- /.gllery -->
		</div><!-- /.container -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Image from Gallery.</h4>
          <br/>
          <nav></nav>
	      </div>
	      <div class="modal-body clearfix">
           <h4 class='modal-image-caption'></h4>
	        <img id="modal-image" class="img-responsive" src=""><br/>
      	</div>
		  <script  src="js/index.js"></script>
	    </div><!-- /.modal-content -->
  	</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->  
  </body>
</html>

					<script  src="js/index.js"></script>
					
					<?php
						}
						
				}else{
					print "<script>window.location='../home/';</script>";
				}
	 
			