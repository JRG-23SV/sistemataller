<?php

include('../../config.php');

session_start();
if(isset($_SESSION['sesion username'])){
    session_destroy();
    header('Location: '.$URL.'/');
}

?>