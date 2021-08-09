<?php

function error($code = 500, $message = "Внутренняя ошибка сервера.") {
    http_response_code($code);
    respond($message);
}

function respond($text) {
    echo($text);
    exit();
}

function respondJson($data) {
    header('Content-Type: application/json');
    respond(json_encode($data));
}

function errorJson($code, $data) {
    header('Content-Type: application/json');
    error($code, json_encode($data));
}
