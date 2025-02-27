
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
   

    try {
        require_once "./db.php";
        $query = "UPDATE users SET first_name = :first_name, last_name = :last_name, user_name = :user_name, email = :email, password = :password WHERE id = 2";

        // Подготовка на извршувањето на запросот
        $stmt = $pdo->prepare($query);

        // Поврзување на параметрите со променливите
        $stmt->bindParam(":first_name", $first_name);
        $stmt->bindParam(":last_name", $last_name);
        $stmt->bindParam(":user_name", $user_name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        

        $stmt->execute();

        header("location: ../home.php?id=" . $id); // Пренасочување со ID
        $pdo = null;
        $stmt = null;
        die();

    } catch (PDOException $e) {
        die("Грешка при извршување на запросот: " . $e->getMessage());
    }
} else {
    header("location: ../index.php");
}
