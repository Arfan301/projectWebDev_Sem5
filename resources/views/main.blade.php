<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div class="container py-4">
        <!-- Search Bar -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <input class="form-control me-3" type="search" placeholder="Search" aria-label="Search" style="max-width: 400px;">
            
            <!-- Profile Circle -->
            <div class="d-flex align-items-center">
                <img src="https://via.placeholder.com/50" alt="Profile" class="rounded-circle" style="width: 50px; height: 50px;">
            </div>
        </div>

        <!-- Display Cards -->
        <div class="row">
            <!-- Example Item Card -->
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Item Image">
                    <div class="card-body">
                        <h5 class="card-title">Item Title</h5>
                        <p class="card-text">This is a short description of the item. Add more details as needed.</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <!-- Add more cards here -->
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-7oP7A2cO3UjR2j23qXtI9UwTALXN3D0IHPq09F6fXjb2DPRX46OmlwpBwOSrS1q7" crossorigin="anonymous"></script>
</body>
</html>
