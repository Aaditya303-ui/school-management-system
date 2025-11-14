<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<style>
    .body-deg{
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100% 100%;
}
</style>
<body background="school-pic-1.png" class="body-deg">
    <center>
        <div class="form_deg">
            <center class="title-deg">
                Login form
            </center>
            <form action="login-check.php" method="POST" class="login-form">
                <div>
                    <label class="label-deg">UserName</label>
                    <input type="text" name="username">
                </div>
                <div>
                    <label class="label-deg">Password</label>
                    <input type="text" name="password">
                </div>
                <div>
                    <input class="btn btn-primary" id="submit-1" type="submit" name="submit" value="login">
                </div>
            </form>
        </div>
    </center>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>