<?php 

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        try{

            require_once "./db.php";

            $query = "DELETE FROM users WHERE user_name= :user_name AND password = :password";

            $stmt = $pdo->prepare($query);

            $stmt->bindParam(":user_name",$user_name);
            $stmt->bindParam(":password",$password);

            $stmt->execute();

            header("location: ../home.php");

            $pdo = null;
            $stmt = null;

        }catch(PDOException $e){
                die("Query failed".$e->getMessage());
        }

    }else{
        header("location: ../index.php");
    }

    