<?php
session_start();
uses('db');
uses('db_config');
$DbConfig = new DbConfig();
$Db = new Db($DbConfig->db_config);
$Db->connect();

$url = explode('/', $_GET['url']);
if (empty($url[0])) {
    $url[0] = 'patients';
}
if (empty($url[1])) {
    $url[1] = 'index';
}

$controller = $model = array_shift($url);
$action = array_shift($url);
$controllerName = ucfirst($controller) . 'Controller';
$modelName = ucfirst($model) . 'Model';

uses('model');
uses('controller');
uses('view');

if (!file_exists(CORE_LIB_PATH . 'controllers/' . $controller . '.php')) {
    trigger_error('Missing Controller file for <em>' . $controllerName . '</em>', E_USER_ERROR);
} else {
    uses('controllers/' . $controller);
}
if (!file_exists(CORE_LIB_PATH . 'models/' . $model . '.php')) {
    trigger_error('Missing Model file for <em>' . $modelName . '</em>', E_USER_ERROR);
} else {
    uses('models/' . $model);
}

$currentController = new $controllerName();
$currentModel = new $modelName();
$currentController->{ucfirst($model)} = $currentModel;

if (!empty($_POST)) {
    $currentController->data = $_POST['data'];
}

$content_for_layout = $currentController->renderAction($action, $url);

if (false === $output) {
    trigger_error('Missing Action: <strong>' . $action . '</strong> in <em>' . $controllerName . '</em>', E_USER_WARNING);
}

$output = $currentController->renderLayout($content_for_layout);

echo $output;
?>
