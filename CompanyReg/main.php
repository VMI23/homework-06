<?php
declare(strict_types=1);


use CompanyReg\Application;
use GuzzleHttp\Client;


require_once "vendor/autoload.php";


$app = new Application();
$app->run();