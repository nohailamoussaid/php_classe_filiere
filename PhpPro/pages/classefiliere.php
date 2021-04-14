<?php
if(session_status() != PHP_SESSION_ACTIVE) {
    session_start();
    }
  try
{
	$bdd = new PDO('mysql:host=localhost;dbname=gestioncf;charset=utf8', 'root', '');
        
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

  if(isset($_SESSION['employe'])){

 ?>
<form >
<div class="container-fluid">
    <div class="card bg-white"  >
        <div class="card-header card-color" style="background-color: #004085">
            <p class="h2 text-center text-uppercase font-weight-bold pt-2">Affichage des classes de filieres</p>
        </div>
        <div class="card-body container-fluid" >
            <div class="row">
                <div class="col-sm-6 mb-4">
                    <label for="filiere">Filiere : </label>
                    <select id="filiere" class="custom-select" ></select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-outline-success mt-3 mb-3" id="btn">Chercher</button>
                </div>
            </div>
            <div class="row table-responsive m-auto rounded">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-uppercase bg-light">
                            <th scope="col">Id</th>
                            <th scope="col">Code</th>
                            <th scope="col">nom</th>
                            <th scope="col">id_fil</th>
                        </tr>
                    </thead>
                    
                    <tbody id="table-content">
                        

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</form>
<script src="script/liste.js" type="text/javascript"></script>
<?php

}else{
  header("Location: ../index.php");
}
 ?>
