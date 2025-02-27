<?php
 require_once "./db.php"; // Вклучување на датотеката за поврзување со базата на податоци

 if(isset($_GET['id'])){
    $id=$_GET['id'];
 }

 try{
    $query = "DELETE FROM users WHERE id=:id";
    $stmt=$pdo->prepare($query);
    $stmt->bindParam("id",$id);
    $stmt->execute();

    header("Location: ../home.php");
    exit;
 }catch(PDOException $e){
    die("greska".$e->getMessage());
 }

// // Проверете дали има POST барање со ID за бришење
// if ($_SERVER['REQUEST_METHOD']=='POST'){
//     $id = $_POST['id'];

//     try {
//         // SQL прашање за бришење на корисникот
//         $query = "DELETE FROM users WHERE id = :id";
//         $stmt = $pdo->prepare($query);

//         // Приврзување на ID параметарот
//         $stmt->bindParam(":id", $id);

//         // Извршување на прашањето
//         $stmt->execute();
       
//         // Вратете успех
//         echo "success";
//     } catch (PDOException $e) {
//         // Ако се случи грешка
//         echo "error";
//     }
// } else {
//     // Ако нема ID за бришење
//     echo "error";
// }


?>
