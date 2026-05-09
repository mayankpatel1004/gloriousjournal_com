<?php include "connection.php";?>
<?php include "functions.php";?>
<!-- header -->
<div class="header_top main-bg py-2 mob-hide">
            <div class="container">
                <div class="row">                  
                    <div class="col-md-12">                        
                        <ul class="list-unstyled d-flex mb-0">
                            <li class="text-white float-left w-80">Welcome to Glorious International Journal of Nursing Research</li>
                            <li class="text-white float-right pull-right text-right">ISSN (Online) - 2583-9713</li>                                
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <ul class="top_icon d-flex mb-0 justify-content-end">
                            <?php if(isset($facebook_url) && $facebook_url != ""):?>
                            <li><a href="<?php $facebook_url;?>" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
                            <?php endif;?>
                            <?php if(isset($instagram_url) && $instagram_url != ""):?>
                            <li><a href="<?php echo $instagram_url;?>" target="_blank"><i class="fab fa-instagram-square"></i></a></li>
                            <?php endif;?>
                            <?php if(isset($youtube_url) && $youtube_url != ""):?>
                            <li><a href="<?php echo $youtube_url;?>" target="_blank"><i class="fab fa-youtube"></i>
                            </a></li>
                            <?php endif;?>
                        </ul>
                </div>
                </div>
            </div>
        </div>
         <div class="header_top main-bg py-2 d-none mob-show">
            <div class="container">
                <div class="row">                  
                    <div class="col-md-12 w-100">                        
                        <ul class="list-unstyled d-flex mb-0">
                            <li class="text-white">For Enquiry Call Us at:</li>
                            <li><a href="tel:<?php echo $contact;?>"><i class="fas fa-phone-alt"></i> <?php echo formatPhoneNumber($contact);?></a></li>
                            <li><a href="mailto:<?php echo $email;?>"><i class="fas fa-envelope"></i> <?php echo $email;?></a></li>                                
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <header class="nav-down">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand main_clr main_logo" href="<?php echo $url;?>"><?php echo $website_name;?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?php echo $url;?>">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" data-bs-toggle="dropdown" role="button" id="navbarDropdown">About <i class="fa fa-chevron-down"></i></a>
                            <ul class="dropdown-menu nav-list py-0 dropdown-menu-center" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="<?php echo $url;?>about-journal.html">About Journal</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?php echo $url;?>aim-scope-of-journal.html">Aim & Scope Of Journal</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?php echo $url;?>about-ginraf.html">About GINRAF</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="results.html" data-bs-toggle="dropdown" role="button" id="navbarDropdown">Members <i class="fa fa-chevron-down"></i></a>
                            <ul class="dropdown-menu nav-list py-0 dropdown-menu-center" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="<?php echo $url;?>editorial-board-members.html">Editorial Board Members</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?php echo $url;?>reviewers-board-members.html">Reviewers Board Members</a>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link" href="results.html" data-bs-toggle="dropdown" role="button" id="navbarDropdown">Editorial Policies <i class="fa fa-chevron-down"></i></a>
                            <ul class="dropdown-menu nav-list py-0 dropdown-menu-center" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="<?php echo $url;?>publication-policy.html">Publication Policy</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?php echo $url;?>policy-on-publication-ethics.html">Policy On Publication Ethics</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?php echo $url;?>peer-review-process.html">Peer Review Process</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?php echo $url;?>policy-on-plagiarism.html">Policy On Plagiarism</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?php echo $url;?>open-access-policy.html">Open Access Policy</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?php echo $url;?>copyright-policy.html">Copyright Policy</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link" href="results.html" data-bs-toggle="dropdown" role="button" id="navbarDropdown">Author Instruction <i class="fa fa-chevron-down"></i></a>
                            <ul class="dropdown-menu nav-list py-0 dropdown-menu-center" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="<?php echo $url;?>submission-of-manuscript.html">Submission Of Manuscript</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?php echo $url;?>preparation-of-manuscript.html">Preparation Of Manuscript</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?php echo $url;?>manuscript-guidelines.html">Manuscript Guidelines</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?php echo $url;?>conflict-of-interest.html">Conflict Of Interest</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?php echo $url;?>nomination-for-the-best-paper-award.html">Nomination For The Best Paper Award</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $url;?>current-issue.html">Current Issue</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $url;?>indexing.html">Indexing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $url;?>archive.html">Archive</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <script src="<?php echo $url;?>js/jquery.min.js"></script>
    <script type="text/javascript">
    // Hide header on scroll down
    var didScroll;
    var lastScrollTop = 0;
    var delta = 5;
    var navbarHeight = $('header').outerHeight();

    $(window).scroll(function(event){
        didScroll = true;
    });

    setInterval(function() {
        if (didScroll) {
            hasScrolled();
            didScroll = false;
        }
    }, 250);

    function hasScrolled() {
        var st = $(this).scrollTop();
        
        // Make scroll more than delta
        if(Math.abs(lastScrollTop - st) <= delta)
            return;
        
        // If scrolled down and past the navbar, add class .nav-up.
        if (st > lastScrollTop && st > navbarHeight){
            // Scroll Down
            $('header').removeClass('nav-down').addClass('nav-up');
        } else {
            // Scroll Up
            if(st + $(window).height() < $(document).height()) {
                $('header').removeClass('nav-up').addClass('nav-down');
            }
        }
    
        lastScrollTop = st;
    }
    </script> 
    <!-- hero-sec -->