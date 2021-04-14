<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once '../racine.php';
    include_once RACINE . '/service/FiliereService.php';
    loadAll();
}

function loadAll() {
    $es = new FiliereService();
    header('Content-type: application/json');
    echo json_encode(array("etudiants" => $es->getAll()));
}
