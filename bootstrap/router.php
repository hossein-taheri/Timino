<?php
use Pecee\SimpleRouter\SimpleRouter;

require_once "controllers/AuthController.php";

SimpleRouter::setDefaultNamespace('Controllers');

require_once 'routes/index.php';

SimpleRouter::start();
