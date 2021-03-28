  <!-- JUMBOTRON -->
  <div class="jumbotron jumbotron-fluid tinggi bot" style="background: url('img/logo.png'); width: 100%; background-repeat: no-repeat; object-fit: cover;">
    <div class="container">
      
    </div>
    </div>
  </div>


<section class="fdb-block border py-5">
      <div class="container py-5" style="background-image: url(imgs/shapes/6.svg);">
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-9 col-xl-6">
            <div class="fdb-box">
              <div class="row">
                <div class="col-8 col-sm-6 col-md-4 col-xl-3 ml-auto mr-auto">
                  <img alt="image" class="img-fluid rounded" src="img/logo.png">
                </div>
    
                <div class="col-md-8 mt-4 mt-md-0">
                  <p class="lead">
                    "Menjadikan Pulau Lombok bebas dari sampah plastik. Masyarakat Lombok lebih peduli terhadap lingkungan sekitar dengan bersama sama bahu-membahu menjaga lingkungan ini."
                  </p>
    
                  <p class="h3 mt-4 mt-xl-5"><strong>VISI</strong></p>
                  <!-- <p><em>Plastic World</em></p> -->
                </div>
              </div>
            </div>
          </div>
    
          <div class="col-lg-9 col-xl-6 mt-4 mt-xl-0">
            <div class="fdb-box">
              <div class="row">
                <div class="col-8 col-sm-6 col-md-4 col-xl-3 ml-auto mr-auto">
                  <img alt="image" class="img-fluid rounded" src="img/logo.png">
                </div>
    
                <div class="col-md-8 mt-4 mt-md-0">
                  <p class="lead">
                    "Berorientasi pada pengurangan sampah plastik. Mengedukasi Masyarakat terhadap sampah plastik. Memberikan keuntungan yang timbal balik."
                  </p>
    
                  <p class="h3 mt-4 mt-xl-5"><strong>MISI</strong></p>
                  <!-- <p><em>Plastic World</em></p> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


  <section class="fdb-block team-2">
      <div class="">
        <div class="row text-center justify-content-center">
          <div class="col-8">
            <h1>Tim Kami</h1>
            <hr class="hr-edit2 mg-btm">
          </div>
        </div>
    
        <div class="row-50"></div>
        <div class="row text-center justify-content-center">
    <?php foreach ($admin as $a): ?>
          <div class="col-sm-3 m-sm-auto">
            <img alt="image" class="img-fluid rounded-circle mg-sm-btm mg-sm-top" src="<?= base_url('assets/img/profile/') . $a['gambar_admin'] ?>">
    
            <h4><?= $a['nama_admin']?></h4>
            <p>Founder</p>
          </div>  
        <?php endforeach; ?>
        </div>
      </div>
    </section>


  
    
  <footer>
    <div class="foot">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <h4>PLASTIC WORLD</h4>
            <p>Website yang memudahkan proses pengolahan sampah plastik di Lombok NTB</p>
          </div>
          <div class="col-lg-4 ">
            <h4>Menu PLASTIC WORLD</h4>
            <div class="hov">
            <ul>
                <li><a href="about-us.html">Tentang Kami</a></li>
                <li><a href="komunitas.html">Komunitas</a></li>
                <li><a href="umkm.html">UMKM</a></li>
                <li><a href="event.html">Event</a></li>
                <li><a href="artikel.html">Artikel</a></li>
            </ul>
            </div>
          </div>
          <div class="col-lg-4">
            <h4>HUBUNGI KAMI</h4>
            <p>423, Apgujong-ro, Gangnam gu, Seoul</p>
            <p>(021) 098 082</p>
            <p>contact@plasticworld.com</p>
            <a href="www.facebook.com" class="fa fa-facebook mr-3 fa-3x"></a>
            <a href="www.twiter.com" class="fa fa-twitter mr-3 fa-3x"></a>
            <a href="www.instagram.com" class="fa fa-instagram mr-3 fa-3x"></a>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col">
            <p>copyright © 2020 - Plastic World. All rights reserved.</p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  
  <script src="https://kit.fontawesome.com/dd98c3032a.js" crossorigin="anonymous"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>