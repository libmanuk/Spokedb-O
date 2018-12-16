<?php
$pageTitle = __('Browse Collections');
echo head(array('title'=>$pageTitle,'bodyclass' => 'collections browse'));
$theme_path = realpath(__DIR__ . '/..');
include "$theme_path/search/projects.php";
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 

if (strpos($actual_link, 'ProjGrp') !== false) {
    $last = substr($actual_link, -1);
    $display = 'none';
} elseif (strpos($actual_link, 'ProjGrp') == false) {
    $last = '';
    $display = 'block';
}

if(!preg_match("/[a-zA-Z]/",$last)) {
    $filler = "a";
    $last = "$filler$last";
} else {
    $last = $last;
}

$coll_img_path = "../../../files/original/";
$sortLinks[__('Title')] = 'Dublin Core,Title';
$sortLinks[__('Date Added')] = 'added';
?>

<style>.project_record{clear:both;border-bottom:1px solid #eee;margin-left:auto;margin-right:auto;width:95%;padding-top:1.5em;display:<?php echo $display;?>}.project_record.<?php echo $last;?>{clear:both;border-bottom:1px solid #eee;margin-left:auto;margin-right:auto;width:95%;padding-top:1.5em;display:block}</style>

<div id="sort-links">
    <span class="sort-label"><?php echo __('Sort by: '); ?></span>
    <?php echo browse_sort_links($sortLinks); ?>
</div>

<div id="projlist" style="display: contents;"></div>

<div id="aphaOrder" style="display: contents;">
<?php foreach (loop('collections') as $collection): ?>
<?php  
$sort_title = metadata('collection', array('Dublin Core', 'Title'));
$prefix = 'The ';
if (substr($sort_title, 0, strlen($prefix)) == $prefix) {
    $sort_title = substr($sort_title, strlen($prefix));
    $sort_title = "$sort_title (The)";
} 
$sort_title_long = $sort_title;
$sort_title = substr($sort_title, 0, 1);
$sort_title = strtolower($sort_title);
$collection_link = link_to_collection();
$collection_link = str_replace("%3A/",":/",$collection_link); 
$collection_link = str_replace("The ","",$collection_link);
$gallery_url = metadata('collection', array('Dublin Core', 'Identifier'));
$gflag = "?view=gallery";
$gallery_link = "/$gallery_url$gflag";
$gallery_link = "<a href=\"$gallery_link\">View Gallery for this Project</a>";
$show_flag = metadata('collection', array('Project', 'Project Gallery'));

if(!preg_match("/[a-zA-Z]/",$sort_title)) {
    $filler = "a";
    $sort_title = "$filler$sort_title";
}
?>

<?php $count = metadata($collection, 'total_items'); ?>
<div class="project_record <?php echo $sort_title; ?>" data-site="<?php echo $sort_title_long; ?>">

        <span class="proj_img"><img src="<?php echo $coll_img_path;?><?php echo metadata('collection', array('Project', 'Project Code')); ?>.gif" alt="<?php echo metadata('collection', array('Project', 'Project Code')); ?>"/>
        </span>
        <span class="proj_link">
            <h3><?php echo $collection_link ?></h3>
            <br/>
            <?php if (metadata('collection', array('Project', 'Project Code'))): ?>
                <span class="metalabel">Project Code</span>: 
                <?php echo metadata('collection', array('Project', 'Project Code')); ?>
                <br/>
            <?php endif; ?>
            
            <?php if (metadata('collection', array('Project', 'Project Summary'))): ?>
                <span class="metalabel">Description</span>: 
                <?php echo metadata('collection', array('Project', 'Project Summary'), array('snippet'=>150)); ?>
                <br/>
            <?php endif; ?>
            <span class="metalabel">Number of Interviews</span>: <?php echo $count; ?>
                  
            <?php if ($show_flag != "show") {
            // do nothing 
            } else {
            echo "<br/>";
            echo "<br/>";
            echo $gallery_link;
            }
            ?>
            <br/>
            <br/>
        </span>

    <?php fire_plugin_hook('public_collections_browse_each', array('view' => $this, 'collection' => $collection)); ?>

</div>

<!-- end class="collection" -->

<?php endforeach; ?>
</div>

<?php fire_plugin_hook('public_collections_browse', array('collections'=>$collections, 'view' => $this)); ?>

<script type="text/javascript">$(window).load(function(){var alphabeticallyOrderedDivs=$('.project_record').sort(function(a,b){return String.prototype.localeCompare.call($(a).data('site').toLowerCase(),$(b).data('site').toLowerCase())});var container=$("#aphaOrder");container.detach().empty().append(alphabeticallyOrderedDivs);$('#projlist').append(container)});</script>

<?php echo foot(); ?>
