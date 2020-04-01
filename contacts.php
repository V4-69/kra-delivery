<?php
/**
* Template Name: Contacts
**/

get_header(); 
?>
        </div><!-- .row -->
    </div><!-- .container -->
  <div class="container mt-5 shadow mt-5">    
    <div class = "mt-1 pt-5 pb-4 px-md-5">
      <h5 class = "mb-3">
        Часы работы
      </h5>
      <div class="d-flex bd-highlight mb-3 pb-3 border-bottom">
        <div class="mr-auto bd-highlight">
          Магазин
        </div>
        <div class="bd-highlight">
          <?php echo $GLOBALS['cgv']['business_hours_score_contacts'] ?>
        </div>
      </div>
      
      <div class="d-flex bd-highlight mb-3 pb-3 border-bottom">
        <div class="mr-auto bd-highlight">
          Пекарня
        </div>
        <div class="bd-highlight">
          <?php echo $GLOBALS['cgv']['business_hours_bakery_contacts'] ?>
        </div>
      </div>
    </div>
    
    <div class = "mt-1 pt-2 pb-2 px-md-5">
      <h5 class = "mb-3">
          Телефон
      </h5>
      <div class="d-flex bd-highlight mb-3 pb-3 border-bottom">
        <div class="mr-auto bd-highlight">
          Пекарня
        </div>
        <div class="bd-highlight">
          <a href="tel:<?php echo $GLOBALS['cgv']['phone_contacts_link'] ?>" class="contacts__row-info-phone">
            <?php echo $GLOBALS['cgv']['phone_contacts'] ?>
          </a>
        </div>
      </div>
    </div>
    
    <div class = "mt-1 pt-2 pb-2 px-md-5">
      <h5 class = "mb-3">
          Email
      </h5>
      <div class="d-flex bd-highlight mb-3 pb-3 border-bottom">
        <div class="mr-auto bd-highlight">
          Электронная почта
        </div>
        <div class="bd-highlight">
          <a href="mailto:<?php echo $GLOBALS['cgv']['email_contacts'] ?>" class="contacts__row-info-phone">
            <?php echo $GLOBALS['cgv']['email_contacts'] ?>
          </a>
        </div>
      </div>
    </div>
    
    <div class = "mt-1 pt-2 pb-2 px-md-5">
      <h5 class = "mb-3">
          Адрес
      </h5>
      <div class="d-flex bd-highlight mb-3 pb-3 border-bottom">
        <div class="mr-auto bd-highlight">
          Красноусольский
        </div>
        <div class="bd-highlight">
          <?php echo $GLOBALS['cgv']['address_contacts'] ?>
        </div>
      </div>
    </div>
    <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Ae542377a5cb1eb564396e810c50561083585566b0db057e291cd9663417eee0f&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe>
  </div>

</div>
</div>
<?php
get_footer();
