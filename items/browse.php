<?php
$pageTitle = __('Search');
if (isset($_GET['search'])) {
    $query_string = $_GET['search'];
}
if (isset($_GET['terms%5D'])) {
    $terms_string = $_GET['terms%5D'];
}
echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse'));
?>

<h1><?php echo $pageTitle;?> <?php echo __('(%s total)', $total_results); ?></h1>

<nav class="items-nav navigation secondary-nav">
        
    <?php echo public_nav_items(); ?>
</nav>

<?php // echo item_search_filters(); ?>
<?php 
if ($query_string != NULL) {
echo "<div id=\"item-filters\"><p><b>results for search</b>: <i>$query_string</i></p></div>";
} 
if ($query_string == NULL) {
echo "<div id=\"item-filters\"><b>results for search</b>: <i>";
echo item_search_filters();
echo "</i></div>";
} 
?>
<?php echo pagination_links(); ?>

<?php if ($total_results > 0): ?>

<?php
$sortLinks[__('Title')] = 'Dublin Core,Title';
$sortLinks[__('Creator')] = 'Dublin Core,Creator';
$sortLinks[__('Date Added')] = 'added';
?>
<div id="sort-links">
    <span class="sort-label"><?php echo __('Sort by: '); ?></span><?php echo browse_sort_links($sortLinks); ?>
</div>

<?php endif; ?>

<div class="browse_results">

<div class="divTable">
    <div class="divTableBody">

<?php foreach (loop('items') as $item): ?>

<?php $suppressed = metadata('item', array('Suppression', 'Suppressed -Suppress description'));
$suppressed = strip_formatting($suppressed);
$supsubstr = preg_replace('/\s+/', '', $suppressed);
$chksupsubstr = "Description suppressed: Yes";
$chksupsubstr = preg_replace('/\s+/', '', $chksupsubstr);
?>

<?php if (strpos($supsubstr, $chksupsubstr) !== false): ?>
        <div class="divTableRow">
                            <div class="divTableCell">
<!-- Nothing to see here, move along, these are not the droids you are looking for. -->    
</div>
</div>
        <?php else: ?>    

                <?php $recordurl = link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink'));
                $recordurl = str_replace("%3A/",":/",$recordurl); 
                $collectionlink = link_to_collection_for_item();
                $collectionlink = str_replace("%3A/",":/",$collectionlink); 
                $project = get_collection_for_item(); ?>            
                <div class="divTableRow"><div class="divTableCell" style="border-bottom: 0px !important;"><h3><?php echo $recordurl ?></h3>
                                            <?php if ($project): ?>
                    <span class="res_item_proj"><span class="metalabel">Project</span>: <?php echo metadata($project, array('Dublin Core', 'Title')); ?></span>
<?php endif; ?>
        
                </div>
                </div>   
                </div>
                </div>
                <div class="divTable">
                        <div class="divTableBody">
                        <div class="divTableRow">
                            <div class="divTableCell">
<!--<div class="item record">-->
    <!--<h3><?php echo $recordurl ?></h3>-->
<!--<h3>Project:&nbsp;<?php echo $collectionlink ?></h3>-->
    <!--<div class="item-meta">-->
<!--    <?php if (metadata('item', 'has files')): ?>
    <div class="item-img">
        <?php echo link_to_item(item_image('square_thumbnail')); ?>
    </div>
    <?php endif; ?> -->
    
    <?php if (metadata('item', array('General', 'Interview Accession'))): ?>
<span class="metalabel">Accession Number</span>: <?php echo metadata('item', array('General', 'Interview Accession')); ?>
<?php endif; ?>
<br/>
<?php if (metadata('item', array('General', 'Interviewer Name'))): ?>
<span class="metalabel">Interviewer</span>: <?php echo metadata('item', array('General', 'Interviewer Name')); ?>
<?php endif; ?>

</div>
<div class="divTableCell">
<?php if (metadata('item', array('Dublin Core', 'Rights'))): ?>
<?php
$int_rights = strip_formatting(metadata('item', array('Dublin Core', 'Rights')));
        if ($int_rights === "Restricted") {
        $int_restriction = "Restrictions";
        } else {
        $int_restriction = "No Restrictions";
        }
?>
<span class="metalabel">Restrictions</span>: <?php echo $int_restriction; ?>
<?php endif; ?>

<br/>

<?php 
$int_online = strip_formatting(metadata('item', array('OHMS', 'OHMS Object')));
$int_accession = strip_formatting(metadata('item', array('General', 'Interview Accession')));
$online_label = "Online";
if ($int_online != NULL) {
   $int_online = link_to_item($online_label, array('class'=>'permalink'));
   $int_online = str_replace("%3A/",":/",$int_online);
} else {
   $int_online = "Available By Request";
   $int_online = link_to_item($int_online, array('class'=>'permalink'));
   $int_online = str_replace("%3A/",":/",$int_online);
}
?>

<span class="metalabel">Access</span>: <?php echo $int_online; ?>
<br/><br/>

    <?php if (metadata('item', 'has tags')): ?>
    <div class="tags"><p><strong><?php echo __('Tags'); ?>:</strong>
        <?php echo tag_string('items'); ?></p>
    </div>
    <?php endif; ?>
    
    <?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' =>$item)); ?>

    <!-- end class="item-meta" -->

</div>
    <!-- end class="item hentry" -->
</div>
    <?php endif; ?>
</div></div><div class="divTable">
                        <div class="divTableBody">

<?php endforeach; ?>

    </div>
</div>
</div>

<?php echo pagination_links(); ?>

<div id="outputs">
    <span class="outputs-label"><?php echo __('Output Formats'); ?></span>
    <?php echo output_format_list(false); ?>
</div>

<?php fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>

<?php echo foot(); ?>
