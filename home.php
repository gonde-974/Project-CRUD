<?php 

require_once "includes/db.php"; // Вклучување на датотеката за поврзување со базата на податоци

$query = "SELECT id, first_name, last_name, user_name, email, password FROM users"; // SQL прашање за селектирање на податоци од табелата 'users'
$stmt = $pdo->query($query); // Извршување на прашањето и зачувување на резултатот во $stmt

$rows = $stmt->fetchAll(); // Земаме ги сите редови од резултатот и ги ставаме во $rows
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Кориснички Податоци</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container{
            width: 100%;
        }
        .table-container {
            
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-custom {
            margin: 5px;
            font-size: 0.9rem;
            font-weight: 600;
        }
        h1, h2 {
            color: #333333;
        }
        #userTable tr {
            display: table-row;
        }
        .edit-btn{
            width: 101px;
        }
    </style>
</head>
<body>
<?php 
             
             session_start(); // Започнете сесија
             
             // Проверете дали има порака за успех во сесијата
             if (isset($_SESSION['success_message'])) {
                 echo "<div class='alert alert-success'>" . $_SESSION['success_message'] . "</div>";
                 unset($_SESSION['success_message']); // Сегашната порака се брише по прикажувањето
             }
             
             // Проверете дали има порака за грешка во сесијата
             if (isset($_SESSION['error_message'])) {
                 echo "<div class='alert alert-danger'>" . $_SESSION['error_message'] . "</div>";
                 unset($_SESSION['error_message']); // Сегашната порака се брише по прикажувањето
             }
             ?>
    <a href="./index.php">Назат кон почетна</a>

    
    <div class="container mt-5">
        <h2 class="text-center my-4">Кориснички Податоци - CRUD Пример - HOME </h2>
        
        <!-- Поле за внесување на ID и копче за филтрирање -->
        <div class="d-flex justify-content-center mb-4">
            <input type="number" id="filter_id" class="form-control me-2" placeholder="Внеси ID на корисник" required>
            <button class="btn btn-primary" onclick="filterTable()">Прикажи корисник</button>
        </div>

        <div class="table-container">
            <div class="d-flex justify-content-end mb-3">
                <a href="./forms/insert_user.php" class="btn btn-outline-primary btn-custom">Внеси корисник</a> <!-- Линк до формите -->
            </div>
           
         
            
            <table class="table table-striped table-hover" id="userTable"> <!-- Модернизирана табела со Bootstrap класи -->
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Име</th>
                        <th>Презиме</th>
                        <th>Корисничко име</th>
                        <th>Е-маил</th>
                        <th>Лозинка</th>
                        <th>Акции</th> <!-- Колона за акциите (Edit/Delete) -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($rows as $row): ?> <!-- Проаѓање низ сите редови од базата на податоци -->
                    <tr data-id="<?php echo htmlspecialchars($row['id']); ?>">
                        <td><?php echo htmlspecialchars($row['id']) ?></td>
                        <td><?php echo htmlspecialchars($row['first_name']) ?></td>
                        <td><?php echo htmlspecialchars($row['last_name']) ?></td>
                        <td><?php echo htmlspecialchars($row['user_name']) ?></td>
                        <td><?php echo htmlspecialchars($row['email']) ?></td>
                        <td><?php echo htmlspecialchars($row['password']) ?></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary btn-custom edit-btn" data-bs-toggle="modal" 
                            data_id ="<?php echo htmlspecialchars($row['id'])?>"
                            data_first_name ="<?php echo htmlspecialchars($row['first_name'])?>"
                            data_last_name ="<?php echo htmlspecialchars($row['last_name'])?>"
                            data_user_name="<?php echo htmlspecialchars($row['user_name'])?>"
                            data_email ="<?php echo htmlspecialchars($row['email'])?>"
                            data_password ="<?php echo htmlspecialchars($row['password'])?>"                            
                            data-bs-target="#editModal">
                                <i class="bi bi-pencil-square"></i> Измени
                            </button>
                            <a href="includes/delete_user.php?id=<?php echo urlencode($row['id'])?>" class="btn btn-sm btn-danger btn-custom "><i class="bi bi-trash3"></i> Избриши </a> <!-- Линк за бришење на корисникот -->
                            <button type="button" class="btn btn-success add_comment" data-bs-toggle="modal" data-bs-target="#commentModal" 
                            data_id="<?php echo htmlspecialchars($row['id'])?>";
                            >Comnent</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Модал за уредување на корисникот -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="includes/edit_user.php " method="POST"> <!-- Форма за уредување на корисникот -->
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Измени корисник</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Затвори"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="edit_id">
                        <div class="mb-3">
                            <label for="first_name" class="form-label">Име</label>
                            <input type="text" class="form-control" id="edit_first_name" name="first_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Презиме</label>
                            <input type="text" class="form-control" id="edit_last_name" name="last_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Корисничко име</label>
                            <input type="text" class="form-control" id="edit_user_name" name="user_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Е-маил</label>
                            <input type="email" class="form-control" id="edit_email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Лозинка</label>
                            <input type="password" class="form-control" id="edit_password" name="password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Затвори</button>
                        <button type="submit" class="btn btn-primary">Зачувај промени</button> <!-- Копче за поднесување на формата -->
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Модал за coment-->
    <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action=" includes/comment.php" method="POST"> <!-- Форма за уредување на корисникот -->
                <input type="hidden" name="id" id="comment_user_id">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Dodadi komentar</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Затвори"></button>
                    </div>
                    <div class="modal-body">
                       
                        <div class="mb-3">
                            <label for="form-comment" class="form-label">Dodadi komentar</label>
                      <textarea name="comment_text" id="" class="form-control " placeholder="Add comment here.."></textarea>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Затвори</button>
                        <button type="submit" class="btn btn-primary">Зачувај промени</button> <!-- Копче за поднесување на формата -->
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap иконите и скриптата за функционалност на модалот -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <script>
        // Код за филтрирање по ID
        function filterTable() {
            let filterID = document.getElementById('filter_id').value;
            let rows = document.querySelectorAll('#userTable tr');

            rows.forEach(row => {
                let rowID = row.getAttribute('data-id');

                if (rowID == filterID || filterID === "") {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        // Код за пополнување на податоци во модалот
        document.addEventListener('DOMContentLoaded',function(){
            let editButtons = document.querySelectorAll('.edit-btn');
            editButtons.forEach(function(button){
               button.addEventListener('click',function(){
                   let id = this.getAttribute('data_id');
                   let firstname = this.getAttribute('data_first_name');
                   let lastname = this.getAttribute('data_last_name');
                   let username = this.getAttribute('data_user_name');
                   let email= this.getAttribute('data_email');
                   let password = this.getAttribute('data_password');
                   
                   document.getElementById('edit_id').value = id;
                   document.getElementById('edit_first_name').value = firstname;
                   document.getElementById('edit_last_name').value = lastname;
                   document.getElementById('edit_user_name').value = username;
                   document.getElementById('edit_email').value = email;
                   document.getElementById('edit_password').value = password;
               });
            });
        });


        //Comment script

        document.addEventListener("DOMContentLoaded", function() {
    let commentButtons = document.querySelectorAll('.add_comment');

    commentButtons.forEach(function(button) {
        button.addEventListener("click", function() {
        let userId=this.getAttribute('data_id');
        document.getElementById('comment_user_id').value=userId;
        });
    });
});



       
    </script>
</body>
</html>