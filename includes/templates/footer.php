  <footer class="site-footer">
    <div class="contenedor clearfix">
      <div class="footer-informacion">
        <h3>Ubicación</h3>
        <p>Av. Pallaresa, 73 - 79 <br> Barcelona, ESP</p>
      </div>
      <div class="ultimos-comentarios">
        <h3>Últimos <span>Comentarios</span></h3>
        <ul>
          <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi ea id, molestias quisquam
            provident neque.</li>
          <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi ea id, molestias quisquam
            provident.</li>
          <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi ea id, molestias quisquam
            provident.</li>
        </ul>
      </div>
      <div class="menu">
        <h3>Redes <span>Sociales</span></h3>
        <nav class="redes-sociales">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-pinterest"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </nav>
      </div>
    </div>

    <p class="copyright">
      Todos los derechos reservados. 2020 &copy;
    </p>
  </footer>


  <script src="js/vendor/modernizr-3.8.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')

  </script>
  <script src="js/plugins.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>

    <?php
      $archivo = basename($_SERVER['PHP_SELF']);
      $pagina = str_replace(".php", "", $archivo);
      if($pagina == 'colaboradores'){
        echo '  <script src="js/jquery.colorbox-min.js"></script>';
      } 
    ?>

  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () {
      ga.q.push(arguments)
    };
    ga.q = [];
    ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto');
    ga('set', 'transport', 'beacon');
    ga('send', 'pageview')

  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>
