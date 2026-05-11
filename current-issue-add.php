<?php include "connection.php";
if(!isset($_SESSION['user_name'])){
    header('Location:login.html');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "include/head.php";?>
</head>

<body>
    <?php include "include/header.php";?>
    <section class="hero1">
        <div class="container custom-container-width">
            <div class="row">
                <div class="col-lg-12 align-items-center section-padding">
                    <div class="hero-body" data-aos="fade-up">
                        <h3 class="text-uppercase sub-header">Add Current Issue
                            <span class="main_header main_clr sf-heavy"> - <a href="logout.php" class="text-decoration-none">Logout</a></span>
                        </h3>
                        <hr />
                    </div>
                </div>
            </div>
            <div class="container">

                <div class="row">
                    <div class="col-12">

                        Add current issue...........

                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php include 'include/footer.php';?>
    <?php include 'include/footerscript.php';?>
</body>

</html>