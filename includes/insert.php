<?php 

// Проверуваме дали методот на барање е POST
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Земање на податоците од формата
    $first_name = $_POST['first_name']; // Име
    $last_name = $_POST['last_name']; // Презиме
    $user_name = $_POST['user_name']; // Корисничко име
    $email = $_POST['email']; // Е-пошта
    $password = $_POST['password']; // Лозинка
    // Хеширање на лозинката за безбедност
    //$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
        // Вклучување на датотеката за поврзување со базата на податоци
        require_once "./db.php";
        
        // Подготовка на SQL запросот за внесување на корисник
        $query = "INSERT INTO users (first_name, last_name, user_name, email, password)
                  VALUES (:first_name, :last_name, :user_name, :email, :password)";

        // Подготовка на извршувањето на запросот
        $stmt = $pdo->prepare($query);
        
        // Поврзување на параметрите со променливите
        $stmt->bindParam(":first_name", $first_name);
        $stmt->bindParam(":last_name", $last_name);
        $stmt->bindParam(":user_name", $user_name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);

        // Извршување на запросот
        $stmt->execute();
        header("location: ../forms/login_user.php");
        // Чистење на објектите
        $pdo = null;
        $stmt = null;
        
        // Затворање на скриптата
        die();
    } catch(PDOException $e) {
        // Прикажување на пораката за грешка ако запросот не успее
        die("QUERY FAILED" . $e->getMessage());
    }
} else {
    // Пренасочување на корисникот ако методот не е POST
    header("location: ../index.php");
}
