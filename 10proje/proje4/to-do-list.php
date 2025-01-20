<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yapılacaklar Listem</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #6c5ce7;
        }
        form {
            display: flex;
            margin-bottom: 20px;
        }
        input[type="text"] {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px 0 0 5px;
        }
        button[type="submit"] {
            background-color: #6c5ce7;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background-color: #f9f9f9;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .task-text {
            flex: 1;
            margin-right: 10px;
            color: #6c5ce7;
            font-weight: bold;
        }
        .delete-btn, .update-btn {
            background-color: #6c5ce7;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .update-btn {
            background-color: #fdcb6e;
            margin-left: 10px;
        }
        .delete-btn:hover, .update-btn:hover {
            background-color: #4834d4;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Yapılacaklar</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type="text" name="task" placeholder="Yapılacak işler var..." required>
            <button type="submit">Ekle</button>
        </form>
        <ul>
            <?php
            $todo_file = "todo.txt";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["task"]) && !empty($_POST["task"])) {
                    $task = trim($_POST["task"]);
                    $handle = fopen($todo_file, "a");
                    fwrite($handle, $task . PHP_EOL);
                    fclose($handle);
                    header("Location: " . $_SERVER['PHP_SELF']);
                }
            }
            if (file_exists($todo_file)) {
                $tasks = file($todo_file, FILE_IGNORE_NEW_LINES);
                foreach ($tasks as $index => $task) {
                    echo "<li>
                            <span class='task-text'>$task</span>
                            <form method='post' action='".htmlspecialchars($_SERVER["PHP_SELF"])."'>
                                <input type='hidden' name='task_index' value='$index'>
                                <button type='submit' class='delete-btn' name='delete_task'>Sil</button>
                            </form>
                            <form method='post' action='".htmlspecialchars($_SERVER["PHP_SELF"])."'>
                                <input type='hidden' name='task_index' value='$index'>
                                <input type='text' name='updated_task' placeholder='Güncelleniyor...' required>
                                <button type='submit' class='update-btn' name='update_task'>Güncelle</button>
                            </form>
                          </li>";
                }
            }

            if (isset($_POST['delete_task'])) {
                $task_index = $_POST['task_index'];
                $tasks = file($todo_file, FILE_IGNORE_NEW_LINES);
                unset($tasks[$task_index]);
                file_put_contents($todo_file, implode("\n", $tasks));
                header("Location: " . $_SERVER['PHP_SELF']);
            }

            if (isset($_POST['update_task'])) {
                $task_index = $_POST['task_index'];
                $updated_task = $_POST['updated_task'];
                $tasks = file($todo_file, FILE_IGNORE_NEW_LINES);
                $tasks[$task_index] = $updated_task;
                file_put_contents($todo_file, implode("\n", $tasks));
                header("Location: " . $_SERVER['PHP_SELF']);
            }
            ?>
        </ul>
    </div>
</body>
</html>
