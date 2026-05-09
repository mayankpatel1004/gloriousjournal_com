
  <style>
    /* custom hover overlay effect – mimics the original 'cz_grid_details' but modern */
    .gallery-card {
      position: relative;
      overflow: hidden;
      border-radius: 0.75rem;
      transition: transform 0.25s ease, box-shadow 0.3s ease;
      background-color: #f8f9fc;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }
    .gallery-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.12);
    }
    .gallery-link {
      display: block;
      position: relative;
      overflow: hidden;
      border-radius: 0.75rem;
    }
    .gallery-img {
      width: 100%;
      aspect-ratio: 1 / 1;  /* forces 1:1 square, same as original 300x300 */
      object-fit: cover;
      transition: transform 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
      display: block;
    }
    .gallery-link:hover .gallery-img {
      transform: scale(1.05);
    }
    /* overlay with search icon — exactly matches the 'cz_grid_details' style */
    .img-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0;
      transition: opacity 0.3s ease;
      border-radius: 0.75rem;
      backdrop-filter: blur(2px);
    }
    .gallery-link:hover .img-overlay {
      opacity: 1;
    }
    .overlay-icon {
      background: rgba(255, 255, 255, 0.9);
      width: 48px;
      height: 48px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #1e2a3e;
      font-size: 1.5rem;
      transition: all 0.2s;
      box-shadow: 0 2px 8px rgba(0,0,0,0.2);
    }
    .overlay-icon i {
      margin: 0;
    }
    /* optional subtle image border & consistent spacing */
    .gallery-col {
      margin-bottom: 28px;
    }
    body {
      background: #f0f2f5;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
      padding: 2rem 1rem;
    }
    .gallery-header {
      margin-bottom: 2rem;
      text-align: center;
    }
    .gallery-header h2 {
      font-weight: 600;
      color: #1f2d3d;
    }
    .gallery-header p {
      color: #5a6e7c;
    }
    /* lightbox fallback: ensures anchor opens image in new tab if no lightbox plugin;
       to keep original user experience we just keep href as image file */
    .card-footer-caption {
      font-size: 0.75rem;
      text-align: center;
      padding: 0.5rem 0;
      color: #6c757d;
      background: transparent;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="gallery-header">
    <h2><i class="fas fa-images mr-2 text-primary"></i>Image Gallery</h2>
    <p>Responsive Bootstrap 4.2 grid · Square thumbnails with hover overlay</p>
    <hr class="my-3 w-25 mx-auto">
  </div>

  <!-- Bootstrap 4.2 responsive row with dynamic columns:
       xs: 1 col, sm: 2 cols, md: 3 cols, lg: 4 cols (matches original 4-per-row on desktop) -->
  <div class="row">
    
    <!-- ITEM 1 – original image: imageedit_2_6228072637.png -->
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 gallery-col">
      <div class="gallery-card">
        <a class="gallery-link" href="https://gloriousjournal.com/wp-content/uploads/2020/05/imageedit_2_6228072637.png" target="_blank" rel="noopener" data-xtra-lightbox>
          <img class="gallery-img" src="https://gloriousjournal.com/wp-content/uploads/2020/05/imageedit_2_6228072637.png" 
               alt="imageedit_2_6228072637" title="imageedit_2_6228072637" loading="lazy">
          <div class="img-overlay">
            <span class="overlay-icon"><i class="fas fa-search"></i></span>
          </div>
        </a>
      </div>
    </div>

    <!-- ITEM 2 – oie_ohNWGVMQ9Z90.png -->
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 gallery-col">
      <div class="gallery-card">
        <a class="gallery-link" href="https://gloriousjournal.com/wp-content/uploads/2020/05/oie_ohNWGVMQ9Z90.png" target="_blank" rel="noopener">
          <img class="gallery-img" src="https://gloriousjournal.com/wp-content/uploads/2020/05/oie_ohNWGVMQ9Z90.png" 
               alt="oie_ohNWGVMQ9Z90" title="oie_ohNWGVMQ9Z90" loading="lazy">
          <div class="img-overlay"><span class="overlay-icon"><i class="fas fa-search"></i></span></div>
        </a>
      </div>
    </div>

    <!-- ITEM 3 – oie_13155425grODL6LA.png -->
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 gallery-col">
      <div class="gallery-card">
        <a class="gallery-link" href="https://gloriousjournal.com/wp-content/uploads/2020/08/oie_13155425grODL6LA.png" target="_blank" rel="noopener">
          <img class="gallery-img" src="https://gloriousjournal.com/wp-content/uploads/2020/08/oie_13155425grODL6LA.png" 
               alt="oie_13155425grODL6LA" title="oie_13155425grODL6LA" loading="lazy">
          <div class="img-overlay"><span class="overlay-icon"><i class="fas fa-search"></i></span></div>
        </a>
      </div>
    </div>

    <!-- ITEM 4 – imageedit_40_3889712099.jpg -->
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 gallery-col">
      <div class="gallery-card">
        <a class="gallery-link" href="https://gloriousjournal.com/wp-content/uploads/2020/08/imageedit_40_3889712099.jpg" target="_blank" rel="noopener">
          <img class="gallery-img" src="https://gloriousjournal.com/wp-content/uploads/2020/08/imageedit_40_3889712099.jpg" 
               alt="imageedit_40_3889712099" title="imageedit_40_3889712099" loading="lazy">
          <div class="img-overlay"><span class="overlay-icon"><i class="fas fa-search"></i></span></div>
        </a>
      </div>
    </div>

    <!-- ITEM 5 – imageedit_34_6497663264.jpg -->
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 gallery-col">
      <div class="gallery-card">
        <a class="gallery-link" href="https://gloriousjournal.com/wp-content/uploads/2020/08/imageedit_34_6497663264.jpg" target="_blank" rel="noopener">
          <img class="gallery-img" src="https://gloriousjournal.com/wp-content/uploads/2020/08/imageedit_34_6497663264.jpg" 
               alt="imageedit_34_6497663264" title="imageedit_34_6497663264" loading="lazy">
          <div class="img-overlay"><span class="overlay-icon"><i class="fas fa-search"></i></span></div>
        </a>
      </div>
    </div>

    <!-- ITEM 6 – imageedit_28_6709026392.jpg -->
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 gallery-col">
      <div class="gallery-card">
        <a class="gallery-link" href="https://gloriousjournal.com/wp-content/uploads/2020/08/imageedit_28_6709026392.jpg" target="_blank" rel="noopener">
          <img class="gallery-img" src="https://gloriousjournal.com/wp-content/uploads/2020/08/imageedit_28_6709026392.jpg" 
               alt="imageedit_28_6709026392" title="imageedit_28_6709026392" loading="lazy">
          <div class="img-overlay"><span class="overlay-icon"><i class="fas fa-search"></i></span></div>
        </a>
      </div>
    </div>

    <!-- ITEM 7 – imageedit_25_5784384873.png -->
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 gallery-col">
      <div class="gallery-card">
        <a class="gallery-link" href="https://gloriousjournal.com/wp-content/uploads/2020/08/imageedit_25_5784384873.png" target="_blank" rel="noopener">
          <img class="gallery-img" src="https://gloriousjournal.com/wp-content/uploads/2020/08/imageedit_25_5784384873.png" 
               alt="imageedit_25_5784384873" title="imageedit_25_5784384873" loading="lazy">
          <div class="img-overlay"><span class="overlay-icon"><i class="fas fa-search"></i></span></div>
        </a>
      </div>
    </div>

    <!-- ITEM 8 – imageedit_20_2140536508.jpg -->
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 gallery-col">
      <div class="gallery-card">
        <a class="gallery-link" href="https://gloriousjournal.com/wp-content/uploads/2020/08/imageedit_20_2140536508.jpg" target="_blank" rel="noopener">
          <img class="gallery-img" src="https://gloriousjournal.com/wp-content/uploads/2020/08/imageedit_20_2140536508.jpg" 
               alt="imageedit_20_2140536508" title="imageedit_20_2140536508" loading="lazy">
          <div class="img-overlay"><span class="overlay-icon"><i class="fas fa-search"></i></span></div>
        </a>
      </div>
    </div>

    <!-- ITEM 9 – imageedit_13_5696875463.png -->
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 gallery-col">
      <div class="gallery-card">
        <a class="gallery-link" href="https://gloriousjournal.com/wp-content/uploads/2020/08/imageedit_13_5696875463.png" target="_blank" rel="noopener">
          <img class="gallery-img" src="https://gloriousjournal.com/wp-content/uploads/2020/08/imageedit_13_5696875463.png" 
               alt="imageedit_13_5696875463" title="imageedit_13_5696875463" loading="lazy">
          <div class="img-overlay"><span class="overlay-icon"><i class="fas fa-search"></i></span></div>
        </a>
      </div>
    </div>

    <!-- ITEM 10 – imageedit_4_5263597396.jpg -->
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 gallery-col">
      <div class="gallery-card">
        <a class="gallery-link" href="https://gloriousjournal.com/wp-content/uploads/2020/08/imageedit_4_5263597396.jpg" target="_blank" rel="noopener">
          <img class="gallery-img" src="https://gloriousjournal.com/wp-content/uploads/2020/08/imageedit_4_5263597396.jpg" 
               alt="imageedit_4_5263597396" title="imageedit_4_5263597396" loading="lazy">
          <div class="img-overlay"><span class="overlay-icon"><i class="fas fa-search"></i></span></div>
        </a>
      </div>
    </div>

    <!-- ITEM 11 – imageedit_45_3479520133.png -->
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 gallery-col">
      <div class="gallery-card">
        <a class="gallery-link" href="https://gloriousjournal.com/wp-content/uploads/2020/08/imageedit_45_3479520133.png" target="_blank" rel="noopener">
          <img class="gallery-img" src="https://gloriousjournal.com/wp-content/uploads/2020/08/imageedit_45_3479520133.png" 
               alt="imageedit_45_3479520133" title="imageedit_45_3479520133" loading="lazy">
          <div class="img-overlay"><span class="overlay-icon"><i class="fas fa-search"></i></span></div>
        </a>
      </div>
    </div>

    <!-- ITEM 12 – imageedit_44_3641127356.jpg -->
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 gallery-col">
      <div class="gallery-card">
        <a class="gallery-link" href="https://gloriousjournal.com/wp-content/uploads/2020/08/imageedit_44_3641127356.jpg" target="_blank" rel="noopener">
          <img class="gallery-img" src="https://gloriousjournal.com/wp-content/uploads/2020/08/imageedit_44_3641127356.jpg" 
               alt="imageedit_44_3641127356" title="imageedit_44_3641127356" loading="lazy">
          <div class="img-overlay"><span class="overlay-icon"><i class="fas fa-search"></i></span></div>
        </a>
      </div>
    </div>

  </div> <!-- end row -->

  <div class="text-center mt-4 mb-2">
    <small class="text-muted"><i class="fas fa-mouse-pointer"></i> Hover over any image to see the overlay · Click opens full resolution</small>
  </div>
</div> <!-- end container -->
