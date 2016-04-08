<?php
ini_set("log_errors", 1);
ini_set("error_log", "php-error.log");

// Use in the "Post-Receive URLs" section of your GitHub repo.
shell_exec( 'cd '. getcwd() . ' && ./githook-push.sh' );
?>
