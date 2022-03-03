<?php
use Pecee\Http\Request;
use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace('Controllers');

require 'routes/index.php';

// TODO : add NotFound and ErrorHandler

SimpleRouter::start();
