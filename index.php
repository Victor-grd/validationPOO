<?php
require_once('./controllers/Views.php');
$view = new View();
$view -> contentFiles($_SERVER['REQUEST_URI'],"arsort");