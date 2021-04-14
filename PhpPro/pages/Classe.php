<?php
$connect =  mysqli_connect("localhost", "root","","gestioncf");
$query="select * from classe order by id desc";
$result=  mysqli_query($connect, $query);
if(session_status() != PHP_SESSION_ACTIVE) {
    session_start();
    }
  if(isset($_SESSION['employe'])){

 ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"/>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap.min.js"></script>
<script src="script/table.js" type="text/javascript"></script>
<div class="container-fluid">
    <div class="card bg-white" >
        <div class="card-header  card-color" style="background-color: #004085">
            <p class="h2 text-center text-uppercase font-weight-bold pt-2">Gestion des classes</p>
        </div>
        <div class="card-body container-fluid" >
            <div class="row">
                <div class="col-sm-6 mb-4">
                    <label for="filiere">Filiere : </label>
                    <select id="filiere" class="custom-select" ></select>
                </div>
                <div class="col-sm-6 mb-2">
                    <label for="code">Code : </label>
                    <input class="form-control" type="text" id="code" required>
                </div>
                <div class="col-sm-6 mb-2">
                    <label for="nom">Nom : </label>
                    <input class="form-control" type="text" id="nom" required>
                </div>
            </div>
            
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-outline-success mt-3 mb-3" id="btn">Ajouter</button>
                </div>
            </div>
            <div class="row table-responsive m-auto rounded">
                <table id="tab" class="table table-hover">
                    <thead>
                        <tr class="text-uppercase bg-light">
                            <th scope="col">Id</th>
                            <th scope="col">Code</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Filiere</th>
                            <th scope="col">Supprimer</th>
                            <th scope="col">Modifier</th>
                        </tr>
                    </thead>
                    <tbody id="table-content">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="script/Classe.js" type="text/javascript"></script>
<?php

}else{
  header("Location: ../index.php");
}
 ?>
