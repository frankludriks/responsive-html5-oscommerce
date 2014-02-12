<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2010 osCommerce

  Released under the GNU General Public License
*/

  if ($messageStack->size('header') > 0) {
    echo '<div class="grid-100">' . $messageStack->output('header') . '</div>';
  }
?>
<div id="header" class="grid-100">
  <div class="storeLogo grid-30"><span class="hide-on-mobile "><?php echo '<a href="' . tep_href_link(FILENAME_DEFAULT) . '">' . tep_image(DIR_WS_IMAGES . 'store_logo.png', STORE_NAME) . '</a>'; ?></span></div>
  <div class="storeLogo grid-30"><span class="hide-on-desktop hide-on-tablet"><?php echo '<a href="' . tep_href_link(FILENAME_DEFAULT) . '">' . tep_image(DIR_WS_IMAGES . 'mobile_store_logo.png', STORE_NAME) . '</a>'; ?></span></div>


 <!-- Nav -->
        <nav class="nav" role="navigation">
          <ul class="nav-list">
            <li class="nav-item"><a href="#">Home</a></li>
            <li class="nav-item"><?php echo '<a href="' . tep_href_link(FILENAME_ACCOUNT, '', 'SSL') . '">' . HEADER_TITLE_MY_ACCOUNT . '</a>'; ?></li>
            <li class="nav-item"><?php echo '<a href="' . tep_href_link(FILENAME_SHOPPING_CART, '', 'SSL') . '">' . HEADER_TITLE_CART_CONTENTS . '</a>'; ?></li>
            <li class="nav-item"><?php echo '<a href="' . tep_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL') . '">' . HEADER_TITLE_CHECKOUT . '</a>'; ?></li>
          </ul>
        </nav>
 <!-- /Nav -->
    
</div>
<div class="clear"></div>
<div class="grid-100">
  <div class="infoBoxHeading"><?php echo '&nbsp;&nbsp;' . $breadcrumb->trail(' &raquo; '); ?></div>
</div>

<?php
  if (isset($HTTP_GET_VARS['error_message']) && tep_not_null($HTTP_GET_VARS['error_message'])) {
?>
<table border="0" width="100%" cellspacing="0" cellpadding="2">
  <tr class="headerError">
    <td class="headerError"><?php echo htmlspecialchars(stripslashes(urldecode($HTTP_GET_VARS['error_message']))); ?></td>
  </tr>
</table>
<?php
  }

  if (isset($HTTP_GET_VARS['info_message']) && tep_not_null($HTTP_GET_VARS['info_message'])) {
?>
<table border="0" width="100%" cellspacing="0" cellpadding="2">
  <tr class="headerInfo">
    <td class="headerInfo"><?php echo htmlspecialchars(stripslashes(urldecode($HTTP_GET_VARS['info_message']))); ?></td>
  </tr>
</table>
<?php
  }
?>
