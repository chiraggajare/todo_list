<?php

if(isset($_POST['title'])){
    require '../db_conn.php';

    $title = $_POST['title'];

    if(empty($title)){
        header("Location: ../index.php?mess=error");
    }else{
        $now = date("Y-m-d h:i:sa");
        $stmt = $conn->prepare("INSERT INTO todos(task, dueDate) VALUE(?,?)");
        $res = $stmt->execute([$title, $now]);

        if($res){
            header("Location: ../index.php?mess=success");
        }else{
            header("Location: ../index.php");
        }
        exit();

    }
}
else{
    header("Location: ../index.php?mess=error");

}




?>