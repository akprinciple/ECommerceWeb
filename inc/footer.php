
  <div class="bg-dark  pb-4">
      <div class="p-1 bg-danger w-25 float-left" style=""></div>
      <div class="p-1 bg-danger w-25 float-right" style=""></div>
      <div class="clearfix"></div>
        <div class=" col-md-9 m-auto ">
        <h5 class="text-center text-light pb-2 border-bottom  mt-3">Contact Us</h5>
        <div class="row mx-0 col-md-9 m-auto">
          <div class="col-md-9">
          <a href="contact.php" class="fas fa-map mb-2 text-light w-100 text-decoration-none">&nbsp; Contact Page</a>
          <a href="tel:<?php 
    $link = mysqli_query($connect, "SELECT * FROM links WHERE id = 1");
    $links = mysqli_fetch_array($link);
    echo $links['link'];
   ?>" class="fas fa-phone mb-2 text-light w-100 text-decoration-none">&nbsp; <?php 
    $link = mysqli_query($connect, "SELECT * FROM links WHERE id = 1");
    $links = mysqli_fetch_array($link);
    echo $links['link'];
   ?></a>
          <a href="mailto:<?php 
    $link = mysqli_query($connect, "SELECT * FROM links WHERE id = 4");
    $links = mysqli_fetch_array($link);
    echo $links['link'];
   ?>" class="fas fa-envelope text-light mb-2 w-100 text-decoration-none">&nbsp; <?php 
    $link = mysqli_query($connect, "SELECT * FROM links WHERE id = 4");
    $links = mysqli_fetch_array($link);
    echo $links['link'];
   ?></a>
            
          </div>
          <div class="col-md-3">
          <a href="<?php 
    $link = mysqli_query($connect, "SELECT * FROM links WHERE id = 3");
    $links = mysqli_fetch_array($link);
    echo $links['link'];
   ?>" class="fab fa-twitter mb-2 text-light w-100 text-decoration-none">&nbsp; Twitter</a>
          <a href="<?php 
    $link = mysqli_query($connect, "SELECT * FROM links WHERE id = 2");
    $links = mysqli_fetch_array($link);
    echo $links['link'];
   ?>" class="fab fa-facebook mb-2 text-light w-100 text-decoration-none">&nbsp; facebook</a>
          <a href="<?php 
    $link = mysqli_query($connect, "SELECT * FROM links WHERE id = 5");
    $links = mysqli_fetch_array($link);
    echo $links['link'];
   ?>" class="fab fa-instagram mb-2 text-light w-100 text-decoration-none">&nbsp; Instagram</a>

 <a href="<?php 
    $link = mysqli_query($connect, "SELECT * FROM links WHERE id = 6");
    $links = mysqli_fetch_array($link);
    echo $links['link'];
   ?>" class="fab fa-youtube mb-2 text-light w-100 text-decoration-none">&nbsp; Youtube</a>
            
          </div>
        </div>
        </div>
      </div>
    <!-- </div> -->

    <footer class="bg-dark text-light border-top text-center p-2">
      &copy; <?php echo date('Y'); ?> <?php 
    $link = mysqli_query($connect, "SELECT * FROM links WHERE id = 7");
    $links = mysqli_fetch_array($link);
    echo $links['link'];
   ?>
    </footer>

</body>
</html>
  <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/popper.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="js/java.js"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>


