<?php
error_reporting(E_RECOVERABLE_ERROR); // Sensitive
error_reporting(32); // Sensitive

ini_set('docref_root', '1'); // Sensitive
ini_set('display_errors', '1'); // Sensitive
ini_set('display_startup_errors', '1'); // Sensitive
ini_set('error_log', "path/to/logfile"); // Sensitive - check logfile is secure
ini_set('error_reporting', E_PARSE ); // Sensitive
ini_set('error_reporting', 64); // Sensitive
ini_set('log_errors', '0'); // Sensitive
ini_set('log_errors_max_length', '512'); // Sensitive
ini_set('ignore_repeated_errors', '1'); // Sensitive
ini_set('ignore_repeated_source', '1'); // Sensitive
ini_set('track_errors', '0'); // Sensitive

ini_alter('docref_root', '1'); // Sensitive
ini_alter('display_errors', '1'); // Sensitive
ini_alter('display_startup_errors', '1'); // Sensitive
ini_alter('error_log', "path/to/logfile"); // Sensitive - check logfile is secure
ini_alter('error_reporting', E_PARSE ); // Sensitive
ini_alter('error_reporting', 64); // Sensitive
ini_alter('log_errors', '0'); // Sensitive
ini_alter('log_errors_max_length', '512'); // Sensitive
ini_alter('ignore_repeated_errors', '1'); // Sensitive
ini_alter('ignore_repeated_source', '1'); // Sensitive
ini_alter('track_errors', '0'); // Sensitive
$params = session_get_cookie_params();
setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]); //Invalids session's cookie.
session_destroy();

header("Location: index.php");

?>