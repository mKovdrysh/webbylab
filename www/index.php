<?php

define('BP', __DIR__ . DIRECTORY_SEPARATOR);
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'vendor/autoload.php';

$page = !empty($_GET['page']) ? $_GET['page'] : null;

switch ($page) {
    case 'add':
        $controller = new \Masha\Controller\MovieController();
        $controller->addAction();
        break;
    case 'add-movie':
        $controller = new \Masha\Controller\MovieController();
        $controller->addMovieAction();
        break;
    case 'delete-movie':
        $controller = new \Masha\Controller\MovieController();
        $controller->deleteMovieAction();
        break;
    case 'import-data':
        $controller = new \Masha\Controller\MovieController();
        $controller->importMovieAction();
        break;
    case 'process-import':
        $controller = new \Masha\Controller\MovieController();
        $controller->processAction();
        break;
    default:
        $controller = new \Masha\Controller\MovieController();
        $controller->indexAction();
        break;
}
