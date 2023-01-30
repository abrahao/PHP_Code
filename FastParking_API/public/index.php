<?php

require_once("../vendor/autoload.php");
header("Context-type: application/json");
new App\Core\Router();
