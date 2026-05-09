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
                        <h3 class="text-uppercase sub-header">About Journal
                            <span class="main_header main_clr sf-heavy"> - Glorious International Journal of Nursing
                                Research</span>
                        </h3>
                        <hr />
                    </div>
                </div>
            </div>
            <style>
            .editorial-section {
                padding: 40px 0;
            }

            .section-title {
                text-align: center;
                font-size: 32px;
                font-weight: 700;
                color: #0b2d48;
                margin-bottom: 15px;
            }

            .section-divider {
                width: 120px;
                height: 3px;
                background: #0b2d48;
                margin: 0 auto 40px;
            }

            .editor-table {
                margin-bottom: 50px;
                background: #fff;
            }

            .editor-table thead th {
                background: #0b2d48;
                color: #fff;
                text-align: center;
                vertical-align: middle;
                font-size: 18px;
            }

            .editor-table td {
                vertical-align: middle;
                font-size: 15px;
                line-height: 1.7;
            }

            .editor-photo {
                width: 110px;
                height: auto;
                border-radius: 6px;
                border: 1px solid #ddd;
            }

            .editor-name {
                font-weight: 700;
                color: #0b2d48;
                margin-bottom: 10px;
            }

            .editor-designation {
                font-weight: 600;
            }

            .table-responsive {
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            }

            @media(max-width:767px) {

                .editor-table td,
                .editor-table th {
                    min-width: 250px;
                }

                .editor-photo {
                    width: 90px;
                }
            }
            </style>

            <section class="editorial-section">
                <div class="container">

                    <!-- Editor In Chief -->
                    <h2 class="section-title">Editor In Chief</h2>
                    <div class="section-divider"></div>

                    <div class="table-responsive">
                        <table class="table table-bordered editor-table">
                            <thead>
                                <tr>
                                    <th width="35%">Name</th>
                                    <th width="45%">Organization</th>
                                    <th width="20%">Photo</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>
                                        <div class="editor-name">
                                            Dr. Ravindra HN
                                        </div>

                                        MSc (N), MA (Socio), M. Phil (HC & HA), Ph.D. (N).<br>
                                        <span class="editor-designation">
                                            Professor and Principal
                                        </span>
                                    </td>

                                    <td>
                                        <strong>Company/Institute:</strong>
                                        Parul Institute of Nursing, Parul University<br>

                                        Vadodara, Gujarat.<br>

                                        <strong>E-Mail:</strong>
                                        <a href="mailto:editorgloriousjournal@gmail.com">
                                            editorgloriousjournal@gmail.com
                                        </a>
                                    </td>

                                    <td class="text-center">
                                        <img src="<?php echo $site_url;?>images/1.png" class="img-fluid editor-photo"
                                            alt="Dr. Ravindra HN">
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                    <!-- Editorial Board Members -->
                    <h2 class="section-title mt-5">Editorial Board Members</h2>
                    <div class="section-divider"></div>

                    <div class="table-responsive">
                        <table class="table table-bordered editor-table">
                            <thead>
                                <tr>
                                    <th width="35%">Name</th>
                                    <th width="45%">Organization</th>
                                    <th width="20%">Photo</th>
                                </tr>
                            </thead>

                            <tbody>

                                <!-- Row 1 -->
                                <tr>
                                    <td>
                                        <div class="editor-name">
                                            Dr. Mridula Saikia Khanikor
                                        </div>

                                        <span class="editor-designation">
                                            Vice-Chancellor
                                        </span>
                                    </td>

                                    <td>
                                        <strong>Company/Institute:</strong>
                                        Indira Gandhi Technical and Medical Sciences University<br>

                                        SSB Gate, Ziro, 791120<br>
                                        Arunachal Pradesh
                                    </td>

                                    <td class="text-center">
                                        <img src="<?php echo $site_url;?>images/1-1.jpg" class="img-fluid editor-photo"
                                            alt="">
                                    </td>
                                </tr>

                                <!-- Row 2 -->
                                <tr>
                                    <td>
                                        <div class="editor-name">
                                            Dr. B. V. Kathyayani
                                        </div>

                                        <span class="editor-designation">
                                            Professor cum Principal
                                        </span>
                                    </td>

                                    <td>
                                        <strong>Company/Institute:</strong>
                                        NIMHANS College of Nursing,<br>

                                        Bangalore, Karnataka<br>

                                        <strong>E-Mail:</strong>
                                        <a href="mailto:bv.kathyayani@rediffmail.com">
                                            bv.kathyayani@rediffmail.com
                                        </a>
                                    </td>

                                    <td class="text-center">
                                        <img src="<?php echo $site_url;?>images/2.png" class="img-fluid editor-photo"
                                            alt="">
                                    </td>
                                </tr>

                                <!-- Row 3 -->
                                <tr>
                                    <td>
                                        <div class="editor-name">
                                            Dr. Shrinivasan Gandhi
                                        </div>

                                        <span class="editor-designation">
                                            Principal
                                        </span>
                                    </td>

                                    <td>
                                        <strong>Company/Institute:</strong>
                                        Institute Of Nursing Sciences.<br>

                                        9 A, Mantribari Road, Battala,<br>
                                        Agartala, Tripura 799001<br>

                                        <strong>E-Mail:</strong>
                                        <a href="mailto:srinivasangandhi@yahoo.com">
                                            srinivasangandhi@yahoo.com
                                        </a>
                                    </td>

                                    <td class="text-center">
                                        <img src="<?php echo $site_url;?>images/3.png" class="img-fluid editor-photo"
                                            alt="">
                                    </td>
                                </tr>

                                <!-- Row 4 -->
                                <tr>
                                    <td>
                                        <div class="editor-name">
                                            Prof. Dr. Sudha A. Raddi
                                        </div>

                                        <span class="editor-designation">
                                            Principal
                                        </span>
                                    </td>

                                    <td>
                                        <strong>Company/Institute:</strong>
                                        KAHER Institute of Nursing Sciences,<br>

                                        Belagavi - 590010 Karnataka India<br>

                                        <strong>E-Mail:</strong>
                                        <a href="mailto:srdrishti@gmail.com">
                                            srdrishti@gmail.com
                                        </a>
                                    </td>

                                    <td class="text-center">
                                        <img src="<?php echo $site_url;?>images/4.png" class="img-fluid editor-photo"
                                            alt="">
                                    </td>
                                </tr>

                                <!-- Row 5 -->
                                <tr>
                                    <td>
                                        <div class="editor-name">
                                            Dr. Prabha. K. Dasila
                                        </div>

                                        <span class="editor-designation">
                                            Professor & Director
                                        </span>
                                    </td>

                                    <td>
                                        <strong>Company/Institute:</strong>
                                        MGM New Bombay College of Nursing,<br>

                                        MGM Institute of Health Sciences<br>
                                        Kamothe, Navi Mumbai - 410209<br>

                                        <strong>E-Mail:</strong>
                                        <a href="mailto:prabhadasila@gmail.com">
                                            prabhadasila@gmail.com
                                        </a>
                                    </td>

                                    <td class="text-center">
                                        <img src="<?php echo $site_url;?>images/5.jpg" class="img-fluid editor-photo"
                                            alt="">
                                    </td>
                                </tr>

                                <!-- Row 6 -->
                                <tr>
                                    <td>
                                        <div class="editor-name">
                                            Dr. Veena G. Tauro
                                        </div>

                                        <span class="editor-designation">
                                            Principal
                                        </span>
                                    </td>

                                    <td>
                                        <strong>Company/Institute:</strong>
                                        Masood College of Nursing<br>

                                        Mangalore, Karnataka, India<br>

                                        <strong>E-Mail:</strong>
                                        <a href="mailto:venatauro@hotmail.com">
                                            venatauro@hotmail.com
                                        </a>
                                    </td>

                                    <td class="text-center">
                                        <img src="<?php echo $site_url;?>images/6.png" class="img-fluid editor-photo"
                                            alt="">
                                    </td>
                                </tr>
                                <!-- Row -->
                                <!-- Row -->
                                <tr>
                                    <td class="align-middle">
                                        <strong>Dr. Manjubala Dass</strong><br>
                                        Professor and Head
                                    </td>

                                    <td class="align-middle">
                                        <strong>Company/Institute:</strong>
                                        OBG Nursing Department,<br>
                                        Mother Theresa Postgraduate & Research Institute of Health Sciences,
                                        Puducherry.<br>

                                        <strong>E-Mail:</strong>
                                        <a href="mailto:manju_narayan@rediffmail.com">
                                            manju_narayan@rediffmail.com
                                        </a>
                                    </td>

                                    <td class="text-center align-middle">
                                        <img src="<?php echo $site_url;?>images/7.png" class="img-fluid rounded"
                                            style="max-width:100px;" alt="Dr. Manjubala Dass">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">
                                        <strong>Dr. Devraj Singh Chauhan</strong><br>
                                        HOD, Psychiatric Nursing
                                    </td>

                                    <td class="align-middle">
                                        <strong>Company/Institute:</strong>
                                        Parul Institute of Nursing, Parul University<br>
                                        Limda, Waghodia, Vadodara 391760<br>
                                        Gujarat, India<br>

                                        <strong>E-Mail:</strong>
                                        <a href="mailto:devraj.chouhan19338@paruluniversity.ac.in">
                                            devraj.chouhan19338@paruluniversity.ac.in
                                        </a>
                                    </td>

                                    <td class="text-center align-middle">
                                        No Image
                                    </td>
                                </tr>

                                <!-- Row -->
                                <tr>
                                    <td class="align-middle">
                                        <strong>Dr. Indravathi Pandey</strong><br>
                                        Principal
                                    </td>

                                    <td class="align-middle">
                                        <strong>Company/Institute:</strong>
                                        Govt College of Nursing,<br>
                                        Surat, Gujarat
                                    </td>

                                    <td class="text-center align-middle">
                                        <img src="<?php echo $site_url;?>images/8.png" class="img-fluid rounded"
                                            style="max-width:100px;" alt="Dr. Indravathi Pandey">
                                    </td>
                                </tr>

                                <!-- Row -->
                                <tr>
                                    <td class="align-middle">
                                        <strong>Dr. T Sivabalan</strong><br>
                                        Professor cum Principal
                                    </td>

                                    <td class="align-middle">
                                        <strong>Company/Institute:</strong>
                                        Pravara Institute of Medical Sciences,<br>
                                        Deemed University College of Nursing,<br>
                                        Loni (Bk), Maharashtra<br>

                                        <strong>E-Mail:</strong>
                                        <a href="mailto:sivavimal.guru@gmail.com">
                                            sivavimal.guru@gmail.com
                                        </a>
                                    </td>

                                    <td class="text-center align-middle">
                                        <img src="<?php echo $site_url;?>images/9.png" class="img-fluid rounded"
                                            style="max-width:100px;" alt="Dr. T Sivabalan">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">
                                        <strong>Dr. Harmeet Kaur Kang</strong><br>
                                        Principal cum Professor
                                    </td>

                                    <td class="align-middle">
                                        <strong>Company/Institute:</strong>
                                        Department of Nursing,<br>
                                        Chitkara School of Health Sciences,<br>
                                        Chandigarh, Chandigarh, India<br>

                                        <strong>E-Mail:</strong>
                                        <a href="mailto:harmeet.kaur@chitkara.edu.in">
                                            harmeet.kaur@chitkara.edu.in
                                        </a>
                                    </td>

                                    <td class="text-center align-middle">
                                        <img src="<?php echo $site_url;?>images/10.jpg" class="img-fluid rounded"
                                            style="max-width:100px;" alt="Dr. Harmeet Kaur Kang">
                                    </td>
                                </tr>

                                <!-- Row -->
                                <tr>
                                    <td class="align-middle">
                                        <strong>Dr. Maddikera Chinnadevi</strong><br>
                                        Principal cum Dean
                                    </td>

                                    <td class="align-middle">
                                        <strong>Company/Institute:</strong>
                                        College of Nursing, MG University,<br>
                                        Kishanganj, Bihar
                                    </td>

                                    <td class="text-center align-middle">
                                        <img src="<?php echo $site_url;?>images/11.png" class="img-fluid rounded"
                                            style="max-width:100px;" alt="Dr. Maddikera Chinnadevi">
                                    </td>
                                </tr>

                                <!-- Row -->
                                <tr>
                                    <td class="align-middle">
                                        <strong>Prof. Rose Mary George</strong><br>
                                        HOD, Medical-Surgical Nursing
                                    </td>

                                    <td class="align-middle">
                                        <strong>Company/Institute:</strong>
                                        Faculty of Nursing, Parul University<br>
                                        Limda, Waghodia, Vadodara 391760<br>
                                        Gujarat, India<br>

                                        <strong>E-Mail:</strong>
                                        <a href="mailto:Rose.george18037@paruluniversity.ac.in">
                                            Rose.george18037@paruluniversity.ac.in
                                        </a>
                                    </td>

                                    <td class="text-center align-middle">
                                        No Image
                                    </td>
                                </tr>

                                <!-- Row -->
                                <tr>
                                    <td class="align-middle">
                                        <strong>Shri Sandeep Garg</strong><br>
                                        Professor
                                    </td>

                                    <td class="align-middle">
                                        <strong>Company/Institute:</strong>
                                        Mewar Nursing College,<br>
                                        Udaipur<br>

                                        <strong>E-Mail:</strong>
                                        <a href="mailto:Sandeep.pgn@gmail.com">
                                            Sandeep.pgn@gmail.com
                                        </a>
                                    </td>

                                    <td class="text-center align-middle">
                                        <img src="<?php echo $site_url;?>images/12.jpg" class="img-fluid rounded"
                                            style="max-width:100px;" alt="Shri Sandeep Garg">
                                    </td>
                                </tr>

                                <!-- Row -->
                                <tr>
                                    <td class="align-middle">
                                        <strong>Dr. Ponchitra R</strong><br>
                                        Professor cum Vice-principal
                                    </td>

                                    <td class="align-middle">
                                        <strong>Company/Institute:</strong>
                                        M.G.M New Bombay College of Nursing<br>
                                        Navi Mumbai, Maharashtra<br>

                                        <strong>E-Mail:</strong>
                                        <a href="mailto:Ponnr.ponchitra@mgmudn.edu.in">
                                            Ponnr.ponchitra@mgmudn.edu.in
                                        </a>
                                    </td>

                                    <td class="text-center align-middle">
                                        No Image
                                    </td>
                                </tr>

                                <!-- Row -->
                                <tr>
                                    <td class="align-middle">
                                        <strong>Mrs. Betty Koshy</strong><br>
                                        Assoc. Professor
                                    </td>

                                    <td class="align-middle">
                                        <strong>Company/Institute:</strong>
                                        Parul Institute of Nursing, Parul University<br>
                                        Limda, Waghodia, Vadodara 391760<br>
                                        Gujarat, India<br>

                                        <strong>E-Mail:</strong>
                                        <a href="mailto:betty.koshy59136@paruluniversity.ac.in">
                                            betty.koshy59136@paruluniversity.ac.in
                                        </a>
                                    </td>

                                    <td class="text-center align-middle">
                                        No Image
                                    </td>
                                </tr>

                                <!-- Row -->
                                <tr>
                                    <td class="align-middle">
                                        <strong>Shri. Swapnil Rahane</strong><br>
                                        Asst. Professor
                                    </td>

                                    <td class="align-middle">
                                        <strong>Company/Institute:</strong>
                                        Parul Institute of Nursing, Parul University<br>
                                        Vadodara, Gujarat<br>

                                        <strong>E-Mail:</strong>
                                        <a href="mailto:swapnilvitthal93@gmail.com">
                                            swapnilvitthal93@gmail.com
                                        </a>
                                    </td>

                                    <td class="text-center align-middle">
                                        No Image
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </section>

        </div>
    </section>

    <?php include 'include/footer.php';?>
    <?php include 'include/footerscript.php';?>
</body>

</html>