<?php require_once("../resources/config.php"); ?>

<!-- header -->
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

  <div class="pimg4">
    <div class="ptext">
          Shop With Us
      </div>
  </div>

  <div class="major">
    <?php get_specific_categories(); ?>
  </div>
  <section id="boxes">
    <div class="container">
    <?php include(TEMPLATE_FRONT . DS . "sidebar.php") ?>

  
    <div class="box12">
    
      <?php get_product_in_cat_page(); ?>

      </div>
    </div>
    </section>

</body>
</html>