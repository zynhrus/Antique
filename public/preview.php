<?php require_once("../resources/config.php"); ?>

<!-- header -->
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

  <div class="major">
    <?php get_specific_product(); ?>
  </div>

  <section id="boxes">
    <div class="container">
      

<?php 
    $query = query(" SELECT * FROM products WHERE product_id =" . escape_string($_GET['id']) . " ");
    confirm($query);

    while ($row = fetch_array($query)) :

    
  
?>

      <div class="box11">
        <img class="img-responsive" src="../resources/<?php  echo display_image($row['product_image']); ?>" style="width: 400px; height: 400px" alt="">
      </div>
      <div class="box10">
          <h1><?php echo $row['product_title']; ?></h1>
          <h4><?php echo "&#36;" . $row['product_price']; ?></h4>
          <p><?php echo $row['product_description']; ?></p>
          
          <button class="button" onclick="myFunction()">
          <a style="color: white;">Booking</a>
          </button>   

          <script>
            function myFunction() {
              var r = confirm("You Cannot Cancel It");
              if (r == true) {
                document.location.href = 'thankyou.php';
              } else {
                document.location.href = '#';
              }
            }
            </script>  

      </div>
    </div>
  </section><!-- containers ends here -->
          <?php endwhile; ?>

</body>
</html>