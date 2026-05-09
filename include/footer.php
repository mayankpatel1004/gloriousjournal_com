<!-- footer -->
<footer class="footer section-padding pb-4 footer-responsive">
    <div class="container">
        <div class="row footer-row section-padding pb-5 m-0 ">
            <div class="col-md-5">
                <div class="footer-contact-us text-white">
                    <h3 class="main_header footer-title footer-border">Editor in Chief</h3>
                    <p class="main_header text-uppercase"></p>
                    <p><b><?php echo $website_name;?></b> <b>Dr. Ravindra HN</b>, MSc (N), MA (Socio), M. Phil (HC & HA), Ph.D. (N).
Glorious International Journal Of Nursing Research (GIJNR)<br />
Professor and Principal <br />- Parul Institute of Nursing, Parul University<br />
Vadodara, Gujarat.</p>
                </div>
            </div>
            <div class="col-md-4 ms-auto">
                <div class="footer-contact-us text-white">
                    <h3 class="main_header footer-title footer-border">Reach Us</h3>
                    <ul class="footer-list p-0 mb-0">
                        <li>Whatsapp<a class="footer-link text-white ms-4" href="tel:<?php echo $contact2;?>"><?php echo formatPhoneNumber($contact2);?></a></li>
                        <li>Mobile <a class="footer-link text-white ms-4" href="tel:<?php echo $contact;?>"><?php echo formatPhoneNumber($contact);?></a></li>
                        <li>Email <a class="footer-link text-white ms-4" href="mailto:<?php echo $email;?>"><?php echo $email;?></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 ms-auto">
                <div class="footer-contact-us text-white">
                    <h3 class="main_header footer-title footer-border">Quick Links</h3>
                    <ul class="footer-list p-0 mb-0">
                        <li><a class="footer-link text-white" href="<?php echo $url;?>">Events</a></li>
                        <li><a class="footer-link text-white" href="<?php echo $url;?>privacy-policy.php">Privacy Policy</a></li>
                        <li><a class="footer-link text-white" href="<?php echo $url;?>terms-conditions.php">Terms and Conditions</a></li>
                        <li><a class="footer-link text-white" href="<?php echo $url;?>refund-cancellation.php">Refunds and Cancellation</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-5"><p class="text-white mb-0">&copy; <?php echo date('Y');?> <a class="text-uppercase text-white" href="<?php echo $url;?>"><?php echo $website_name;?></a> All rights reserved. </p></div>
            <div class="col-md-7 d-flex justify-content-end text-white px-0">
            </div>
        </div>
    </div>
</footer>