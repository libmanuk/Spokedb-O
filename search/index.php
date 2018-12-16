<?php
$pageTitle = __('Search') . ' ' . __('(%s total)', $total_results);
echo head(array('title' => $pageTitle, 'bodyclass' => 'search'));
$searchRecordTypes = get_search_record_types();
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$variable = '/&Page=[0-9]+/i';
$empty = "";
// only collections in search results
$collections_search_link = str_replace("&record_types%5B%5D=Collection","",$actual_link);
$collections_search_link = str_replace("5B1","5B",$collections_search_link);
$collections_search_link = str_replace("5B0","5B",$collections_search_link);
$collections_search_link = str_replace("&record_types%5B%5D=Item","",$collections_search_link);
$collections_search_link=preg_replace($variable, "", $collections_search_link); 
$collections_search_link = str_replace("&query_type=keyword","&query_type=keyword&record_types%5B%5D=Collection",$collections_search_link);
$collections_search_link = str_replace("&query_type=exact_match","&query_type=exact_match&record_types%5B%5D=Collection",$collections_search_link);
// only interviews in search results
$interviews_search_link = str_replace("&record_types%5B%5D=Collection","",$actual_link);
$interviews_search_link = str_replace("5B1","5B",$interviews_search_link);
$interviews_search_link = str_replace("5B0","5B",$interviews_search_link);
$interviews_search_link = str_replace("&record_types%5B%5D=Item","",$interviews_search_link);
$interviews_search_link=preg_replace($variable, "", $interviews_search_link); 
$interviews_search_link = str_replace("&query_type=keyword","&query_type=keyword&record_types%5B%5D=Item",$interviews_search_link);
$interviews_search_link = str_replace("&query_type=exact_match","&query_type=exact_match&record_types%5B%5D=Item",$interviews_search_link);
// all results
$all_search_link = str_replace("&record_types%5B%5D=Collection","",$actual_link);
$all_search_link = str_replace("5B1","5B",$all_search_link);
$all_search_link = str_replace("5B0","5B",$all_search_link);
$all_search_link = str_replace("&record_types%5B%5D=Item","",$all_search_link);
$all_search_link=preg_replace($variable, "", $all_search_link); 
$all_search_link = str_replace("&query_type=keyword","&query_type=keyword&record_types%5B%5D=Item&record_types%5B%5D=Collection",$all_search_link);
$all_search_link = str_replace("&query_type=exact_match","&query_type=exact_match&record_types%5B%5D=Item&record_types%5B%5D=Collection",$all_search_link);
if (isset($_GET['query'])) {
    $query_string = $_GET['query'];
}

?>

<?php if ($total_results): ?>
    <?php 
        if (strpos($actual_link, 'Project%20Group') == false) {

        echo "<h1>$pageTitle</h1>";
        // echo search_filters();
        } 
    ?>
    <?php if (strpos($actual_link, 'sort_field=title') == false): ?>
   
    <div id="results_filter">
        <?php echo "<p><b>results for search</b>: <i>$query_string</i></p>"; ?>
        <form action="../">
            <fieldset>
                all results: <input type="RADIO" name="userChoice" id="navRadio01" onclick="window.location='<?php echo $all_search_link ?>'">
                &nbsp;&nbsp;&nbsp;projects only: <input type="RADIO" name="userChoice" id="navRadio02"  onclick="window.location='<?php echo $collections_search_link ?>'">
                &nbsp;&nbsp;&nbsp;interviews only: <input type="RADIO" name="userChoice" id="navRadio02"  onclick="window.location='<?php echo $interviews_search_link ?>'">
            </fieldset>
        </form>
    </div>

    <?php endif; ?>

    <?php echo pagination_links(); ?>

<div class="browse_results">

    <?php 
        if (strpos($actual_link, 'Project%20Group') !== false) {
            include 'projects.php';
        } 
    ?>

<script type="text/javascript">
    $(window).load(function(){
        var alphabeticallyOrderedDivs = $('.resHit').sort(function(b, a) {
			return String.prototype.localeCompare.call($(a).data('site').toLowerCase(), $(b).data('site').toLowerCase());
		});
        var container = $("#aphaOrder");
        container.detach().empty().append(alphabeticallyOrderedDivs);
        $('#reslist').append(container);
    });
</script>

    <div id="reslist" style="display: contents;"></div>
        <div id="aphaOrder" style="display: contents;">
        
        <?php $filter = new Zend_Filter_Word_CamelCaseToDash; ?>
        <?php foreach (loop('search_texts') as $searchText): ?>
        <?php $record = get_record_by_id($searchText['record_type'], $searchText['record_id']); ?>
        <?php $recordType = $searchText['record_type']; ?>
        <?php set_current_record($recordType, $record); ?>
        <!--<span class="<?php echo strtolower($filter->filter($recordType)); ?>">-->
        
        <?php if ('Item' === $recordType): ?>

            <?php $suppressed = metadata('item', array('Suppression', 'Suppressed -Suppress description'));
            $suppressed = strip_formatting($suppressed);
            $supsubstr = preg_replace('/\s+/', '', $suppressed);
            $chksupsubstr = "Description suppressed: Yes";
            $chksupsubstr = preg_replace('/\s+/', '', $chksupsubstr);
            $project = get_collection_for_item();
            ?>

                <?php $recordurl = record_url($record, 'show');
                $recordurl = str_replace("%3A/",":/",$recordurl); 
                $projectlink = link_to_collection_for_item();
                $collectionlink = link_to_collection_for_item();
                $collectionlink = str_replace("%3A/",":/",$collectionlink); ?>
                
            <?php //check for suppressed record set to public view ?>
            
            <?php if (strpos($supsubstr, $chksupsubstr) !== false): ?>
                <div class="divTable">
                    <div class="divTableBody">
                        <div class="divTableRow" style="border-bottom: 0px solid #fff;"><div class="divTableCell" style="border-bottom: 0px solid #fff;display:none;"><!-- Nothing to see here, move along, these are not the droids you are looking for. --></div></div>
                        <div class="divTableRow" style="border-bottom: 0px solid #fff;display:none;">
                            <div class="divTableCell" style="border-bottom: 0px solid #fff;display:none;">      
                            </div>
                            <div class="divTableCell" style="border-bottom: 0px solid #fff;display:none;">
                                <br/><br/>
            <?php else: ?> 
            <?php 
            $spec_title = strip_formatting(metadata('item', array('Dublin Core', 'Title')));
            if (preg_match('/'.$query_string.'/i',$spec_title)):
            ?>
            
                <div class="resHit" data-site="aaaa">
                    <div class="divTable">
                        <div class="divTableBody">
                            <div class="divTableRow"><div class="divTableCell" style="border-bottom: 0px !important;"><h3><a href="<?php echo $recordurl ?>"><?php echo $searchText['title'] ? $searchText['title'] : '[Unknown]'; ?></a></h3>
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
                                <?php if (metadata('item', array('General', 'Interview Accession'))): ?>
                                    <span class="metalabel">Interview Accession Number</span>: <?php echo metadata('item', array('General', 'Interview Accession')); ?>
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
                                        $int_restriction = "Restrictions Apply";
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
                                        $int_online = "<a href=\"$recordurl\">$int_online</a>";
                                    }
                                ?>
                                    <span class="metalabel">Access</span>: <?php echo $int_online; ?>
<br/><br/>

            <?php else: ?> 

                <div class="resHit" data-site="">
                    <div class="divTable">
                        <div class="divTableBody">
                            <div class="divTableRow"><div class="divTableCell" style="border-bottom: 0px !important;"><h3><a href="<?php echo $recordurl ?>"><?php echo $searchText['title'] ? $searchText['title'] : '[Unknown]'; ?></a></h3>
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
                                    <?php if (metadata('item', array('General', 'Interview Accession'))): ?>
                                    <span class="metalabel">Interview Accession Number</span>: <?php echo metadata('item', array('General', 'Interview Accession')); ?>
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
                                            $int_restriction = "Restrictions Apply";
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
                                            $int_online = "<a href=\"$recordurl\">$int_online</a>";
                                            }
                                    ?>
                                    <span class="metalabel">Access</span>: <?php echo $int_online; ?>
<br/><br/>        

                    <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>

        <?php if ('Collection' === $recordType): ?>

            <?php 
                $spec_title_coll = strip_formatting(metadata('collection', array('Dublin Core', 'Title')));
                if (preg_match('/'.$query_string.'/i',$spec_title_coll)):
            ?>

                <div class="resHit" data-site="aaaa">
                    <div class="divTable">
                        <div class="divTableBody">
                            <?php $recordurl = record_url($record, 'show');
                                $recordurl = str_replace("%3A/",":/",$recordurl); ?>
                            <div class="divTableRow"><div class="divTableCell" style="border-bottom: 0px !important;"><h3><a href="<?php echo $recordurl ?>"><?php echo $searchText['title'] ? $searchText['title'] : '[Unknown]'; ?></a></h3></div></div>
                            <div class="divTableRow">
                                <div class="divTableCell">
<span>

                                    <?php if (metadata('collection', array('Project', 'Project Code'))); ?>
                                        <span class="metalabel">Project Code</span>: <?php echo metadata('collection', array('Project', 'Project Code')); ?></span>

<br/><br/>

            <?php else: ?> 

                <div class="resHit" data-site="">
                    <div class="divTable">
                        <div class="divTableBody">
                            <?php $recordurl = record_url($record, 'show');
                                $recordurl = str_replace("%3A/",":/",$recordurl); ?>
                            <div class="divTableRow"><div class="divTableCell" style="border-bottom: 0px !important;"><h3><a href="<?php echo $recordurl ?>"><?php echo $searchText['title'] ? $searchText['title'] : '[Unknown]'; ?></a></h3></div></div>
                            <div class="divTableRow">
                                <div class="divTableCell">

<!-- <span> -->

                                    <?php if (metadata('collection', array('Project', 'Project Code'))); ?>
                                    <span class="metalabel">Project Code</span>: <?php echo metadata('collection', array('Project', 'Project Code')); ?></span>

<br/><br/>

        <?php endif; ?>

    <?php endif; ?>

                </div>

<!-- </span> -->
        
                    </div>
                        </div>
                            </div>
                                </div>               
        <?php endforeach; ?>
            </div>

    </div>

<?php echo pagination_links(); ?>

<?php else: ?>

    <div id="no-results">
        <p><?php echo __('Your query returned no results.');?></p>
    </div>

<?php endif; ?>  

<?php echo foot(); ?>
