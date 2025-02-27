<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Modern Navbar</title>
    <style>
        /* Custom styles for a modern look */
        .navbar {
            background-color: #333;
            width: 100%;
            position: absolute;
            top: 20px;
        }
        .navbar-brand, .nav-link {
            color: #fff !important;
        }
        .nav-link {
            margin-right: 15px;
            transition: color 0.3s ease;
        }
        .nav-link:hover {
            color: #ffcc00 !important;
        }
        .btn-custom {
            background-color: #ffcc00;
            color: #333;
            border: none;
            border-radius: 5px;
            padding: 5px 15px;
            transition: background-color 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #e6b800;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <!-- Brand -->
        <a class="navbar-brand" href="#">My Project</a>
        
        <!-- Toggler/collapsible Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- <li class="nav-item">
                    <a class="nav-link active" href="./home.php">Home</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="./forms/login_user.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./forms/insert_user.php">Register</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="btn btn-custom" href="#">Get Started</a>
                </li> -->
            </ul>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
