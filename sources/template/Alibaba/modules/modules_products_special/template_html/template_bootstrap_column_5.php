<?php
/**
 *
 *  @copyright 2008 - https://www.clicshopping.org
 *  @Brand : ClicShopping(Tm) at Inpi all right Reserved
 *  @Licence GPL 2 & MIT
 *  @licence MIT - Portion of osCommerce 2.4
 *  @Info : https://www.clicshopping.org/forum/trademark/
 *
 */

use ClicShopping\OM\CLICSHOPPING;
?>

<div class="col-md-<?php echo 12; ?> col-md-<?php echo 12; ?>" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/Product">
  <div class="separator"></div>
    <article class="itemlist">
      <div class="row row-sm">
        <aside class="col-sm-3">
          <div class="img-wrap ModulesProductsSpecialsBoostrapColumn5Image"><?php echo $products_image . $ticker; ?></div>
        </aside> <!-- col.// -->
        <div class="col-sm-6">
          <div class="text-wrap">
            <h4 class="title ModulesProductsSpecialsBoostrapColumn5Title"><?php echo $products_name; ?></h4>
<?php
  if (!empty($products_short_description)) {
?>
            <p><span itemprop="description"><?php echo $products_short_description; ?></span></p>
<?php
  }
  if (!empty($products_stock)) {
?>
                <p><span class="ModulesProductsSpecialsBoostrapColumn5StockImage"><?php echo $products_stock; ?></span></p>
<?php
  }
  if (!empty($min_order_quantity_products_display)) {
?>
                <p><span class="ModulesProductsSpecialsBoostrapColumn5QuantityMinOrder"><?php echo  $min_order_quantity_products_display; ?></span></p>
<?php
  }
  if (!empty($products_flash_discount)) {
?>
                <p><span class="EndDateFlashDiscount"> <?php echo $products_flash_discount; ?></span></p>
<?php
  }
?>
          </div> <!-- text-wrap.// -->
        </div> <!-- col.// -->
        <aside class="col-sm-3">
          <div class="border-left pl-3">
            <div class="price-wrap">
              <span class="h3 ModulesProductsSpecialsBoostrapColumn5TextPrice" itemprop="offers" itemscope itemtype="https://schema.org/Offer"><?php echo CLICSHOPPING::getDef('text_price') . ' ' . $product_price; ?>
            </div> <!-- info-price-detail // -->
            <?php echo $form; ?>

            <p><span class="ModulesProductsSpecialsBoostrapColumn5QuantityMinOrder"><?php echo $input_quantity; ?>&nbsp; </span></p>
            <p>
              <a href="#" class="ModulesProductsSpecialsBoostrapColumn5ViewDetails"><?php echo $button_small_view_details; ?></a>
              <a href="#" class="ModulesProductsSpecialsBoostrapColumn5SubmitButton"><?php echo $submit_button; ?></a>
            </p>
            <?php echo $endform; ?>
          </div> <!-- action-wrap.// -->
        </aside> <!-- col.// -->
      </div> <!-- row.// -->
    </article> <!-- itemlist.// -->
  <div class="separator"></div>
  <div class="hr"></div>
</div>

