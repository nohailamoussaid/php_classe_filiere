<?php

chdir('..');
include_once 'services/ClasseService.php';
extract($_POST);

$ps = new ClasseService();
$r = true;

if ($op != '') {
    if ($op == 'add') {
        $ps->create(new Classe(0, $code, $nom, $id_fil));
    } elseif ($op == 'update') {
        $ps->update(new Classe($id, $code, $nom, $id_fil));
    } elseif ($op == 'delete') {
        $ps->delete($ps->delete($id));
    }
    elseif ($op == 'select') {
         header('Content-type: application/json');
         echo json_encode($ps->select($id_fil));
          $r = false;
    }
    elseif ($op == 'countfiliere') {
         header('Content-type: application/json');
         echo json_encode($ps->countbyfiliere());
          $r = false;
    }
    elseif ($op == 'find') {
        header('Content-type: application/json');
        echo json_encode($ps->findById($id));
        $r = false;
    }
    
}
if ($r == true){
    header('Content-type: application/json');
    echo json_encode($ps->findAll());
}