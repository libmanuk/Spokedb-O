<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'items show')); ?>
<div id="primary">
    <div id="container">
<table><tr>
<td><div id="right"><?php echo files_for_item(); ?></div></td>
<td style="text-align:top;"><div id="left"><h1><?php echo metadata('item', array('Dublin Core','Title')); ?></h1>
<?php if(metadata('item','Collection Name')): ?>
<h3><?php echo __('Collection'); ?>: <?php echo link_to_collection_for_item(); ?></h3>
<?php endif; ?>
</div></td>
</tr>
</table>

<?php $format = metadata('item', array('Dublin Core', 'Format')); ?>

<?php if ('audio' === $format || 'video' === $format ): ?>

  <div id="tabs-container">
    <ul class="tabs-menu">
        <li class="current"><a href="#tab-1">Description</a></li>
        <li><a href="#tab-2">Access Interview</a></li>
    </ul>
    <div class="tab">
        <div id="tab-1" class="tab-content">
<!-- Items metadata -->
        <?php echo all_element_texts('item'); ?>

        </div>
        <div id="tab-2" class="tab-content">
    <?php if(metadata('item', array('Item Type Metadata', 'OHMS Object'))): ?>
        <?php echo metadata('item', array('Item Type Metadata', 'OHMS Object')); ?>
        <?php endif; ?>
        </div>
   
   <br/><br/><br/>
   <!-- The following prints a citation for this item. -->
    <div id="item-citation" class="element">
        <h3><?php echo __('Citation'); ?></h3>
        <div class="element-text"><?php echo metadata('item','citation',array('no_escape'=>true)); ?></div>
    </div>
    
<!-- The following prints a list of all tags associated with the item -->
    <?php if (metadata('item','has tags')): ?>
    <div id="item-tags" class="element">
        <h3><?php echo __('Tags'); ?></h3>
        <div class="element-text"><?php echo tag_string('item'); ?></div>
    </div>
<?php endif; ?>    
   
   
    </div>
    </div>
           <?php else: ?> 

  
    <!-- Items metadata -->
        <div id="tab-1" class="tab-content">
    <div id="item-metadata">
        <?php echo all_element_texts('item'); ?>
    </div>
</div>
    <h3><?php echo __('Files'); ?></h3>
    <div id="item-images">
         <?php echo files_for_item(); ?>
    </div>

   <?php if(metadata('item','Collection Name')): ?>
      <div id="collection" class="element">
        <h3><?php echo __('Collection'); ?></h3>
        <div class="element-text"><?php echo link_to_collection_for_item(); ?></div>
      </div>

    
    <?php endif; ?>
    
 
<!-- The following prints a citation for this item. -->
    <div id="item-citation" class="element">
        <h3><?php echo __('Citation'); ?></h3>
        <div class="element-text"><?php echo metadata('item','citation',array('no_escape'=>true)); ?></div>
    </div>
    
<!-- The following prints a list of all tags associated with the item -->
    <?php if (metadata('item','has tags')): ?>
    <div id="item-tags" class="element">
        <h3><?php echo __('Tags'); ?></h3>
        <div class="element-text"><?php echo tag_string('item'); ?></div>
    </div>
<?php endif; ?>    
  
           <?php endif; ?>   


    </div>

       <?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>


    <ul class="item-pagination navigation">
        <li id="previous-item" class="previous"><?php echo link_to_previous_item_show(); ?></li>
        <li id="next-item" class="next"><?php echo link_to_next_item_show(); ?></li>
    </ul>

</div> 

<!-- End of Primary. -->






 <?php echo foot(); ?>
