<?php
$collectionTitle = strip_formatting(metadata('collection', array('Dublin Core', 'Title')));
$rights = strip_formatting(metadata('collection', array('Dublin Core', 'Rights')));

    if ($rights === "Restricted") {
        $restriction = "Restrictions";
    } else {
        $restriction = "No Restrictions";
    }
    if (isset($_GET['view'])) {
    $view_string = $_GET['view'];
}
$show_flag = metadata('collection', array('Project', 'Project Gallery'));
if ($show_flag != "show") {
    $noshow = "none";
    $toggle1 = "block";
$toggle2 = "none";
} else {
if ($view_string != "gallery") {
$toggle1 = "block";
$toggle2 = "none";

} elseif ($view_string === "gallery") {
    $toggle1 = "none";
$toggle2 = "block";
    $noshow = "inline-block";
}

}
?>

<?php echo head(array('title'=> $collectionTitle, 'bodyclass' => 'collections show')); ?>

<script type="text/javascript">$(window).load(function(){var alphabeticallyOrderedDivs=$('.divInt').sort(function(a,b){return String.prototype.localeCompare.call($(a).data('site').toLowerCase(),$(b).data('site').toLowerCase())});var container=$("#aphaOrder");container.detach().empty().append(alphabeticallyOrderedDivs);$('#intlist').append(container)});</script>

<script type="text/javascript">$(window).load(function(){var alphabeticallyOrderedDivs=$('.splashitem').sort(function(a,b){return String.prototype.localeCompare.call($(a).data('site').toLowerCase(),$(b).data('site').toLowerCase())});var container=$("#aphaOrderg");container.detach().empty().append(alphabeticallyOrderedDivs);$('#gallist').append(container)});</script>

<div id="mainFrameOne" style="display:<?php echo $toggle1; ?>;">
    <div style="width:95%;display:<?php echo $noshow; ?>"><p style="float:right;margin: 0 0 0 0;"><a href="/<?php echo metadata('collection', array('Dublin Core', 'Identifier')); ?>?view=gallery">gallery view</a></p></div>
    <h1><?php echo $collectionTitle; ?></h1>
         
<?php // echo all_element_texts('collection'); ?>

<div class="element-set">
    
<!-- display Project Summary if available -->

<?php if(metadata('collection', array('Project', 'Project Summary'))): ?>
        <div id="project-project-summary" class="element"><div class="divTable">
    <div class="divTableBody">
    <div class="divTableRow">
        <div class="divTableCell" style="border-bottom: 0px !important;"><h3>Project Summary</h3><?php echo metadata('collection', array('Project', 'Project Summary')); ?></div></div></div></div></div>
<?php endif; ?>

<!-- display Project Code if available -->

<?php if(metadata('collection', array('Project', 'Project Code'))): ?>
        <div id="project-project-code" class="element-horizontal"><div class="divTable">
    <div class="divTableBody">
    <div class="divTableRow">
        <div class="divTableCell" style="border-bottom: 0px !important;"><h3>Project Code</h3></div><div class="divTableCell" style="border-bottom: 0px !important;"><?php echo metadata('collection', array('Project', 'Project Code')); ?></div></div></div></div></div>
<?php endif; ?>

<!-- display Project Keywords if available -->

<?php if ($projkeyword = metadata('collection', array('Project', 'Project Keyword'), array('delimiter'=>'&nbsp;&nbsp;&nbsp;'))): ?>
<div class="project-project-keyword" class="element"><div class="divTable">
    <div class="divTableBody">
    <div class="divTableRow">
        <div class="divTableCell" style="border-bottom: 0px !important;"><h3>Project Keyword</h3>
<?php echo $projkeyword; ?></div></div></div>
</div></div>
<?php endif; ?>

<!-- display Project LC Subjects if available -->

<?php if ($projsubject = metadata('collection', array('Project', 'Project LC Subject'), array('delimiter'=>'&nbsp;&nbsp;&nbsp;'))): ?>
<div class="project-project-keyword" class="element"><div class="divTable">
    <div class="divTableBody">
    <div class="divTableRow">
        <div class="divTableCell" style="border-bottom: 0px !important;"><h3>Project LC Subject</h3>
<?php echo $projsubject; ?></div></div></div>
</div></div>
<?php endif; ?>

<!-- display Related Projects if available -->

<?php if ($relprojs = metadata('collection', array('Project', 'Related Projects'), array('delimiter'=>'<br/><br/>'))): ?>
<div class="project-related-projects" class="element"><div class="divTable">
    <div class="divTableBody">
    <div class="divTableRow">
        <div class="divTableCell" style="border-bottom: 0px !important;"><h3>Related Projects</h3>
        <div id="datalist">
<?php echo $relprojs; ?>
</div>
<?php if (count(metadata('collection', array('Project', 'Related Projects'), array('all' => true))) > 1): ?>

<span id="show_more">show more</span>

<?php endif; ?>

</div></div></div>
</div></div>
<?php endif; ?>

</div>

    <!-- start collection-items -->

    <br/><br/>

        <?php include 'interviews.php';?>  

</div></div>
<div id="mainFrameTwo" style="display:<?php echo $toggle2; ?>;">
        <div style="width:95%;display:<?php echo $noshow; ?>"><p style="float:right;margin: 0 0 0 0;"><a href="/<?php echo metadata('collection', array('Dublin Core', 'Identifier')); ?>">about the project</a></p></div>
    <h1><?php echo $collectionTitle; ?></h1>
    <br/>

        <?php include 'gallery.php';?>
        
    </div>
    <br/>    
    
    <!-- end collection-items -->

<br/>
<br/>

<div style="width: 95%;margin-left: 2.5%;">
<?php
echo get_specific_plugin_hook_output('SocialBookmarking', 'public_collections_show', array('view' => $this, 'collection' => $collection));
?>
</div>
</div>

<?php
echo get_specific_plugin_hook_output('LoggedInLinks', 'public_collections_show', array('view' => $this, 'collection' => $collection));
?>

<script type="text/javascript">$(function(){$('#show_more').click(function(){$('#datalist a:hidden').slice(0,10).show();if($('#datalist a').length==$('#datalist a:visible').length){$('#show_more').hide();$('#datalist br').show()}})});</script>

<?php echo foot(); ?>
