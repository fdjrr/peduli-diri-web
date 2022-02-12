<?php 

$_SESSION["loggined"] = [];
session_destroy();
unset($_SESSION["loggined"]);
echo "<script>window.location.replace('" . BASE_URL . "');</script>";