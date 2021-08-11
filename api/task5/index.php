<?php
//require_once(__DIR__ . '/../autoload.php');
require_once(__DIR__ . '/../../helpers.php');

//Код для определения последней части url, чтобы распределить заявки от разных форм
//Так в ядро не будет попадать лишнего мусора вроде form_id
$uri = explode("/",explode("?",$_SERVER['REQUEST_URI'])[0]);
$param = $uri[count($uri)-1];

if($_SERVER['REQUEST_METHOD'] == 'POST' && in_array($param, ['form1','form2'])){
    $statusId = '20715778';
    $group = 'bbb@bb.ru;newcontainergarbage@gmail.com;dmitry.pohmelnov@mail.ru';
    if($param == 'form2'){
        $statusId = '24374821';
        $group = 'semin_work@mail.ru;olgamooha2212@mail.com;group13@mail.ru';
    }

    $_POST['status_id'] = $statusId;
    $_POST['intr_group'] = $group;

    require(__DIR__ . '/../../introvert_save.php');
}

//var_dump($_POST);
header('Location: /task5.html');