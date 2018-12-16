<div id="collection-items">
    <h2>Gallery (<?php $num = count($items);
        echo $num; ?> Interviews Total):</h2>
    <?php if (metadata('collection', 'total_items') > 0): ?>
                <div id="gallist" style="display: contents;"></div>
                <div id="aphaOrderg" style="display: contents;">

<ul id="splashset" class="splashlist">

<?php foreach (loop('items') as $item): ?>
<?php $itemTitle = strip_formatting(metadata('item', array('Dublin Core', 'Title'))); 

$suppressed = metadata('item', array('Suppression', 'Suppressed -Suppress description'));
$suppressed = strip_formatting($suppressed);
$supsubstr = preg_replace('/\s+/', '', $suppressed);
$chksupsubstr = "Description suppressed: Yes";
$chksupsubstr = preg_replace('/\s+/', '', $chksupsubstr);

?>

<?php if (strpos($supsubstr, $chksupsubstr) !== false): ?>

    <!-- Nothing to see here, move along, these are not the droids you are looking for. -->

<?php else: ?> 

<li  class="splashitem" data-site="<?php echo metadata('item', array('General','Interview Accession')); ?>">
<div class="item record">

    <div class="item-meta">
    <?php if (metadata('item', 'has files')): ?>
    <div class="item-img">
        <?php //echo link_to_item(item_image('square_thumbnail')); ?>
        <?php
            $int_img_link = link_to_item(item_image('square_thumbnail'));
            $int_img_link = str_replace("%3A/",":/",$int__img_link); 
            $int_img_link = str_replace("Interview with ","",$int_img_link);
                if (strpos($int_img_link, 'ark:/16417') == false) {
                $int_img_link = str_replace("/xt7","/ark:/16417/xt7",$int_img_link);
                }
            echo $int_img_link;
        ?>
    </div>
    <?php else: ?> 
        <div class="item-img">
        <?php //echo link_to_item(('<img src="/themes/Spokedb-O/images/fallback-image.png" />')); ?>
        <?php
            $int_img_default_link = link_to_item(('<img src="/themes/Spokedb-O/images/fallback-image.png" />'));
            $int_img_default_link = str_replace("%3A/",":/",$int_img_default_link); 
            $int_img_default_link = str_replace("Interview with ","",$int_img_default_link);
                if (strpos($int_img_default_link, 'ark:/16417') == false) {
                $int_img_default_link = str_replace("/xt7","/ark:/16417/xt7",$int_img_default_link);
                }
            echo $int_img_default_link;
        ?>
    </div>
    <?php endif; ?>
    <?php
        $int_link = link_to_item(metadata('item', array('Dublin Core', 'Title'), array('snippet'=>45)));
        $int_link = str_replace("%3A/",":/",$int_link); 
            if (strpos($int_link, 'ark:/16417') == false) {
                $int_link = str_replace("/xt7","/ark:/16417/xt7",$int_link);
            }
        $int_link = str_replace("Interview with ","",$int_link); 
    ?>
    <h2 class="splash_head_style"><?php echo $int_link; ?></h2>
    <?php if ($description = metadata('item', array('Description', 'Interview Summary'), array('snippet'=>160))): ?>
    <div class="splashitem-description">
        <?php echo $description; ?>
    </div>
    <?php endif; ?>

   <?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' =>$item)); ?>

    </div><!-- end class="item-meta" -->
</div>
</li>

<!-- end class="item entry" -->

    <?php endif; ?>

<?php endforeach; ?>

</ul>

    <?php endif; ?>
    </div>

</div>
    
    <?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' =>$item)); ?>
