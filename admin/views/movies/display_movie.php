<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/styles/sidebar.css">
    <link rel="stylesheet" href="../../assets/styles/movie/display_movie.css">
</head>
<body>
    <?php include_once '../../includes/sidebar.php'; ?>
    <div class="content">
        <table class="table table-striped table-hover w-100">
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Image</th>
            <th>Duration</th>
            <th>Rating</th>
            <th>Update</th>
            <th>Delete</th>
            <th><a class="btn btn-danger" href="add_movie.php">+</a></th>
        </tr>
        <tr>
            <td>1</td>
            <td>Dhurandhar</td>
            <td>
                <img class='display-img' src="../../assets/image/dhurandhar.png" alt="">
            </td>
            <td>214</td>
            <td>4</td>
            <td>
                <button class="btn btn-warning">Update</button>
            </td>
            <td>
                <button class="btn btn-danger">Delete</button>
            </td>
        </tr>
    </table>
    </div>
</body>
</html>