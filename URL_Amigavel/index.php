<?php

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


switch ($url) {
    case '/':
        echo 'Inicio';
    break;

    case '/sobre':
        require_once 'pages/sobre.php';
    break;

    // Caso a URL pesquisada não for encontrada apresente a pagina 4040
    default:
        echo '404';
}
