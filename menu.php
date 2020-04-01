<?php
/**
* Template Name: Menu
**/

get_header();
?>
        </div><!-- .row -->
    </div><!-- .container -->

  <?php

      $magazin_cat_slug = '';
      if (isset($_GET['shop'])) {
        $magazin_cat_slug = $_GET['shop'];
      }

      $magazin_cat_id =  get_term_by( 'slug', $magazin_cat_slug, 'product_cat' )->term_id;
      $magazin_cat_name =  get_term_by( 'slug', $magazin_cat_slug, 'product_cat' )->name;

      $taxonomy     = 'product_cat';
      $orderby      = 'menu_order';
      $show_count   = 0;      // 1 for yes, 0 for no
      $pad_counts   = 0;      // 1 for yes, 0 for no
      $hierarchical = 0;      // 1 for yes, 0 for no
      $title        = '';
      $empty        = 0;

      $args = array(
          'taxonomy'     => $taxonomy,
          'orderby'      => $orderby,
          'show_count'   => $show_count,
          'pad_counts'   => $pad_counts,
          'hierarchical' => $hierarchical,
          'title_li'     => $title,
          'hide_empty'   => $empty,
          'parent'       => $magazin_cat_id,
          'exclude'      => $category = get_term_by( 'slug', 'rest', 'product_cat' )->term_id,
      );
      $all_categories = get_categories( $args );

      if ($magazin_cat_id != null) {
  ?>

<div class="content menu">

  <div class="container mt-5">

    <h3 class="text-center mt-5 pb-3">
      <?php echo $magazin_cat_name ?>
    </h3>

    <div class = "container mt-5 mb-5">
      <div class = "row">
        <div class = "col-6">

          <div class = "pb-4 px-md-5">
            <h5 class = "mb-3">
              Часы работы
            </h5>

            <div class="bd-highlight">
              <?php echo $GLOBALS['cgv'][$magazin_cat_slug.'-hours'] ?>
            </div>

          </div>

          <div class = "mt-1 pt-2 pb-2 px-md-5">
            <h5 class = "mb-3">
                Телефон
            </h5>
            <div class="bd-highlight">
              <a href="tel:<?php echo $GLOBALS['cgv'][$magazin_cat_slug.'-phone-link'] ?>" class="contacts__row-info-phone">
                <?php echo $GLOBALS['cgv'][$magazin_cat_slug.'-phone'] ?>
              </a>
            </div>
          </div>

        </div>


        <div class = "col-6">
          <h5 class = "mb-3">
            Условия доставки
          </h5>

          <p>
            <?php echo $GLOBALS['cgv'][$magazin_cat_slug.'-delivery'] ?>
          </p>

        </div>
      </div>


    </div>
  </div>

  <h4 class="text-center mt-5 pb-3">
    Ассортимент
  </h4>

        <div class="container home-menu1 px-xl-5">
            <div class="product-range1 rounded mx-xl-5">
                <div class="container-xl">
                    <nav>
                        <div class="nav nav-tabs row d-flex justify-content-center align-items-center" id="nav-tab" role="tablist">
<?php
                            $category_p = '';
                            if (isset($_GET['category'])) {
                              $category_p = $_GET['category'];
                            }
                            $i = 0;
                            foreach ($all_categories as $cat) {
                                $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
                                $image = wp_get_attachment_url( $thumbnail_id );
                                $name = $cat->name;
                                $slug = $cat->slug;
                                $selected = 'false';
                                $active = '';
                                if((($i == 0) && ($category_p == '')) || ($slug == $category_p)){
                                    $selected = 'true';
                                    $active = ' active';
                                }
                                $i++;
?>
                                <a class="category-one1 nav-item nav-link<?php echo $active;?>" id="nav-<?php echo $slug;?>-tab" data-toggle="tab" href="#nav-<?php echo $slug;?>" role="tab" aria-controls="nav-<?php echo $slug;?>" aria-selected="<?php echo $selected;?>">
                                    <div class="col-auto">

                                        <span class = "category-name d-flex align-items-center justify-content-center">
                                            <?php echo $name;?>
                                        </span>
                                    </div>
                                </a>
<?php
                            }
?>

                        </div>
                    </nav>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="tab-content" id="nav-tabContent">
<?php

            $iCat = 0;
            foreach ($all_categories as $cat) {

                $slug = $cat->slug;
                $showActive = '';
                if((($iCat == 0) && ($category_p == '')) || ($slug == $category_p)){
                    $showActive = ' show active';
                }
                $iCat++;


?>

                <div class="tab-pane fade<?php echo $showActive;?>" id="nav-<?php echo $slug;?>" role="tabpanel" aria-labelledby="nav-<?php echo $slug;?>-tab">
                    <div class="products mt-5">
                        <div class = "row">
<?php

                        $products = wc_get_products(array(
                            'category'  => array($cat->slug),
                            'showposts' => 50,
                        ));
                        foreach ( $products as $product ) {
                            $productTitle = $product->get_title();
                            $productDescription = $product->get_short_description();
                            $productPrice = $product->get_price();
                            $productImage = wp_get_attachment_image_src( get_post_thumbnail_id( $product->post->ID ), 'single-post-thumbnail' )[0];

?>
                            <div class="col-xl-3 col-md-4 col-sm-6 py-1 px-1 my-1">
                                <a class="link" href="<?php echo $product->get_permalink();?>">
                                    <div class="product py-2 px-2 shadow-sm">
                                        <div class="d-flex justify-content-center mt-4">
                                            <img src="<?php echo $productImage;?>" class="img-fluid px-4" alt="Адаптивные изображения">
                                        </div>
                                        <span class="product-name text-center mt-2">
                                          <h6><?php echo $productTitle;?></h6>
                                        </span>
                                        <span class="product-description px-2 text-justify mt-3 text-break overflow-hidden">
                                            <?php echo $productDescription;?>
                                        </span>
                                        <div class="d-flex justify-content-between px-2 mt-2">
                                            <span>
                                                <?php echo $productPrice;?>
                                                <i class="fas fa-ruble-sign"></i>
                                            </span>
                                            <span>
                                                Подробнее
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
<?php
                        }
?>

                        </div>
                    </div>
                </div>

<?php
            }
?>
            </div>
        </div>
</div>
<?php
} else {
?>
<div class="content menu">

    <h3 class="text-center mt-5 pb-3"><?php the_title(); ?></h3>

    <h4 class="text-center mt-5 pb-3">
      Магазины
    </h4>

    <div class="container px-xl-5">
      <div class="row">
        <nav>
          <div class="nav nav-tabs row d-flex justify-content-center align-items-center" id="nav-tab" role="tablist">
<?php

            $json_shop_str = get_the_content();
            $json_shop = json_decode($json_shop_str, true);

            $i = 0;
            $category_p = '';
            foreach ($all_categories as $cat) {
                $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
                $image = wp_get_attachment_url( $thumbnail_id );
                $name = $cat->name;
                $slug = $cat->slug;
                $selected = 'false';
                $active = '';
                if((($i == 0) && ($category_p == '')) || ($slug == $category_p)){
                  $selected = 'true';
                  $active = ' active';
                }
                $i++;
?>
                <a class="category-one1 nav-item nav-link<?php echo $active;?>" id="nav-<?php echo $slug;?>-tab" data-toggle="tab" href="#nav-<?php echo $slug;?>" role="tab" aria-controls="nav-<?php echo $slug;?>" aria-selected="<?php echo $selected;?>">
                  <div class="col-auto">
                    <span class = "category-name d-flex align-items-center justify-content-center">
                      <?php echo $name;?>
                    </span>
                  </div>
                </a>
<?php
            }
?>
          </div>
        </nav>
      </div>
    </div>

    <div class="container">
      <div class="tab-content" id="nav-tabContent">
<?php
        $iCat = 0;
        $category_p = '';
        foreach ($all_categories as $kinds_shop) {
            $kind_shop_slug = $kinds_shop->slug;
            $kind_shop_id = $kinds_shop->term_id;
            $showActive = '';
            if((($iCat == 0) && ($category_p == '')) || ($slug == $category_p)){
                $showActive = ' show active';
            }
            $iCat++;
?>
            <div class="tab-pane fade<?php echo $showActive;?>" id="nav-<?php echo $kind_shop_slug;?>" role="tabpanel" aria-labelledby="nav-<?php echo $kind_shop_slug;?>-tab">
              <div class="products mt-5">
                <div class = "row">
<?php
                  $taxonomy     = 'product_cat';
                  $orderby      = 'menu_order';
                  $show_count   = 0;      // 1 for yes, 0 for no
                  $pad_counts   = 0;      // 1 for yes, 0 for no
                  $hierarchical = 0;      // 1 for yes, 0 for no
                  $title        = '';
                  $empty        = 0;

                  $args = array(
                      'taxonomy'     => $taxonomy,
                      'orderby'      => $orderby,
                      'show_count'   => $show_count,
                      'pad_counts'   => $pad_counts,
                      'hierarchical' => $hierarchical,
                      'title_li'     => $title,
                      'hide_empty'   => $empty,
                      'parent'       => $kind_shop_id,
                  );
                  $all_shops = get_categories( $args );
                  foreach ($all_shops as $shop) {
                    $thumbnail_id = get_woocommerce_term_meta( $shop->term_id, 'thumbnail_id', true );
                    $image = wp_get_attachment_url( $thumbnail_id );
                    $name = $shop->name;
                    $slug = $shop->slug;

                    if (!(in_array($slug, $json_shop['shops'], true))) {
                      continue;
                    }
?>
                    <div class="col-xl-3 col-md-4 col-sm-6 py-1 px-1 my-1">
                      <a class="link" href="<?php echo esc_url( home_url( '/' )); ?><?php echo "/shops?shop=".$slug; ?>">
                        <div class="product py-2 px-2 shadow-sm">
                          <div class="d-flex justify-content-center mt-4">
                            <img src="<?php echo $image;?>" class="img-shop" alt="Адаптивные изображения">
                          </div>
                          <span class="product-name text-center mt-2">
                            <h6><?php echo $name;?></h6>
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
<?php
      }
?>
    </div>
  </div>
<?php
}
?>
</div>
<?php
get_footer();
