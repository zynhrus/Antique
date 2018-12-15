<?php require_once("../resources/config.php"); ?>

<!-- header -->
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

    <div class="pimg4"><div class="ptext">Shop With Us</div></div>

    <div class="major">
      <h4>Home > <b>Shop</b></h4>
    </div>

    <section id="boxes">
      <div class="container">
      <!-- categories here -->
      <?php include(TEMPLATE_FRONT . DS . "sidebar.php") ?>

      <div class="box12">

        <?php get_product(); ?>
        
      </div><!-- box12 ends here-->
    </section>
  </div>
  
