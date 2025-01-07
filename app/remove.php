<?php

if(isset($_POST['title'])){
    require '../db_conn.php';

    $id = $_POST['id'];

    if(empty($title)){
        echo 0;
    }else{
        $now = date("Y-m-d h:i:sa");
        $stmt = $conn->prepare("DELETE FROM todos WHERE id=?");
        $res = $stmt->execute([$id]);

        if($res){
            echo 1;
        }else{
            echo 0;
        }
        exit();
    }
}
else{
    header("Location: ../index.php?mess=error");

}

?>