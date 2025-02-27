<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css.php">
    <title>Document</title>
    <style>
        /* Поставување на основниот стил */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f6f8;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

/* Стил за контејнерот на формата */
.container.form-container {
    background-color: #ffffff;
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
    animation: fadeIn 0.5s ease;
}

/* Заглавие на формата */
.form-header {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 1rem;
    text-align: center;
    color: #333;
}

/* Стил за полињата на формата */
.form-control {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 0.75rem;
    font-size: 16px;
    width: 100%;
    box-sizing: border-box;
    margin-top: 0.5rem;
    transition: border-color 0.3s ease;
}

.form-control:focus {
    border-color: #007bff;
    outline: none;
}

/* Стил за копчето */
.btn-custom {
    background-color: #007bff;
    color: #ffffff;
    border: none;
    padding: 0.75rem;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 1rem;
    transition: background-color 0.3s ease;
}

.btn-custom:hover {
    background-color: #0056b3;
}

/* Стил за линкот */
a.btn-primary {
    display: inline-block;
    margin-bottom: 1rem;
    color: #ffffff;
    background-color: #6c757d;
    padding: 0.5rem 1rem;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

a.btn-primary:hover {
    background-color: #5a6268;
}

/* Анимација за ефект на појавување */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

    </style>
</head>
<body>
<div class="container form-container hidden " id="insertForm">
        <h1 class="form-header">Insert user</h1>
        <!-- <a href="../home.php" class="btn btn-primary">BACK TO HOME</a> -->
        <form action="../includes/insert.php" method="POST">
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" required>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="user_name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-custom w-100">Submit</button>
        </form>
</body>
</html>


   