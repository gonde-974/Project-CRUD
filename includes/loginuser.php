<?php 
require_once "./db.php";
   


session_start(); // Започнување на сесијата

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Се земаат податоците за најава од формата.
    $email = $_POST['login_email'];
    $password = $_POST['login_password'];

    // SQL прашање за проверка на податоците за најава во базата.
    $sql = "SELECT * FROM users WHERE email = ? AND password = ?";

    // Подготвување на SQL прашањето за безбедна обработка на податоците.
    $query = $pdo->prepare($sql);

    // Извршување на прашањето со внесените податоци за најава.
    $query->execute([$email, $password]);

    // Преземање на податоците за корисникот ако прашањето врати резултат.
    $loggedUser = $query->fetch(PDO::FETCH_OBJ);

    // Проверка дали корисникот постои во базата.
    if ($loggedUser) {
        // Ако корисникот постои, податоците се зачувуваат во сесија.
        $_SESSION['loggedUser'] = $loggedUser;
        // Пренасочување на корисникот на друга страница по успешна најава
        header("Location: ../home.php");
        exit();
    } else {
        // Прикажување порака за грешка ако податоците не се точни
       echo ('Погресен емајл или пасворд - Обидетесе повторно');
       header("Location: ../index.php");
    }
}
?>


   
