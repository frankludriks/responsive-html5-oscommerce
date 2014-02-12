<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2010 osCommerce

  Released under the GNU General Public License
*/

?>
<div id="footer">
<div class="grid-100 mobile-grid-100">
  <p class="center" style="margin:15px 0"><?php echo FOOTER_TEXT_BODY; ?></p>
</div>

<?php
  //if ($banner = tep_banner_exists('dynamic', 'footer')) {
?>

<div class="grid-100 hide-on-mobile" style="text-align: center; padding-bottom: 20px;">
  <?php //echo tep_display_banner('static', $banner); ?>
</div>

<?php
 // }
?>
</div>
<script type="text/javascript">
$('.productListTable tr:nth-child(even)').addClass('alt');
</script>
