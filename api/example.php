<?php
include_once('../config.system.php');
include_once(MODEL_PATH . 'example.model.php');
include_once(LIB_PATH . 'response-request.php');

// Get method
$method = $_SERVER['REQUEST_METHOD'];


if ($method == 'POST') {
  $body = json_decode(file_get_contents('php://input'));
  responseRequest(200, "example post", true, $body);
}

if ($method == 'GET') {
  if (!isAuthenticated()) {
    responseRequest(403, 'Necesitas iniciar sesión', true);
  }
  echo 'Get working';
  die();
}

if ($method == 'PUT') {
  if (!isAuthenticated()) {
    responseRequest(403, 'Necesitas iniciar sesión', true);
  }

  $body = json_decode(file_get_contents('php://input'));
  responseRequest(200, "example put", true, $body);
}


if ($method == 'DELETE') {
  if (!isAuthenticated()) {
    responseRequest(403, 'Necesitas iniciar sesión', true);
  }

  if (!isAdmin()) {
    responseRequest(403, 'No tienes permisos', true);
  }
  responseRequest(200, 'Example deleted', true);
}


responseRequest(200, 'Método de HTTP no permitido');
