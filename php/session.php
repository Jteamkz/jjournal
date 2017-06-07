<?php 
session_start();

if (isset($_SESSION['studycenter'])) {
    $studycenter = $_SESSION['studycenter'];
} else {
    exit('Error');
}
?>