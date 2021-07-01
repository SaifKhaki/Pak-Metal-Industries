<?php
Session_start();
Session_destroy();
header('Location: ../HomePage.php');
?>