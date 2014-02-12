</div>
</section>
 <!-- bodyContent //-->

<?php
  if ($oscTemplate->hasBlocks('boxes_column_left')) {
?>
<aside>
<div id="columnLeft" class="grid-<?php echo $oscTemplate->getGridColumnWidth(); ?> mobile-grid-<?php echo $oscTemplate->getGridContainerWidth(); ?> pull-<?php echo $oscTemplate->getGridContentWidth(); ?>">
  <?php echo $oscTemplate->getBlocks('boxes_column_left'); ?>
</div>
</aside>
<?php
  }

  if ($oscTemplate->hasBlocks('boxes_column_right')) {
?>
<aside>
<div id="columnRight" class="grid-<?php echo $oscTemplate->getGridColumnWidth(); ?> mobile-grid-<?php echo $oscTemplate->getGridContainerWidth(); ?>">
  <?php echo $oscTemplate->getBlocks('boxes_column_right'); ?>
</div>
</aside>
<?php
  }
?>