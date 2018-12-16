<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'items show')); ?>

<?php 
$suppressed = metadata('item', array('Suppression', 'Suppressed -Suppress description'));
$suppressed = strip_formatting($suppressed);
$supsubstr = preg_replace('/\s+/', '', $suppressed);
$chksupsubstr = "Description suppressed: Yes";
$chksupsubstr = preg_replace('/\s+/', '', $chksupsubstr);
$ark = metadata('item', array('Dublin Core', 'Identifier'));
$ark = strip_formatting($ark);
$persistent_link = "https://kentuckyoralhistory.org/$ark";
$collectionlink = link_to_collection_for_item();
$collectionlink = str_replace("%3A/",":/",$collectionlink); 
if (strpos($collectionlink, 'ark:/16417') == false) {
    $collectionlink = str_replace("/xt7","/ark:/16417/xt7",$collectionlink);
}
$next_item_link = link_to_next_item_show();
$next_item_link = str_replace("%3A/",":/",$next_item_link);
$prev_item_link = link_to_previous_item_show();
$prev_item_link = str_replace("%3A/",":/",$prev_item_link);
$rights = strip_formatting(metadata('item', array('Dublin Core', 'Rights')));
if ($rights === "Restricted") {
   $restriction = "Restrictions";
} else {
   $restriction = "No Restrictions";
}
?>

<?php if (strpos($supsubstr, $chksupsubstr) !== false): ?>

    <p>SORRY, THIS PAGE CANNOT BE FOUND.</p>

<?php else: ?> 

<!--  put in check for whether record is suppressed and if it is, no display -->

<div id="primary">
    <div id="container">
        <div class="divTable">
            <div class="divTableBody">
                <div class="divTableRow">
                    <div class="divTableCell" style="border-bottom: 0px;">
                        <div>
                            <h1><?php echo metadata('item', array('Dublin Core','Title')); ?></h1>

    <?php if(metadata('item','Collection Name')): ?>
                            <h3><?php echo __('Project'); ?>: <?php echo $collectionlink ?></h3>
    <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>



<?php $restricted = metadata('item', array('Dublin Core', 'Rights')); ?>

        <div id="tabs-container">
            <ul class="tabs-menu">
                <li class="current"><a href="#tab-1">Description</a></li>

    <?php if(metadata('item', array('OHMS', 'OHMS Object')) && ('Unrestricted' === $restricted || NULL === $restricted )): ?>
        <li><a href="#tab-2">Play Interview</a></li>
    <?php endif; ?>

<?php if (metadata('item', 'has files') && ('Unrestricted' === $restricted || NULL === $restricted )): ?>
<!--<li><a href="#tab-4">Images</a></li>-->
<?php endif; ?>

                <li><a href="#tab-3">Rights & Request</a></li>
                <li><a href="#tab-5">Citation</a></li>
            </ul>

            <div class="tab">
                <div id="tab-1" class="tab-content">

                <!-- Interviews metadata -->

    <?php if ('Unrestricted' === $restricted || NULL === $restricted ): ?>

                <!-- echo all interviews for unrestricted records -->

    <?php // echo all_element_texts('item'); ?>
    
    
    <!-- display Interview Summary if available -->

<?php if(metadata('item', array('Description', 'Interview Summary'))): ?>
        <div id="description-interview-summary" class="element"><div class="divTable">
    <div class="divTableBody">
    <div class="divTableRow">
        <div class="divTableCell" style="border-bottom: 0px !important;"><h3>Interview Summary</h3><?php echo metadata('item', array('Description',  'Interview Summary')); ?></div></div></div></div></div>
<?php endif; ?>

<!-- display Interview Accession if available -->

<?php if(metadata('item', array('General', 'Interview Accession'))): ?>
        <div id="general-interview-accession" class="element-horizontal"><div class="divTable">
    <div class="divTableBody">
    <div class="divTableRow">
        <div class="divTableCell" style="border-bottom: 0px !important;"><h3>Interview Accession</h3></div><div class="divTableCell" style="border-bottom: 0px !important;"><?php echo metadata('item', array('General', 'Interview Accession')); ?></div></div></div></div></div>
<?php endif; ?>

<!-- display Interviewee Name if available -->

<?php if ($interviewees = metadata('item', array('General', 'Interviewee Name'), array('delimiter'=>'<br/><br/>'))): ?>
<div class="general-interviewee-name" class="element"><div class="divTable">
    <div class="divTableBody">
    <div class="divTableRow">
        <div class="divTableCell" style="border-bottom: 0px !important;"><h3>Interviewee Name</h3></div><div class="divTableCell" style="border-bottom: 0px !important;">
<?php echo $interviewees; ?></div></div></div>
</div></div>
<?php endif; ?>

<!-- display Interviewer if available -->

<?php if ($interviewers = metadata('item', array('General', 'Interviewer Name'), array('delimiter'=>'<br/><br/>'))): ?>
<div class="general-interviewer-name" class="element"><div class="divTable">
    <div class="divTableBody">
    <div class="divTableRow">
        <div class="divTableCell" style="border-bottom: 0px !important;"><h3>Interviewer Name</h3></div><div class="divTableCell" style="border-bottom: 0px !important;">
<?php echo $interviewers; ?></div></div></div>
</div></div>
<?php endif; ?>


<!-- display Interview Date if available -->

<?php if(metadata('item', array('General', 'Interview Date'))): ?>
        <div id="general-interview-date" class="element-horizontal"><div class="divTable">
    <div class="divTableBody">
    <div class="divTableRow">
        <div class="divTableCell" style="border-bottom: 0px !important;"><h3>Interview Date</h3></div><div class="divTableCell" style="border-bottom: 0px !important;"><?php echo metadata('item', array('General', 'Interview Date')); ?></div></div></div></div></div>
<?php endif; ?>



<!-- display Interview Partial Date if available -->

<?php if(metadata('item', array('General', 'Interview Partial Date'))): ?>
        <div id="general-interview-partial-date" class="element-horizontal"><div class="divTable">
    <div class="divTableBody">
    <div class="divTableRow">
        <div class="divTableCell" style="border-bottom: 0px !important;"><h3>Interview Partial Date</h3></div><div class="divTableCell" style="border-bottom: 0px !important;"><?php echo metadata('item', array('General', 'Interview Partial Date')); ?></div></div></div></div></div>
<?php endif; ?>

<!-- display Interview Keywords if available -->

<?php if ($intkeyword = metadata('item', array('Description', 'Interview Keyword'), array('delimiter'=>'&nbsp;&nbsp;&nbsp;'))): ?>
<div class="description-interview-keyword" class="element"><div class="divTable">
    <div class="divTableBody">
    <div class="divTableRow">
        <div class="divTableCell" style="border-bottom: 0px !important;"><h3>Interview Keyword</h3>
<?php echo $intkeyword; ?></div></div></div>
</div></div>
<?php endif; ?>


<!-- display Interview LC Subjects if available -->

<?php if ($intsubject = metadata('item', array('Description', 'Interview LC Subject'), array('delimiter'=>'&nbsp;&nbsp;&nbsp;'))): ?>
<div class="description-interview-lc-subject" class="element"><div class="divTable">
    <div class="divTableBody">
    <div class="divTableRow">
        <div class="divTableCell" style="border-bottom: 0px !important;"><h3>Interview LC Subject</h3>
<?php echo $intsubject; ?></div></div></div>
</div></div>
<?php endif; ?>

<!-- display Interview Rights if available -->

<?php if(metadata('item', array('Rights', 'Interview Rights'))): ?>
        <div id="rights-interview-rights" class="element"><div class="divTable">
    <div class="divTableBody">
    <div class="divTableRow">
        <div class="divTableCell" style="border-bottom: 0px !important;"><h3>Interview Rights</h3><?php echo metadata('item', array('Rights', 'Interview Rights')); ?></div></div></div></div></div>
<?php endif; ?>

<!-- display Interview Usage if available -->

<?php if(metadata('item', array('Rights', 'Interview Usage'))): ?>
        <div id="rights-interview-usage" class="element"><div class="divTable">
    <div class="divTableBody">
    <div class="divTableRow">
        <div class="divTableCell" style="border-bottom: 0px !important;"><h3>Interview Usage</h3><?php echo metadata('item', array('Rights', 'Interview Usage')); ?></div></div></div></div></div>
<?php endif; ?>



<!-- display Linked Resource if available -->


<?php if ($linkres = metadata('item', array('Links', 'Linked Resource'), array('delimiter'=>'<br/><br/>'))): ?>
<div class="links-linked-resource" class="element"><div class="divTable">
    <div class="divTableBody">
    <div class="divTableRow">
        <div class="divTableCell" style="border-bottom: 0px !important;"><h3>Linked Resource</h3>
<?php echo $linkres; ?></div></div></div>
</div></div>
<?php endif; ?>

    <?php else: ?> 
        
                <!-- put in code for only displaying specific fields for record if restricted status -->

                <!-- allowable fields for restricted records are: accession, interviewer, interviewee, title, project, restriction flag -->
        <?php if(metadata('item', array('General', 'Interview Accession'))): ?>
        <div id="general-interview-accession" class="element-horizontal"><div class="divTable">
    <div class="divTableBody">
    <div class="divTableRow">
        <div class="divTableCell" style="border-bottom: 0px !important;"><h3>Interview Accession</h3></div><div class="divTableCell" style="border-bottom: 0px !important;"><?php echo metadata('item', array('General', 'Interview Accession')); ?></div></div></div></div></div>
            <?php endif; ?>
            <?php if(metadata('item', array('General', 'Interviewee Name'))): ?>
                        <div id="general-interviewee-name" class="element-horizontal"><div class="divTable">
    <div class="divTableBody">
    <div class="divTableRow">
        <div class="divTableCell" style="border-bottom: 0px !important;"><h3>Interviewee Name</h3></div><div class="divTableCell" style="border-bottom: 0px !important;"><?php echo metadata('item', array('General', 'Interviewee Name')); ?></div></div></div></div></div>    
                    
            <?php endif; ?>
            <?php if(metadata('item', array('General', 'Interviewer Name'))): ?>
        <div id="general-interviewer-name" class="element-horizontal"><div class="divTable">
    <div class="divTableBody">
    <div class="divTableRow">
        <div class="divTableCell" style="border-bottom: 0px !important;"><h3>Interviewer Name</h3></div><div class="divTableCell" style="border-bottom: 0px !important;"><?php echo metadata('item', array('General', 'Interviewer Name')); ?></div></div></div></div></div>
            <?php endif; ?>
            
                    <?php endif; ?> 


                
                
                
                <!-- display Restriction if available -->

<?php if(metadata('item', array('Dublin Core', 'Rights'))): ?>
        <div id="dc-rights" class="element-horizontal"><div class="divTable">
    <div class="divTableBody">
    <div class="divTableRow">
        <div class="divTableCell" style="border-bottom: 0px !important;"><h3>Restriction</h3></div><div class="divTableCell" style="border-bottom: 0px !important;"><?php echo $restriction; ?></div></div></div></div></div>
<?php endif; ?>
                
                
                
                
        </div>
        
        <div id="tab-2" class="tab-content">
            
        <?php if(metadata('item', array('OHMS', 'OHMS Object'))): ?>
        
        <br/>
        <br/>

<?php // endif; ?>

        <span id="intframe">
        
            <?php echo metadata('item', array('OHMS', 'OHMS Object')); ?>

        </span>
        
        <?php endif; ?>
        
        </div>
        
        <div id="tab-3" class="tab-content">

        <?php
            echo get_specific_plugin_hook_output('SimpleCart', 'public_items_show', array('view' => $this, 'item' => $item));
        ?>
        
        </div>

        <?php if (metadata('item', 'has files')): ?>
        
        <div id="tab-4" class="tab-content">
               <h3></h3>
                    <div id="item-images">
            <?php $item_files = files_for_item(
                array(
               'linkAttributes' => array('rel' => 'data-lity')
                )
            );
                $item_files = str_replace("rel=\"data-lity\"","data-lity",$item_files);
                echo $item_files;
            ?>
        
                    </div>
        </div>
   
        <?php endif; ?>
        
        <div id="tab-5" class="tab-content">
<?php include 'citation.php'; ?>
        </div>
   
    </div>
    </div>

    <br/>
    <br/>
    <br/>

<!-- The following prints a citation for this item. -->



    <br/>
    <p>Persistent Link for this Record: <a href="<? echo $persistent_link ?>"><? echo $persistent_link ?></a></p>
    <br/>
    
<!-- The following prints a list of all tags associated with the item -->

    <?php if (metadata('item','has tags')): ?>
    <div id="item-tags" class="element">
        <h3><?php echo __('Tags'); ?></h3>
        <div class="element-text"><?php echo tag_string('item'); ?></div>
    </div>
<?php endif; ?>    

       <?php // fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>
<?php
echo get_specific_plugin_hook_output('SocialBookmarking', 'public_items_show', array('view' => $this, 'item' => $item));
?>

    <ul class="item-pagination navigation">
        <li id="previous-item" class="previous"><?php echo $prev_item_link ?></li>
        <li id="next-item" class="next"><?php echo $next_item_link ?></li>
    </ul>

</div> 

<!-- End of Primary. -->

</div>
</div>
<?php endif; ?> 

<?php
echo get_specific_plugin_hook_output('LoggedInLinks', 'public_items_show', array('view' => $this, 'item' => $item));
?>



 <?php echo foot(); ?>
