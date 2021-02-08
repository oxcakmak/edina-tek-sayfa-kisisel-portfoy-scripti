<?php
require_once('config.php');
session_destroy();
$oxcakmak->redirect("login");
?>