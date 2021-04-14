<?php

include_once '../racine.php';
include_once RACINE.'/service/FiliereService.php';
extract($_POST);
$ds = new FiliereService();

if ($op != '') {
    if ($op == 'add') {
        $ds->create(new Filiere(0, $code, $libelle));
    } elseif ($op == 'update') {
        $ds->update(new Filiere($id, $code, $libelle));
    } elseif ($op == 'delete') {
        $ds->delete($id);
    }
}

header('Content-type: application/json');
echo json_encode($ds->findAllajax());
