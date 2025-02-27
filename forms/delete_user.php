 <!-- Delete Form -->
 <div class="container form-container hidden" id="deleteForm">
        <h1 class="form-header">Delete Data</h1>
        <form action="../crud/includes/delete.php" method="POST">
          
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="user_name" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" class="btn btn-custom w-100">Delete</button>
        </form>
    </div>
