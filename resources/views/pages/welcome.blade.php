<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>STIMU Management System</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo url(); ?>/fulls/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo url(); ?>/fulls/css/full-slider.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-top">
      <div class="container">
        <!-- <a class="navbar-brand" href="/home" style="color:#6f42c1;"><h1>STI MYANMAR UNIVERSITY</h1></a> -->
         <h1 id="logo">
                <a class="navbar-brand page-scroll" href="/home"><img alt="" class="ls-bg" src="<?php echo url(); ?>/images/logo.png"></a>
            </h1> 
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/home" style="background-color: black;">Login
                <span class="sr-only">(current)</span>
              </a>
            </li>
           
          </ul>
        </div>
      </div>
    </nav>

    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
       <!--  <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
           <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol> -->
        <div class="carousel-inner" role="listbox">
            @for($i = 0; $i < count($mainslides); $i++)
         
         @if($i === 0)
          <div class="carousel-item active" style="background-image: url('{{ $mainslides[$i]->photourl1 }}')">
      <!--       <div style="color: white; text-align: center; background-color: #a8a7ce66; padding-top: 50px;">

          

            </div> -->
          </div>
          @else
            <div class="carousel-item" style="background-image: url('{{ $mainslides[$i]->photourl1 }}')">
           
          </div>

          @endif
          @endfor
          
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>

    <!-- Page Content -->
    <section class="py-5">
      <div class="container">
        <h1>STI MYANMAR UNIVERSITY</h1>
        <p>STI Myanmar University, formerly known as STI Education, was founded in Myanmar in early 2006 with the commitment of providing academic programs at the undergraduate and postgraduate levels. 
                            <br>It comprises of four major Faculties: Faculty of Business, Faculty of Health Science, Faculty of Education & Linguistics and Faculty of Engineering. 
                            <br>It is one of the top private education providers in Myanmar conducting courses in business and finance, engineering, human resource management, education and English proficiency programs, in collaboration with international universities and the National Management University under the Ministry of Education, Myanmar.</p>
      </div>
    </section>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; STI MYANMAR UNIVERSITY 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo url(); ?>/fulls/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo url(); ?>/fulls/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
