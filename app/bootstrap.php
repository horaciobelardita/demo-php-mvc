<?php

// cargar configuracion
require_once 'config/config.php';

// require_once 'libraries/Core.php';
// require_once 'libraries/Controller.php';
// require_once 'libraries/Database.php';

// autocargar librerias 
spl_autoload_register(function ($className) {
  require_once 'libraries/' . $className . '.php';
});
