<?php
session_start();
uses('db');
uses('db_config');
$DbConfig = new DbConfig();
$Db = new Db($DbConfig->db_config);
$Db->connect();

$url = $_GET;
if (empty($url['controller'])) {
    $url['controller'] = 'patients';
}
if (empty($url['action'])) {
    $url['action'] = 'index';
}

$controller = $model = $url['controller'];
$action = $url['action'];
unset($url['action'], $url['controller']);
$controllerName = ucfirst($controller) . 'Controller';
$modelName = ucfirst($model) . 'Model';

uses('model');
uses('controller');
uses('view');
uses('views/helpers/helper');

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

if (false === $content_for_layout) {
    trigger_error('Missing Action: <strong>' . $action . '</strong> in <em>' . $controllerName . '</em>', E_USER_WARNING);
}

$output = $currentController->renderLayout($content_for_layout);

echo $output;
?>
