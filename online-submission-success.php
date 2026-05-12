<?php include "connection.php";?>
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
                <div class="col-lg-9 align-items-center section-padding">
                    <div class="hero-body" data-aos="fade-up">
                        <h3 class="text-uppercase sub-header">Online Submission Success<span
                                class="main_header main_clr sf-heavy"></span></h3>
                        <hr />
                        <div>
                            <br /><br /><br />
                            <h4 class="text-danger">Your form successfully submitted to administrator. Administrator will contact you soon.</h4>
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <?php include 'include/sidebar.php';?>
                </div>
            </div>

        </div>
    </section>

    <?php include 'include/footer.php';?>
    <?php include 'include/footerscript.php';?>
</body>

</html>