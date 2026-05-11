<?php
include 'connection.php';
$error = '';

if(isset($_POST['user_name']) && $_POST['user_name'] != ""){
  $user_name = $_POST['user_name'];
  $password = base64_encode($_POST['password']);
  $sqlQuery = "SELECT * FROM user WHERE (user_name = '$user_name' OR email = '$user_name') AND password = '$password' AND display_status = 'Y'";
  $stmt = $conn->prepare($sqlQuery);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
  if(isset($result)){
    $_SESSION['user_id'] = $result[0]['user_id'];
    $_SESSION['user_name'] = $result[0]['user_name'];
    $_SESSION['email'] = $result[0]['email'];
    header("Location:current-issue-add.php");
  } else {
    $error = "Invalid Login Credentials";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <link rel="stylesheet" href="<?php echo $url; ?>css/bootstrap-min.css">
  <link rel="stylesheet" href="<?php echo $url; ?>css/style.css">
  <link rel="shortcut icon" href="<?php echo $url;?>images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="main-panel">
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0 mt-5">
            <div class="col-lg-4 mx-auto bg-info">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <form class="pt-3" action="" method="post">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" name="user_name">
                  </div>
                  <div class="form-group mt-2">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">
                  </div>
                  <?php if(isset($error) && $error != ""):?>
                    <?php echo $error;?>
                  <?php endif;?>
                  <div class="mt-3">
                    <input class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="submit" value="SIGN IN" />
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
</body>

</html>
