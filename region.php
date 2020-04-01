<?php
/**
* Template Name: Region
**/

get_header();
?>
        </div><!-- .row -->
    </div><!-- .container -->

  <div class="content menu">
    <div class="container">
      <div class = "row">

<?php
        $all_region = array(
          "kra" => array("Красноусольский", "kra.jpg"),
          "kurort" => array("Село Курорта", "kurort.jpg"),
          "ozero" => array("Белое озеро",  "empty.png"),
          "burli" => array("Бурлы",  "empty.png"),
          "zilim-karanovo" => array("Зилим-Караново",  "empty.png"),
          "kovardi" => array("Коварды",  "empty.png"),
          "saitbaba" => array("Саитбаба",  "empty.png"),
          "tashli" => array("Ташлы",  "empty.png"),
          "ylukovo" => array("Юлуково",  "empty.png"),
        );
        foreach ($all_region as $key_region => $region) {
?>
          <div class="col-xl-3 col-md-4 col-sm-6 py-1 px-1 my-1">
            <a class="link" href="<?php echo esc_url( home_url( '/' )); ?><?php echo $key_region; ?>">
              <div class="product py-2 px-2 shadow-sm">
                <div class="d-flex justify-content-center mt-4">
                  <img src="<?php echo get_stylesheet_directory_uri().'/img/region/'.$region[1];?>" class="img-shop" alt="Адаптивные изображения">
                </div>
                <span class="product-name text-center mt-2">
                  <h6><?php echo $region[0];?></h6>
                </span>
              </div>
            </a>
          </div>
<?php
        }
?>

      </div>
    </div>
  </div>
</div>
<?php
get_footer();
