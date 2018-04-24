<?php

session_start();

session_destroy();

header('Location: ../index.php'); // redirects back to the top level - index.php 

?>