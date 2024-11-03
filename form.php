<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Product Form</title>
</head>
<body>
<div class="container mt-5">
    <form class="col-6" method="POST" enctype="multipart/form-data" action="process.php">
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="number" class="form-control" name="price">
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" class="form-control" name="img">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
