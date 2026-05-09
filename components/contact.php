
<!-- contact us -->
<script src='https://www.google.com/recaptcha/api.js'></script>
<section class="contact-us section-padding pb-0 custom-overflow-hidden">
    <div class="container custom-container-width">
        <div class="row justify-content-center">
            <div class="col-md-6" data-aos="fade-right">
                <h2 class="main_header main_clr mb-5 text-uppercase">Contact Us</h2>
                <h5 class="text-uppercase text-grey main_header mb-4">For enquire Call Us at:</h5>
                <div class="contact_blk">
                    <div class="contact_blk_heading">
                        <div class="contact_blk_img d-flex align-items-center">
                            <div class="contact_blk_icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="contact_blk_content">
                                <span class="txt-warning">Phone Number</span>
                            </div>
                        </div>
                        <ul class="contact_list mb-0 p-0">
                            <li><a class="txt-primary" href="tel:<?php echo $contact;?>"> <?php echo formatPhoneNumber($contact);?></a></li>
                        </ul>
                    </div>
                </div>
                <!--  -->
                <div class="contact_blk">
                    <div class="contact_blk_heading">
                        <div class="contact_blk_img d-flex">
                            <div class="contact_blk_icon">
                                <i class="far fa-envelope"></i>
                            </div>
                            <div class="contact_blk_content">
                                <span class="txt-warning">Email Address</span>
                            </div>
                        </div>
                        <ul class="contact_list mb-0 p-0">
                            <li><a class="txt-primary" href="mailto:<?php echo $email;?>"><?php echo $email;?></a></li>
                        </ul>
                 </div>
            </div>
        </div>
            <!--  -->
            <div class="col-md-6" data-aos="fade-left">
            <form method="post" id="add_form" class="footer-form" enctype='multipart/form-data'>
                    <input type="hidden" name="_token" value="F8mA3eMI8Ic9WG5pjKcdFQ3GqKu3OSPbM0YUlI5g">
                    <h3 class="text-uppercase main_header main_clr text-center form-title mb-4">Get In Touch</h3>
                    <input type="text" name="name" id="name" class="form-control" placeholder="*Name" aria-label="name">
                    <label id="name-error" class="error error_name d-none" for="name"></label>

                    <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                    <label id="email-error" class="error error_email d-none" for="email"></label>

                    <input type="text" name="mobile" id="mobile" class="form-control" placeholder="*Contact">
                    <label id="mobile-error" class="error error_mobile d-none" for="mobile"></label>
                    <textarea class="form-control" name="message" id="message" placeholder="*Message" rows="3"></textarea>
                    <label id="message-error" class="error error_message d-none" for="message"></label>
                    
                    <div class="g-recaptcha" id="g-recaptcha-form"
                            data-sitekey="6LfbFHYUAAAAANNxi4D-eaPSaFtlQaiP8zOR6S78"></div>
                    <label id="recaptcha-error" class="error error_recaptcha d-none" for="recaptcha"></label>
                    <div class="text-center mt-3">
                        <input type="submit" id="button-submit" value="Submit" class="mt-4 primary-btn footer_btn border-0">
                    </div>
                </form>
                <div class="msg alert-success mt-3 d-none" role="alert" style="text-align:center">
                </div>
            </div>
        </div>
    </div>
</section>
<!--  -->