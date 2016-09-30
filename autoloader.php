<?php
namespace Autoloader;
set_include_path(__DIR__ . DIRECTORY_SEPARATOR . 'classes' . PATH_SEPARATOR . get_include_path());
spl_autoload_register('spl_autoload');

