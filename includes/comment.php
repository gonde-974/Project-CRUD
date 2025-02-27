<?php 

     if($_SERVER["REQUEST_METHOD"]=="POST"){
        $user_id = $_POST['id'];
        $comment_text = $_POST['comment_text'];


        try{
            require_once "./db.php";
            $stmt = $pdo->prepare('SELECT user_name FROM users WHERE id=:user_id');
            $stmt-> bindParam(":user_id",$user_id);
            $stmt->execute();

            $user=$stmt->fetch();

            if($user){
                $user_name = $user['user_name'];
                $insertQuery = "INSERT INTO comments(username,comment_text,user_id)VALUES(:username, :comment_text, :user_id)";

                $insertStmt = $pdo->prepare($insertQuery);
                $insertStmt->bindParam(":username",$user_name);
                $insertStmt->bindParam(":comment_text",$comment_text);
                $insertStmt->bindParam(":user_id",$user_id);

                $insertStmt->execute();
                
                header("Location: ../home.php");

            }else{
                die('user not faund');
            }
            $pdo = null;
            $stmt = null;
        }catch(PDOException $e){
            die("eror".$e->getMessage());
        }

     }
?>