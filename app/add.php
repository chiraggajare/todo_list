<?php

if(isset($_POST['title'])){
    require '../db_conn.php';

    $title = $_POST['title'];
}