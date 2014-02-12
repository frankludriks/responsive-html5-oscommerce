<?php
/*
 $Id$

 osCommerce, Open Source E-Commerce Solutions
 http://www.oscommerce.com

 Copyright (c) 2010 osCommerce

 Released under the GNU General Public License
 */
?>
</div>
</section>
<!-- bodyContent //-->
<?php
if ($oscTemplate->hasBlocks('boxes_column_left')) {
?>
<aside role="complimentary">
  <div id="columnLeft" class="grid-<?php echo $oscTemplate -> getGridColumnWidth(); ?> mobile-grid-<?php echo $oscTemplate -> getGridContainerWidth(); ?> pull-<?php echo $oscTemplate -> getGridContentWidth(); ?>">
    <?php echo $oscTemplate -> getBlocks('boxes_column_left'); ?>
  </div>
</aside>
<?php
}
if ($oscTemplate->hasBlocks('boxes_column_right')) {
?>
<aside role="complimentary">
  <div id="columnRight" class="grid-<?php echo $oscTemplate -> getGridColumnWidth(); ?> mobile-grid-<?php echo $oscTemplate -> getGridContainerWidth(); ?>">
    <?php echo $oscTemplate -> getBlocks('boxes_column_right'); ?>
  </div>
</aside>
<?php
}
?>
<footer>
  <div class="grid-100">
    <?php
    require (DIR_WS_INCLUDES . 'footer.php');
 ?>
  </div>
</footer>
</div>
<!-- bodyWrapper //-->
<?php echo $oscTemplate -> getBlocks('footer_scripts'); ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
<script src="ext/photoset-grid/jquery.photoset-grid.min.js"></script>
<script src="ext/colorbox/jquery.colorbox-min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>
<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
  ( function(b, o, i, l, e, r) {
      b.GoogleAnalyticsObject = l;
      b[l] || (b[l] = function() {
        (b[l].q = b[l].q || []).push(arguments)
      });
      b[l].l = +new Date;
      e = o.createElement(i);
      r = o.getElementsByTagName(i)[0];
      e.src = '//www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e, r)
    }(window, document, 'script', 'ga'));
  ga('create', 'UA-XXXXX-X');
  ga('send', 'pageview'); 
</script>
</body> </html>