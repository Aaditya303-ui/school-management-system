<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Movies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/styles/movie/add_movie.css">
</head>
<body>
        <div class="container">

            <div class="card">
             <a href="display_movie.php"> <- back</a>

             <div class="row">

                 <div class="col-12 text-center">
                     <h3 class="heading">Movie Form</h3>
                 </div>

                 <form action="add_movie.php" method="post">
                     <div class="col-5 ml-5 mt-3 pl-3">
                         <label>Enter the Movie Name</label>
                         <input type="text" name="fullName" placeholder="Enter your full Name" class="form-control">
                     </div>
    
                     <div class="col-5 ml-5 mt-3 pl-3">
                         <label>Enter the Image of movie</label>
                         <input type="file" class="form-control" name="UploadImage"
                         accept="image/*">
                     </div>
    
                     <div class="col-5 ml-5 mt-3 pl-3">
                         <label>Enter the duration</label>
                         <input type="number" name="duration" placeholder="Enter the duration" class="form-control">
                     </div>
    
                     <div class="col-5 ml-5 mt-3 pl-3">
                         <label>Enter the ratings of movie</label>
                         <input type="text" name="rating" placeholder="Enter your Rating" class="form-control">
                     </div>
    
                     <button type="submit" class="btn btn-danger">Submit</button>
                 </form>
                 
             </div>
         </div>
        </div>
</body>
</html>