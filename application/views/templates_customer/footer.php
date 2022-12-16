  <!--== Footer Area Start ==-->
  <section id="footer-area">
      <!-- Footer Widget Start -->
      <div class="footer-widget-area">
          <div class="container">
              <div class="row">
                  <!-- Single Footer Widget Start -->
                  <div class="col-lg-6 col-md-6">
                      <div class="single-footer-widget">
                          <h2>Tentang Kami</h2>
                          <div class="widget-body">
                              <img src="<?php echo base_url('assets/logo') ?>/logo.png" alt="JSOFT">
                              <p>CarRent adalah Pintu penghubung antara penyedia rental dengan customer. Sebuah marketplace untuk penyedia rental dan customer untuk saling terhubung.</p>
                          </div>
                      </div>
                  </div>
                  <!-- Single Footer Widget End -->


                  <!-- Single Footer Widget Start -->
                  <div class="col-lg-6 col-md-6">
                      <div class="single-footer-widget">
                          <h2>Hubungi Kami</h2>
                          <div class="widget-body">
                              <p>Hubungi kami untuk mengetahui lebih banyak. Dapatkan layanan terbaik dan prioritas dari kami, CarRent.</p>

                              <ul class="get-touch">
                                  <li><i class="fa fa-map-marker"></i> Jl. Ciledug Raya, DKI Jakarta</li>
                                  <li><i class="fa fa-mobile"></i> +62 812 3456 7890</li>
                                  <li><i class="fa fa-envelope"></i> layanan@cardoor.com</li>
                              </ul>
                              <a href="https://g.page/ubsiciledug?share" class="map-show" target="_blank">Show Location</a>
                          </div>
                      </div>
                  </div>
                  <!-- Single Footer Widget End -->
              </div>
          </div>
      </div>
      <!-- Footer Widget End -->

      <!-- Footer Bottom Start -->
      <div class="footer-bottom-area">
          <div class="container">
              <div class="row">
                  <div class="col-lg-12 text-center">
                      <p>
                          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                          Copyright &copy;<script>
                              document.write(new Date().getFullYear());
                          </script> | Design By Paisal Rohman, Fathur Rahman, Setia Novie Nuradi, Yusuf Abdul Wahid
                          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                      </p>
                  </div>
              </div>
          </div>
      </div>
      <!-- Footer Bottom End -->
  </section>
  <!--== Footer Area End ==-->

  <!--== Scroll Top Area Start ==-->
  <div class="scroll-top">
      <img src="<?php echo base_url() ?>assets/assets_shop/img/scroll-top.png" alt="JSOFT">
  </div>
  <!--== Scroll Top Area End ==-->

  <!--=======================Javascript============================-->
  <!--=== Jquery Min Js ===-->
  <script src="<?php echo base_url() ?>assets/assets_shop/js/jquery-3.2.1.min.js"></script>
  <!--=== Jquery Migrate Min Js ===-->
  <script src="<?php echo base_url() ?>assets/assets_shop/js/jquery-migrate.min.js"></script>
  <!--=== Popper Min Js ===-->
  <script src="<?php echo base_url() ?>assets/assets_shop/js/popper.min.js"></script>
  <!--=== Bootstrap Min Js ===-->
  <script src="<?php echo base_url() ?>assets/assets_shop/js/bootstrap.min.js"></script>
  <!--=== Gijgo Min Js ===-->
  <script src="<?php echo base_url() ?>assets/assets_shop/js/plugins/gijgo.js"></script>
  <!--=== Vegas Min Js ===-->
  <script src="<?php echo base_url() ?>assets/assets_shop/js/plugins/vegas.min.js"></script>
  <!--=== Isotope Min Js ===-->
  <script src="<?php echo base_url() ?>assets/assets_shop/js/plugins/isotope.min.js"></script>
  <!--=== Owl Caousel Min Js ===-->
  <script src="<?php echo base_url() ?>assets/assets_shop/js/plugins/owl.carousel.min.js"></script>
  <!--=== Waypoint Min Js ===-->
  <script src="<?php echo base_url() ?>assets/assets_shop/js/plugins/waypoints.min.js"></script>
  <!--=== CounTotop Min Js ===-->
  <script src="<?php echo base_url() ?>assets/assets_shop/js/plugins/counterup.min.js"></script>
  <!--=== YtPlayer Min Js ===-->
  <script src="<?php echo base_url() ?>assets/assets_shop/js/plugins/mb.YTPlayer.js"></script>
  <!--=== Magnific Popup Min Js ===-->
  <script src="<?php echo base_url() ?>assets/assets_shop/js/plugins/magnific-popup.min.js"></script>
  <!--=== Slicknav Min Js ===-->
  <script src="<?php echo base_url() ?>assets/assets_shop/js/plugins/slicknav.min.js"></script>

  <?php if (strpos(current_url(), "customer/dashboard")) : ?>
      <script type="text/javascript">
          var qsRegex;
          var buttonFilter;

          // init isotope;
          var $popularCar = $(".popular-car-gird").isotope({
              itemSelector: '.single-popular-car',
              layoutMode: 'fitRows',
              filter: function() {
                  var $this = $(this).find('.merk-mobil');
                  //   var $this = $(this);
                  var searchResult = qsRegex ? $this.text().match(qsRegex) : true;
                  var buttonResult = buttonFilter ? $this.is(buttonFilter) : true;
                  return searchResult && buttonResult;
              }
          });
          // Filter 
          $(".popucar-menu a, .home2-car-filter a").click(function() {

              $(".popucar-menu a, .home2-car-filter a").removeClass('active');
              $(this).addClass('active');

              buttonFilter = $(this).attr('data-filter');
              $popularCar.isotope();

              return false;
          });
      </script>
  <?php elseif (strpos(current_url(), "customer/data_mobil")) : ?>
      <script type="text/javascript">
          var qsRegex;

          // init isotope;
          var $popularCar = $(".car-list-content").isotope({
              itemSelector: '.mobil-mobil',
              layoutMode: 'fitRows',
              filter: function() {
                  var $this = $(this).find('.merk-mobil');
                  var searchResult = qsRegex ? $this.text().match(qsRegex) : true;
                  return searchResult;
              }
          });
      </script>
  <?php endif ?>

  <script>
      // Pencarian
      var $quicksearch = $('#quicksearch').keyup(debounce(function() {
          qsRegex = new RegExp($quicksearch.val(), 'gi');
          $popularCar.isotope();
          console.log($popularCar.isotope());
      }));

      // debounce 
      function debounce(fn, threshold) {
          var timeout;
          threshold = threshold || 500;
          return function debounced() {
              clearTimeout(timeout);
              var args = arguments;
              var _this = this;

              function delayed() {
                  fn.apply(_this, args);
              }
              timeout = setTimeout(delayed, threshold);
          };
      }
  </script>
  <!--=== Mian Js ===-->
  <script src="<?php echo base_url() ?>assets/assets_shop/js/main.js"></script>

  <script>
      $('.alert-dismissible').alert().delay(3500).slideUp('slow');
  </script>
  </body>

  </html>