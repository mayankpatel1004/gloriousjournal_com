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
                <div class="col-lg-12 align-items-center section-padding">
                    <div class="hero-body" data-aos="fade-up">
                        <h3 class="text-uppercase sub-header">Reviewers Board Members
                            <span class="main_header main_clr sf-heavy"> </span>
                        </h3>
                        <hr />
                    </div>
                </div>
            </div>
            <div class="container">

    <!-- Section Title -->
    <div class="text-center mb-4">
        <h3 class="font-weight-bold text-primary">
            Reviewer Board Members
        </h3>
    </div>

    <!-- Table -->
    <div class="table-responsive">

        <table class="table table-bordered table-hover">

            <thead class="bg-dark text-white">
                <tr>
                    <th width="35%">Name</th>
                    <th width="45%">Organization</th>
                    <th width="20%">Photo</th>
                </tr>
            </thead>

            <tbody>

                <!-- Row -->
                <tr>
                    <td class="align-middle">
                        <strong>Mr. Vimlesh Vyas</strong><br>
                        Professor
                    </td>

                    <td class="align-middle">
                        <strong>Company/Institute:</strong>
                        Patidar Nursing Institute, Ujjain (MP)
                    </td>

                    <td class="text-center align-middle">
                        <img src="<?php echo $site_url;?>images/r1.jpg"
                             class="img-fluid rounded"
                             style="max-width:100px;"
                             alt="Mr. Vimlesh Vyas">
                    </td>
                </tr>

                <!-- Row -->
                <tr>
                    <td class="align-middle">
                        <strong>Mr. Pavan Kumar Jain</strong><br>
                        Lecturer
                    </td>

                    <td class="align-middle">
                        <strong>Company/Institute:</strong>
                        Government School of Nursing,<br>
                        Udaipur, Rajasthan
                    </td>

                    <td class="text-center align-middle">
                        <img src="<?php echo $site_url;?>images/r2.png"
                             class="img-fluid rounded"
                             style="max-width:100px;"
                             alt="Mr. Pavan Kumar Jain">
                    </td>
                </tr>

            </tbody>

        </table>

    </div>

</div>
        </div>
    </section>
    
    <?php include 'include/footer.php';?>
    <?php include 'include/footerscript.php';?>
</body>
</html>