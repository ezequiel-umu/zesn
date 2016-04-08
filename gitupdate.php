<?php
// Use in the "Post-Receive URLs" section of your GitHub repo.
if ( $_POST['payload'] ) {
  $json = json_decode($_POST['payload']);
  $remote_secret = $json->{"hook"}->{"secret"};
  if ($remote_secret === file_get_contents(".github.webhook.secret.key")) {
    shell_exec( 'cd '. getcwd() . ' && githook-push.sh' );
  }
  else
    echo 'Wrong secret';
}
?>
