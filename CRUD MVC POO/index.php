<?php 

require_once('./controllers/clientsController.php');

$action = !empty($_GET['action']) ? $_GET['action'] : 'getAll';

$controller = new ClienteController();
$controller->$action();