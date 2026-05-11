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
                        <h3 class="text-uppercase sub-header">Offline Submission<span
                                class="main_header main_clr sf-heavy"> <?php echo $tagline;?></span></h3>
                        <br /><br />
                        <div>
                            <div>Call for papers</div>
                            <hr />
                            <div>
                                Also, you can Submit your Manuscript through E-Mail: <a href="mailto:editorgloriousjournal@gmail.com">editorgloriousjournal@gmail.com</a>
                            </div>
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