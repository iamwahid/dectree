<?php
session_start();
include ('config.php');
if (isset($_POST['login'])) {
  $username = isset($_POST['username']) ? $_POST['username'] : NULL;
  $email = isset($_POST['email']) ? $_POST['email'] : NULL;
  $password = isset($_POST['password']) ? $_POST['password'] : NULL;

  if ($username || $email || $password) {
    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' LIMIT 1");
    $user = mysqli_fetch_assoc($result);
    // echo var_dump($user);die;
    if ($user && password_verify($password, $user['password'])) {
      $_SESSION['user_login'] = $user['id'];
      header('location:home.php');
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
     <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link href="fontawesome/css/all.css" rel="stylesheet"> <!--load all styles -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet"> 
    <title>Ovi</title>
</head>
<body>
    <div class="container-fluid login">
        <div class="container">
            <div class="row">
                <div class="col-sm"></div>
                <div class="col-sm">
                    <div class="card shadow">
                        <div class="card-body mt-4 mb-4">
                            <h4><b>Pengelolaan Ayam pedaging</b></h4>
                            <h5>Login</h5>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">User Name</label>
                                    <input type="text" class="form-control" placeholder="Username" name="username">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password">
                                </div>
                                <div class="input-group mt-4">
                                    <input type="submit" name="login" class="btn btn-primary" value="Login">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm"></div>
            </div>
        </div>
    </div>
    <!--footer-->
<footer>
  <div class="container-fluid footer border-top fixed-bottom">
    <div class="container">
      <div class="row py-3">
        <div class="col">
          <small style="font-family: 'Quicksand', sans-serif;" >
            copyright © 2021 - TI 
          </small>
        </div>
      </div>
    </div>
  </footer>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
 <script src="js/jquery-3.4.1.slim.min.js"></script>
 <script src="js/popper.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <link rel="stylesheet" href="/resources/demos/style.css">
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>
</html>