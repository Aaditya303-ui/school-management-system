<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Booking</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
     <link rel="stylesheet" href="../../assets/styles/sidebar.css">
</head>
<body>
    <?php include_once __DIR__.'/../../includes/sidebar.php'; ?>
    <div class="content">
        <div class="form-group">
        <label>Movie</label>
        <select name="movie_id" class="form-control" required>
            <option value="">Select Movie</option>
            <?php foreach($movies as $m): ?>
            <option value="<?php echo $m['movie_id']; ?>">
                <?php echo $m['movie_title']; ?>
            </option>
            <?php endforeach; ?>
        </select>
    </div>
    </div>
</body>
</html>