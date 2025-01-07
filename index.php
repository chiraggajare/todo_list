<?php
require 'db_conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickDo</title>
    <link rel="stylesheet" href="./styles/homestyle.css">
</head>

<body>
    <div class="main-section">
        <div class="add-section">
            <form action="app/add.php" method="POST" autocomplete="off">
                <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error') { ?>
                    <input type="text" name="title" placeholder="This field is required">
                    <button type="submit">ADD</button>
                <?php } else{ ?>
                    <input type="text" name="title" placeholder="What do you need to do?">
                    <button type="submit">ADD</button>
                <?php } ?>
            </form>
        </div>

        <?php
        $todos = $conn->query("SELECT * FROM todos ORDER BY id DESC")
        ?>

        <?php if($todos->rowCount() <= 0) { ?>

            <div class="show-todo-section">
                <div class="todo-item">
                    <div class="empty">
                        <h2>Hey there! Add some tasks to get started!</h2>
                        <div class="gif">...</div>
                    </div>
                </div>
            </div>

        <?php } ?>

        <?php while ($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="show-todo-section">
                <div class="todo-item">
                    <span id="<?php echo $todo['id']; ?>" class="remove-to-do">x</span>

                    <?php if ($todo['checked']) { ?>
                        <input type="checkbox" class="check-box" checked />
                        <h2 class="checked"><?php echo $todo['task'] ?></h2>

                    <?php } else { ?>
                        <input type="checkbox" class="check-box" />
                        <h2><?php echo $todo['task'] ?></h2>

                    <?php } ?>

                    <br>
                    <small>Created on: <?php echo $todo['createdOn'] ?></small>
                </div>
            </div>
        <?php } ?>
    </div>

    <script src='js/jquery-3.2.1.min.js'></script>
    <script>
        $(document).ready(function(){
            $('.remove-to-do').click(function(){
                const id=$(this).attr('id');
                $.post("app/remove.php",
                    {
                        id: id
                    },
                    (data)=>{
                        if(data){
                            $(this).parent().hide(300);
                        }
                    }
                );
            });
        });
    </script>
</body>

</html>