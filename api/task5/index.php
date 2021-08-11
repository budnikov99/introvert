<?php
//require_once(__DIR__ . '/../autoload.php');
require_once(__DIR__ . '/../../helpers.php');

$uri = explode("/",explode("?",$_SERVER['REQUEST_URI'])[0]);
$param = $uri[count($uri)-1];

if($_SERVER['REQUEST_METHOD'] == 'POST' && in_array($param, ['form1','form2'])){
    $pipelineId = '3144';
    $statusId = '20715778';
    if($param == 'form2'){
        $pipelineId = '1601560';
        $statusId = '24374821';
    }


}