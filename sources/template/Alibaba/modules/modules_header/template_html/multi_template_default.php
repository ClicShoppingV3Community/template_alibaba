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

use ClicShopping\OM\HTML;
use ClicShopping\OM\CLICSHOPPING;
?>
    <div class="row col-md-12" style="background-color: #fff">
      <span class="col-lg-4 col-sm-12">
        <span class="navbar-brand"><?php echo $logo_header; ?></span>
      </span>
      <span class="col-lg-4 col-sm-8">
        <div class="row-sm align-items-center">
          <span>
<?php
  if (!$CLICSHOPPING_Customer->isLoggedOn()) {
?>
          <a data-bs-toggle="modal" data-bs-target="#loginModal"><i class="text-warning bi bi-person-fill">&nbsp;&nbsp;</i><?php echo CLICSHOPPING::getDef('modules_header_multi_template_account_login'); ?></a>
          <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel"><?php echo CLICSHOPPING::getDef('modules_header_multi_template_account_login') ?></h4>
                </div>
                <div class="modal-body text-center">
                  <?php echo $form; ?>
                  <div class="separator"></div>
                  <div class="row">
                    <div class="col-md-12">
                      <label for="inputAddressEmailLogin" class="visually-hidden"></label>
                      <span class="col-md-3 float-start text-start headerMultiTemplateDefaultLoginText"  id="inputAddressEmailLogin"><?php echo CLICSHOPPING::getDef('modules_header_multi_template_header_email_address'); ?></span>
                      <span class="col-md-9 float-end"><?php echo HTML::inputField('email_address', null, 'id="inputAddressEmail" autocomplete="username" aria-describedby="' . CLICSHOPPING::getDef('modules_header_multi_template_header_email_address') . '" placeholder="' . CLICSHOPPING::getDef('modules_header_multi_template_header_email_address') . '"', 'email'); ?></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label for="inputAddressPasswordLogin" class="visually-hidden"></label>
                      <span class="col-md-3 float-start text-start headerMultiTemplateDefaultPasswordText" id="inputAddressPasswordLogin"><?php echo CLICSHOPPING::getDef('modules_header_multi_template_account_password'); ?></span>
                      <span class="col-md-9 float-end"><?php echo HTML::inputField('password', null, 'id="current-password" autocomplete="current-password" aria-describedby="' . CLICSHOPPING::getDef('modules_header_multi_template_account_password') . '" placeholder="' . CLICSHOPPING::getDef('modules_header_multi_template_account_password') . '"', 'password'); ?></span>
                    </div>
                  </div>
                  <div class="separator"></div>
                  <div>
                    <span class="headerMultiTemplateDefaultPassword col-md-6"><?php echo HTML::link(CLICSHOPPING::link(null, 'Account&PasswordForgotten'), CLICSHOPPING::getDef('modules_header_multi_template_password_forgotten')); ?></span>
                    <span class="text-end col-md-6"><label for="<?php echo CLICSHOPPING::getDef('modules_header_multi_template_account_login'); ?>"><?php echo $login; ?></label></span>
                  </div>
                  <?php echo $endform; ?>

                  <hr class="dropdown-divider">
                  <?php
                    if (!$CLICSHOPPING_Customer->isLoggedOn()) {
                      ?>
                      <?php echo HTML::link(CLICSHOPPING::link(null, 'Account&LogIn'), CLICSHOPPING::getDef('modules_header_multi_template_create_account'), 'class="dropdown-item"'); ?>
                      <?php
                    }
                  ?>
                </div>
              </div>
            </div>
          </div>
<?php
  } else {
?>
          <li class="dropdown"><a href="#" class="dropdown-toggle AlibabaTextHeader" data-bs-toggle="dropdown"><i class="text-warning bi bi-person-fill" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo CLICSHOPPING::getDef('modules_header_multi_template_my_account'); ?></a>
            <ul class="dropdown-menu ">
              <li>
<?php
      if ($CLICSHOPPING_Customer->getCustomerGuestAccount($CLICSHOPPING_Customer->getID()) == 0) {
        echo HTML::link(CLICSHOPPING::link(null, 'Account&Main'), CLICSHOPPING::getDef('modules_header_multi_template_my_account'), 'class="dropdown-item"');
      }
?>
              </li>
              <li class="alibabaTextHeader"><?php echo HTML::link(CLICSHOPPING::link(null, 'Account&LogOff'), CLICSHOPPING::getDef('modules_header_multi_template_account_logoff'), 'class="dropdown-item"');?></li>
            </ul>
          </li>
<?php
  }
?>
        </span>&nbsp;&nbsp;
        <span class="alibabaTextHeader"><i class="text-warning bi bi-person-badge-fill" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo HTML::link(ClicShopping::link(null, 'Info&Contact'), CLICSHOPPING::getDef('modules_header_multi_template_title_contact_us')); ?></span>&nbsp;&nbsp;|&nbsp;&nbsp;
        <span class="alibabaTextHeader"><i class="text-warning bi bi-search" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo HTML::link(ClicShopping::link(null, 'Search&AdvancedSearch'), CLICSHOPPING::getDef('modules_header_multi_template_title_advanced_search')); ?></span>
      </div>
    </span>


    <span class="col-lg-4 col-sm-12 text-end">

        <span class="text-end col-sm-6">&nbsp;<?php echo $languages_string; ?></span>
        <span class="text-end col-sm-6">&nbsp;<?php echo $currency_header; ?></span>
        <div class="separator"></div>
<?php
        if ($CLICSHOPPING_ShoppingCart->getCountContents() > 0) {
?>
          <ul>
            <li class="dropdown headerMultiTemplateDefaultShoppingCart">
              <a class="dropdown-toggle headerMultiTemplateDefaultShoppingCart" data-bs-toggle="dropdown" href="#"><?php echo '<i class="text-warning bi bi-cart-fill headerMultiTemplateDefaultShoppingCart" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;' . $shopping_cart ?></a>
              <ul class="dropdown-menu">
                <li role="separator"></li>
<?php
    $products = $CLICSHOPPING_ShoppingCart->get_products();

    foreach ($products as $k => $v) {
      echo '<li class="headerMultiTemplateDefaultLi">&nbsp;&nbsp;
              <span class="float-start">' . $v['quantity'] . ' - ' . $v['name'] . '</span>
              <span class="float-end">' .  $CLICSHOPPING_Currencies->displayPrice($v['final_price'], $CLICSHOPPING_Tax->getTaxRate($v['tax_class_id']), $v['quantity']) . '</span>
            </li>
           ';
    }
?>
                <li role="separator" class="h-divider"></li>
                <li class="headerMultiTemplateDefaultLi">&nbsp;&nbsp;
                  <span class="float-start"><?php echo CLICSHOPPING::getDef('modules_header_multi_template_shopping_cart_total_content'); ?></span>
                  <span class="float-end text-end"><?php echo $CLICSHOPPING_Currencies->format($CLICSHOPPING_ShoppingCart->show_total()); ?></span>
                </li>
                <li role="separator" class="h-divider"></li>
                <li class="headerMultiTemplateDefaultLi">
                  <span class="float-start headerMultiTemplateDefaultShoppingSmallCart"><i class="text-warning bi bi-cart-fill">&nbsp;&nbsp;</i><?php echo HTML::link(ClicShopping::link(null, 'Cart'), CLICSHOPPING::getDef('modules_header_multi_template_shopping_cart_view_cart')); ?></span>
                  <span class="float-end headerMultiTemplateDefaultCheckout"><i class="bi bi-arrow-right-square-fill"></i>&nbsp;&nbsp;<?php echo HTML::link(ClicShopping::link(null, 'Checkout&Shipping'), CLICSHOPPING::getDef('modules_header_multi_template_shopping_cart_checkout')); ?></span>
                </li>
              </ul>
            </li>
          </ul>
<?php
   } else {
          echo '<ul>
        <li class="headerMultiTemplateDefaultShoppingCart"><i class="text-warning bi bi-cart-fill headerMultiTemplateDefaultShoppingCart" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;' . CLICSHOPPING::getDef('modules_header_multi_template_shopping_cart_no_content') . '</li>
        </ul>
        ';
   }
?>
      </span> <!-- col.// -->
    </div>

<section class="header-main">
    <div class="">
      <div class="row-sm align-items-center">
        <div class="col-lg-4-24 col-sm-3">
          <?php echo $categories_dropdown; ?>
        </div>

        <div class="col-lg-11-24 col-sm-8">
          <?php echo $form_advanced_result; ?>
            <div class="input-group w-100">
<!--
              <select class="custom-select" name="category_name" onchange="this.form.submit();">
                <option value=""><?php echo CLICSHOPPING::getDef('text_all_type'); ?></option>
                <option value=""><?php echo CLICSHOPPING::getDef('text_specials'); ?></option>
                <option value=""><?php echo CLICSHOPPING::getDef('text_featured'); ?></option>
                <option value=""><?php echo CLICSHOPPING::getDef('text_favorites'); ?></option>
              </select>
-->
              <?php echo HTML::inputField('keywords', null, 'required aria-required="true" id="inputKeywordsSearchLogin" placeholder="' . CLICSHOPPING::getDef('modules_header_multi_template_header_search') . '"', 'search'); ?>
              <div class="input-group-append">
                <?php echo HTML::button(null, 'bi bi-search', null, 'warning', null, 'md'); ?>
                <?php echo HTML::hiddenField('search_in_description', '1'); ?>
              </div>
            </div>
          </form> <!-- search-wrap .end// -->
        </div> <!-- col.// -->
        <div class="col-lg-9-24 col-sm-8"><?php echo $banner_header; ?></div>
      </div>
    </div>
</section>










