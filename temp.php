<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Glorious Journal</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .hero-section{
            background:#f5f5f5;
            padding:80px 0;
        }

        .section-title{
            font-size:32px;
            font-weight:700;
            margin-bottom:20px;
        }

        .course-card img{
            height:220px;
            object-fit:cover;
        }

        footer{
            background:#111;
            color:#fff;
            padding:40px 0;
        }

        footer a{
            color:#fff;
            text-decoration:none;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            Glorious Journal
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Membership</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Journal</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<!-- Hero -->
<section class="hero-section text-center">
    <div class="container">

        <h1 class="display-4 fw-bold">
            Glorious International Journal
        </h1>

        <p class="lead mt-3">
            International Peer-Reviewed Nursing Research Journal
        </p>

        <a href="#" class="btn btn-primary btn-lg mt-3">
            Submit Paper
        </a>

    </div>
</section>

<!-- About -->
<section class="py-5">
    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6">
                <img src="images/about.jpg" class="img-fluid rounded shadow">
            </div>

            <div class="col-lg-6">
                <h2 class="section-title">
                    About Journal
                </h2>

                <p>
                    Glorious International Journal promotes quality nursing research
                    and academic excellence globally.
                </p>

                <a href="#" class="btn btn-outline-primary">
                    Read More
                </a>
            </div>

        </div>

    </div>
</section>

<!-- Courses -->
<section class="bg-light py-5">
    <div class="container">

        <h2 class="section-title text-center">
            Short Term Courses
        </h2>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="card course-card shadow-sm h-100">

                    <img src="images/course1.jpg" class="card-img-top">

                    <div class="card-body">

                        <h5 class="card-title">
                            Diabetes Care
                        </h5>

                        <p class="card-text">
                            Advanced course in Diabetes care.
                        </p>

                        <a href="#" class="btn btn-primary">
                            Know More
                        </a>

                    </div>

                </div>
            </div>

            <div class="col-md-4">
                <div class="card course-card shadow-sm h-100">

                    <img src="images/course2.jpg" class="card-img-top">

                    <div class="card-body">

                        <h5 class="card-title">
                            Infection Control
                        </h5>

                        <p class="card-text">
                            Certificate course in Infection Control.
                        </p>

                        <a href="#" class="btn btn-primary">
                            Know More
                        </a>

                    </div>

                </div>
            </div>

            <div class="col-md-4">
                <div class="card course-card shadow-sm h-100">

                    <img src="images/course3.jpg" class="card-img-top">

                    <div class="card-body">

                        <h5 class="card-title">
                            Applied Statistics
                        </h5>

                        <p class="card-text">
                            Certificate course in applied statistics.
                        </p>

                        <a href="#" class="btn btn-primary">
                            Know More
                        </a>

                    </div>

                </div>
            </div>

        </div>

    </div>
</section>

<!-- Membership -->
<section class="py-5">
    <div class="container">

        <h2 class="section-title text-center">
            Memberships
        </h2>

        <div class="row g-4">

            <div class="col-md-3">
                <div class="card text-center h-100 shadow-sm">
                    <div class="card-body">
                        <h5>Student Membership</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center h-100 shadow-sm">
                    <div class="card-body">
                        <h5>Faculty Membership</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center h-100 shadow-sm">
                    <div class="card-body">
                        <h5>Achiever Membership</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center h-100 shadow-sm">
                    <div class="card-body">
                        <h5>Institute Membership</h5>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- Footer -->
<footer>
    <div class="container">

        <div class="row">

            <div class="col-md-4">
                <h5>Glorious Journal</h5>
                <p>
                    International Nursing Research & Academic Foundation.
                </p>
            </div>

            <div class="col-md-4">
                <h5>Quick Links</h5>

                <ul class="list-unstyled">
                    <li><a href="#">About</a></li>
                    <li><a href="#">Journal</a></li>
                    <li><a href="#">Membership</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>

            <div class="col-md-4">
                <h5>Contact</h5>

                <p>Email: [email protected]</p>
                <p>Phone: +91 9844178870</p>
            </div>

        </div>

    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>