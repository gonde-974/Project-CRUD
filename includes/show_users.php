<?php
// Податоци за поврзување со базата на податоци


// try {
//     require_once "db.php";
//     // SQL упит
//     $sql = "SELECT id, first_name, last_name, user_name, email, password, created_at FROM users";
//     $stmt = $pdo->prepare($sql);
//     $stmt->execute();

//     // Проверка на резултати и прикажување во табела
//     if ($stmt->rowCount() > 0) {
//         echo "<table border='1' class=' table hidden';>
//                 <tr>
//                     <th>ID</th>
//                     <th>Име</th>
//                     <th>Презиме</th>
//                     <th>Корисничко име</th>
//                     <th>Email</th>
//                     <th>Лозинка</th>
//                     <th>Датум на создавање</th>
//                 </tr>";
        
//         // Прикажување на податоците
//         while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//             echo "<tr>
//                     <td>{$row['id']}</td>
//                     <td>{$row['first_name']}</td>
//                     <td>{$row['last_name']}</td>
//                     <td>{$row['user_name']}</td>
//                     <td>{$row['email']}</td>
//                     <td>{$row['password']}</td>
//                     <td>{$row['created_at']}</td>
//                   </tr>";
//         }
//         echo "</table>";
//     } else {
//         echo "Нема записи";
//     }
// } catch (PDOException $e) {
//     echo "Грешка: " . $e->getMessage();
// }
// // Затворање на врската
// $pdo = null;


?>
