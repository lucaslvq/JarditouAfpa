<?php

session_start();
unset($_SESSION);
unset($_COOKIE);
session_destroy();
header ('Location: ../views/index.php');

?>