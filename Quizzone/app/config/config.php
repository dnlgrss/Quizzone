<?php ini_set('display_errors', 1);

// DB Params
define('DB_HOST', '');
define('DB_PSW', '');
define('DB_NAME', '');
define('DB_USER', '');

// App Root
define(
    // dirname return directory parents, we are in config.php, back twice we get app root
    'APPROOT', dirname(dirname(__FILE__))
);
// URL Root
define(
    'URLROOT', 'http://localhost:8888/MVC-dnlgrs'
);
// Site Name
define(
    'SITENAME', 'MVC dnlgrs'
);

?>
