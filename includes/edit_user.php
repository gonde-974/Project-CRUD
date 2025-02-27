<?php 

session_start(); // Започнете сесија

require_once "./db.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $query = "UPDATE users SET first_name = :first_name,
                                  last_name = :last_name,
                                  user_name = :user_name,
                                  email = :email,
                                  password = :password
                  WHERE id = :id";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":first_name", $first_name);
        $stmt->bindParam(":last_name", $last_name);
        $stmt->bindParam(":user_name", $user_name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);

        $stmt->execute();

        // Поставување сесија само ако успешно се изврши ажурирањето
        $_SESSION['success_message'] = "Корисникот беше успешно обновен!";
        
        // Пренасочување кон home.php по успешното ажурирање
        header("Location: ../home.php");
        exit; // Потребен е exit за да се осигури дека пренасочувањето е извршено

    } catch(PDOException $e) {
        // Поставување сесија за неуспешен update
        $_SESSION['error_message'] = "Грешка при ажурирањето на корисникот: " . $e->getMessage();
        header("Location: ../home.php");
        exit;
    }

} else {
    // Ако не е POST метод, пренасочете назад кон home.php
    header("Location: ../home.php");
    exit;
}

?>
