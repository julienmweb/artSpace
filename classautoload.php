<?php

function autoload($class)
{

    $path = str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php';

    require_once($path);

}
spl_autoload_register('autoload');