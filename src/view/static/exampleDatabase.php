<?php

$usuariosDAO = new ExampleTable();

// inserte
$fields = "nome,login,senha";
$params = array("Georgia","login4","senha4");
$rs = $usuariosDAO->insert($fields,$params);
var_dump($rs);

// select
$arr = $usuariosDAO->load();

foreach ($arr as $key => $row) {
    echo $row->getId() . " - " . $row->getName() . "<br>\n";
}

// update
$fields = array("name");
$params = array("teste name", "Georgia");
$where = "name = ?";
$rs = $usuariosDAO->update($fields, $params, $where);
var_dump($rs); /* Número de linhas afetadas */

// delete
$where = "id = ?";
$params = array(3);
$rs = $usuariosDAO->delete($where,$params);
var_dump($rs); /* Número de linhas afetadas */
