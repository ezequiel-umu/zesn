<?php
ini_set("log_errors", 1);
ini_set("error_log", "php-error.log");

// Use in the "Post-Receive URLs" section of your GitHub repo.
$request_body = file_get_contents('php://input');
if ( $request_body ) {
  $json = json_decode($request_body);
  $remote_secret = $json->{"hook"}->{"secret"};
  if ($remote_secret === file_get_contents(".github.webhook.secret.key")) {
    shell_exec( 'cd '. getcwd() . ' && githook-push.sh' );
  }
  else
    echo 'Wrong secret';
}
?>
