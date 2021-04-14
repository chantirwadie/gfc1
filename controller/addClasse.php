<?php

include_once '../racine.php';
include_once RACINE.'/service/ClasseService.php';
extract($_POST);
$ds = new ClasseService();
$r=TRUE;
if ($op != '') {
    if ($op == 'add') {
        $ds->create(new Classe(0, $classe, $filiere));
    } elseif ($op == 'update') {
        $ds->update(new Classe($id, $classe, $filiere));
    } elseif ($op == 'delete') {
        $ds->delete($id);
    }elseif($op == 'countclasse'){
        echo json_encode($ds->countByClasse()) ;
        $r=FALSE;
    } elseif ($op == 'find') {
        echo json_encode($ds->findById($id));
        $r=FALSE;
    }elseif ($op == 'findclasses') {
        echo json_encode($ds->findClasses($filiere));
        $r=FALSE;
    }
}
if ($r){
    echo json_encode($ds->findAllajax());}
    header('Content-type: application/json');
