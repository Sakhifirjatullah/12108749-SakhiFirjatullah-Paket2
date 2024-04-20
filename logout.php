<?php
session_start(); // memulai atau melanjutkan sesi yang ada pada server.
session_destroy(); 
header('location:login.php');
?>