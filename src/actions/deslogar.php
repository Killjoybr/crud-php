<?php
    session_start();
    session_destroy();
    header('location: /projects/crud-php/index.php');
?>