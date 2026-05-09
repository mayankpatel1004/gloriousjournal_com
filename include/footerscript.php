<script src="<?php echo $url;?>js/jquery.min.js"></script>
<script src="<?php echo $url;?>js/bootstrap.min.js"></script>
<script src="<?php echo $url;?>js/aos.js"></script>
<script src="<?php echo $url;?>js/slick.min.js"></script>
<script src="<?php echo $url;?>js/viewport.js"></script>
    <script>
       AOS.init({
      duration: 1000,
     });
    </script>
    <script type="text/javascript">
        $(function() {
        // Card's slider
          var $carousel = $('.gallery-slider');

          $carousel
            .slick({
              slidesToShow: 1,
              slidesToScroll: 1,
              arrows: false,
              fade: true,
              adaptiveHeight: true,
              asNavFor: '.slider-nav'
            });
          $('.slider-nav').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            asNavFor: '.gallery-slider',
            dots: false,
            centerMode: false,
            focusOnSelect: true,
            variableWidth: true,
             prevArrow:"<button type='button' class='slick-prev pull-left slick-btn'><i class='fa fa-chevron-left' aria-hidden='true'></i></button>",
            nextArrow:"<button type='button' class='slick-next pull-right  slick-btn'><i class='fa fa-chevron-right' aria-hidden='true'></i></button>"
          });


        });

        $(document).ready(function(){
           $('.more_info_link[href*=\\#]:not([href=\\#])').on('click', function() {
              var target = $(this.hash);
              target = target.length ? target : $('[name=' + this.hash.substr(1) +']');
              if (target.length) {
                $('html,body').animate({
                  scrollTop: target.offset().top - 150
                }, 2000);
                return false;
              }
            });

            $('.industry-slider').slick({
              dots: false,
              infinite: true,
              speed: 500,
              slidesToShow: 2,
              slidesToScroll: 1,
              autoplay: true,
              autoplaySpeed: 2000,
              arrows: true,
                prevArrow:"<button type='button' class='slick-prev pull-left slick-btn'><i class='fa fa-chevron-left' aria-hidden='true'></i></button>",
                  nextArrow:"<button type='button' class='slick-next pull-right  slick-btn'><i class='fa fa-chevron-right' aria-hidden='true'></i></button>",
              responsive: [{
                breakpoint: 600,
                settings: {
                    arrows: true,
                  slidesToShow: 2,
                  slidesToScroll: 1
                }
              },
              {
                  breakpoint: 400,
                  settings: {
                    arrows: true,
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
              }]
          });

          AOS.init({duration: 1000});
        })
    </script>
    <script>
    jQuery("#add_form").submit((e) => {
        e.preventDefault();
        var form = $('#add_form')[0];
        var formData = new FormData(form);

        document.querySelector(".error_name").innerText = "";
        $(".error_name").addClass("d-none");
        document.querySelector(".error_mobile").innerText = "";
        $(".error_mobile").addClass("d-none");
        document.querySelector(".error_message").innerText = "";
        $(".error_message").addClass("d-none");

        if ($("#name").val() == '') {
            $(".error_name").html("Please enter name");
            $(".error_name").removeClass("d-none");
        } else if ($("#mobile").val() == '') {
            $(".error_mobile").html("Please enter contact");
            $(".error_mobile").removeClass("d-none");
        } else if ($("#message").val() == '') {
            $(".error_message").html("Please enter message");
            $(".error_message").removeClass("d-none");
        } else {
            $.ajax({
              type: "post",
              url: "<?php echo $url;?>sendmail.php",
              data: formData,
              cache: false,
              contentType: false,
              processData: false,
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              error: function(data) {
                  console.log("Error", data);
              },
              success: function(data) {
                console.log("success");
                $('.msg').html(data.success).fadeIn('slow');
                $( ".msg" ).removeClass( "d-none" );
                $("#add_form")[0].reset();

                document.querySelector(".error_name").innerText = "";
                document.querySelector(".error_email").innerText = "";
                document.querySelector(".error_mobile").innerText = "";
                document.querySelector(".error_message").innerText = "";
                document.querySelector(".error_recaptcha").innerText = "";
                alert("Inquiry successfully Sent to Administrator !!!");
                location.reload();
                setTimeout(function() {
                  $('.msg').fadeOut();
                  $('.msg').val('')
                }, 5000 );
              },
              beforeSend: function() {
                  document.querySelector("#button-submit").value = "Please wait...";
              },
              complete: function() {
                  document.querySelector("#button-submit").value = "Submit";
              },
          });
        }

        
    });

    $(document).ready(function() {

        $("#add_team_modal").on("hidden.bs.modal", function() {
            $('form')[0].reset();
        });
    });
    

</script> 

  <script>

jQuery("#add_form_top").submit((e)=>{
	e.preventDefault();
 var form = $('#add_form_top')[0];
 var formData = new FormData(form);
 
$.ajax({
  type: "post",
  url: "<?php echo $url;?>biomass-briquettes",
    data:formData,
    cache: false,
    contentType: false,
    processData: false,
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    error:function(data){

    },
  success: function(data){
	 $('.msg-top').html(data.success).fadeIn('slow');
	 	 $( ".msg-top" ).removeClass( "d-none" );
    $("#add_form_top")[0].reset();

        document.querySelector(".error_name_top").innerText="";
        document.querySelector(".error_mobile_top").innerText="";
        document.querySelector(".error_message_top").innerText="";
        document.querySelector(".error_website_top").innerText="";
        document.querySelector(".error_recaptcha").innerText="";
       // location.reload();
      setTimeout(function() {
 $('.msg-top').fadeOut();
 $('.msg-top').val('')
}, 5000 );  
    },
beforeSend: function(){
    document.querySelector("#button-submit-top").value="Please wait...";
},
complete: function(){
    document.querySelector("#button-submit-top").value="Submit";
},
});
});

$(document).ready(function() {
  
  $("#add_team_modal").on("hidden.bs.modal", function() {
   $('form')[0].reset();
  });
});

  </script> 