<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2010 osCommerce

  Released under the GNU General Public License
*/

  $listing_split = new splitPageResults($listing_sql, MAX_DISPLAY_SEARCH_RESULTS, 'p.products_id');
?>

  <div class="contentText">

<?php
  if ( ($listing_split->number_of_rows > 0) && ( (PREV_NEXT_BAR_LOCATION == '1') || (PREV_NEXT_BAR_LOCATION == '3') ) ) {
?>

    <div>
      <span style="float: right;"><?php echo TEXT_RESULT_PAGE . ' ' . $listing_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info', 'x', 'y'))); ?></span>

      <span><?php echo $listing_split->display_count(TEXT_DISPLAY_NUMBER_OF_PRODUCTS); ?></span>
    </div>

    <br />

<?php
  }

  $prod_list_contents = '<div class="infoBoxContainer_productListing">' .
                        '  <div class="infoBoxHeading_productListing">' .
                        '    <table class="productListingHeader grid-100 mobile-grid-100">' .
                        '      <tr>';

  for ($col=0, $n=sizeof($column_list); $col<$n; $col++) {
    $lc_align = '';

    switch ($column_list[$col]) {
      case 'PRODUCT_LIST_MODEL':
        $lc_text = TABLE_HEADING_MODEL;
        $lc_align = 'left';
        $lc_class = 'hide-on-mobile hide-on-tablet';
        break;
      case 'PRODUCT_LIST_NAME':
        $lc_text = TABLE_HEADING_PRODUCTS;
        $lc_align = 'left';
        $lc_class = 'grid-100 mobile-grid-30';
        break;
      case 'PRODUCT_LIST_MANUFACTURER':
        $lc_text = TABLE_HEADING_MANUFACTURER;
        $lc_align = 'left';
        $lc_class = 'hide-on-mobile hide-on-tablet';
        break;
      case 'PRODUCT_LIST_PRICE':
        $lc_text = TABLE_HEADING_PRICE;
        $lc_align = 'left';
        $lc_class = 'grid-100 mobile-grid-25';
        break;
      case 'PRODUCT_LIST_QUANTITY':
        $lc_text = TABLE_HEADING_QUANTITY;
        $lc_align = 'right';
        $lc_class = 'hide-on-mobile hide-on-tablet';
        break;
      case 'PRODUCT_LIST_WEIGHT':
        $lc_text = TABLE_HEADING_WEIGHT;
        $lc_align = 'right';
        $lc_class = 'hide-on-mobile hide-on-tablet';
        break;
      case 'PRODUCT_LIST_IMAGE':
        $lc_text = TABLE_HEADING_IMAGE;
        $lc_align = 'center';
        $lc_class = 'grid-100 mobile-grid-10';
        break;
      case 'PRODUCT_LIST_BUY_NOW':
        $lc_text = TABLE_HEADING_BUY_NOW;
        $lc_align = 'center';
        $lc_class = 'grid-100 mobile-grid-25';
        break;
    }

    if ( ($column_list[$col] != 'PRODUCT_LIST_BUY_NOW') && ($column_list[$col] != 'PRODUCT_LIST_IMAGE') ) {
      $lc_text = tep_create_sort_heading($HTTP_GET_VARS['sort'], $col+1, $lc_text);
    }

    $prod_list_contents .= '        <td' . (tep_not_null($lc_align) ? ' align="' . $lc_align . '"' : '') . '><span '.(tep_not_null($lc_class) ? ' class="' . $lc_class . '"' : '') . '>' . $lc_text . '</span></td>';
  }

  $prod_list_contents .= '      </tr>' .
                         '    </table>' .
                         '  </div>';

  if ($listing_split->number_of_rows > 0) {
    $rows = 0;
    $listing_query = tep_db_query($listing_split->sql_query);

    $prod_list_contents .= '  <div class="productListTable">' .
                           '    <table class="productListingData grid-100 mobile-grid-100">';

    while ($listing = tep_db_fetch_array($listing_query)) {
      $rows++;

      $prod_list_contents .= '      <tr>';

      for ($col=0, $n=sizeof($column_list); $col<$n; $col++) {
        switch ($column_list[$col]) {
          case 'PRODUCT_LIST_MODEL':
            $prod_list_contents .= '        <td class="hide-on-mobile hide-on-tablet">' . $listing['products_model'] . '</td>';
            break;
          case 'PRODUCT_LIST_NAME':
            if (isset($HTTP_GET_VARS['manufacturers_id']) && tep_not_null($HTTP_GET_VARS['manufacturers_id'])) {
              $prod_list_contents .= '        <td class="grid-100 mobile-grid-25"><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'manufacturers_id=' . $HTTP_GET_VARS['manufacturers_id'] . '&products_id=' . $listing['products_id']) . '">' . $listing['products_name'] . '</a></td>';
            } else {
              $prod_list_contents .= '        <td class="grid-100 mobile-grid-25"><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, ($cPath ? 'cPath=' . $cPath . '&' : '') . 'products_id=' . $listing['products_id']) . '">' . $listing['products_name'] . '</a></td>';
            }
            break;
          case 'PRODUCT_LIST_MANUFACTURER':
            $prod_list_contents .= '        <td class="hide-on-mobile hide-on-tablet"><a href="' . tep_href_link(FILENAME_DEFAULT, 'manufacturers_id=' . $listing['manufacturers_id']) . '">' . $listing['manufacturers_name'] . '</a></td>';
            break;
          case 'PRODUCT_LIST_PRICE':
            if (tep_not_null($listing['specials_new_products_price'])) {
              $prod_list_contents .= '        <td class="grid-100 mobile-grid-25"><del>' .  $currencies->display_price($listing['products_price'], tep_get_tax_rate($listing['products_tax_class_id'])) . '</del>&nbsp;&nbsp;<span class="productSpecialPrice">' . $currencies->display_price($listing['specials_new_products_price'], tep_get_tax_rate($listing['products_tax_class_id'])) . '</span></td>';
            } else {
              $prod_list_contents .= '        <td class="grid-100 mobile-grid-25">' . $currencies->display_price($listing['products_price'], tep_get_tax_rate($listing['products_tax_class_id'])) . '</td>';
            }
            break;
          case 'PRODUCT_LIST_QUANTITY':
            $prod_list_contents .= '        <td align="right" class="hide-on-mobile hide-on-tablet">' . $listing['products_quantity'] . '</td>';
            break;
          case 'PRODUCT_LIST_WEIGHT':
            $prod_list_contents .= '        <td align="right" class="hide-on-mobile hide-on-tablet">' . $listing['products_weight'] . '</td>';
            break;
          case 'PRODUCT_LIST_IMAGE':
            if (isset($HTTP_GET_VARS['manufacturers_id'])  && tep_not_null($HTTP_GET_VARS['manufacturers_id'])) {
              $prod_list_contents .= '        <td align="center" class="grid-100 mobile-grid-25"><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'manufacturers_id=' . $HTTP_GET_VARS['manufacturers_id'] . '&products_id=' . $listing['products_id']) . '">' . tep_image(DIR_WS_IMAGES . $listing['products_image'], $listing['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a></td>';
            } else {
              $prod_list_contents .= '        <td align="center" class="grid-100 mobile-grid-25"><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, ($cPath ? 'cPath=' . $cPath . '&' : '') . 'products_id=' . $listing['products_id']) . '">' . tep_image(DIR_WS_IMAGES . $listing['products_image'], $listing['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a></td>';
            }
            break;
          case 'PRODUCT_LIST_BUY_NOW':
            $prod_list_contents .= '        <td align="center" class="grid-100 mobile-grid-25">' . tep_draw_button(IMAGE_BUTTON_BUY_NOW, 'cart', tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=buy_now&products_id=' . $listing['products_id'])) . '</td>';
            break;
        }
      }

      $prod_list_contents .= '      </tr>';
    }

    $prod_list_contents .= '    </table>' .
                           '  </div>' .
                           '</div>';

    echo $prod_list_contents;
  } else {
?>

    <p><?php echo TEXT_NO_PRODUCTS; ?></p>

<?php
  }

  if ( ($listing_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '2') || (PREV_NEXT_BAR_LOCATION == '3')) ) {
?>

    <br />

    <div>
      <span style="float: right;"><?php echo TEXT_RESULT_PAGE . ' ' . $listing_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info', 'x', 'y'))); ?></span>

      <span><?php echo $listing_split->display_count(TEXT_DISPLAY_NUMBER_OF_PRODUCTS); ?></span>
    </div>

<?php
  }
?>

  </div>
