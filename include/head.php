<?php include "connection.php";?>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if(isset($default_meta_description) && $default_meta_description != ""):?>
    <meta name="description" content="<?php echo $default_meta_description;?>"/>
    <?php endif;?>
    <?php if(isset($default_meta_title) && $default_meta_title != ""):?>
    <title><?php echo $default_meta_title;?></title>
    <?php endif;?>
    <?php if(isset($google_site_verification) && $google_site_verification != ""):?>
    <meta name="google-site-verification" content="<?php echo $google_site_verification;?>" />
    <?php endif;?>
    <link rel="canonical" href="<?php echo $url; ?>biomass-briquettes">
    <link rel="icon" type="image/x-icon" href="<?php echo $url; ?>images/favicon.png">
    <link rel="stylesheet" href="<?php echo $url; ?>css/bootstrap-min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sansita:ital,wght@0,400;0,700;0,800;0,900;1,400;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>css/slick.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo $url; ?>css/style.css">
    <link rel="stylesheet" href="<?php echo $url; ?>css/custom.css">
    <link href="<?php echo $url; ?>css/aos.css" rel="stylesheet">
    <!---schema code start here--->
    <script type="application/ld+json">{
    "@context": "https://schema.org",
    "@type": "<?php echo $website_type;?>",
    "name": "<?php echo $website_name;?>",
    "url": "<?php echo $url;?>",
    "logo": "<?php echo $url; ?>images/logo.png",
    "sameAs": "<?php echo $url;?>"
    }
    </script>
    <!---schema code end here--->