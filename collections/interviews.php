<div id="collection-items">
    <h2>Interviews in this Project (<?php $num = count($items);
        echo $num; ?> Total):</h2>
    <?php if (metadata('collection', 'total_items') > 0): ?>

            <div id="intlist" style="display: contents;"></div>
                <div id="aphaOrder" style="display: contents;">

                <?php foreach (loop('items') as $item): ?>
                <?php $itemTitle = strip_formatting(metadata('item', array('Dublin Core', 'Title'))); 
                $int_interviewee = strip_formatting(metadata('item', array('General', 'Interviewee Name')));

                $suppressed = metadata('item', array('Suppression', 'Suppressed -Suppress description'));
                $suppressed = strip_formatting($suppressed);
                $supsubstr = preg_replace('/\s+/', '', $suppressed);
                $chksupsubstr = "Description suppressed: Yes";
                $chksupsubstr = preg_replace('/\s+/', '', $chksupsubstr);

                ?>
                
                <?php if (strpos($supsubstr, $chksupsubstr) !== false): ?>

    <!-- Nothing to see here, move along, these are not the droids you are looking for. -->

<?php else: ?> 
                
                <div class="divInt" data-site="<?php echo metadata('item', array('General','Interview Accession')); ?>">
                    <div class="divTable">
                        <div class="divTableBody">
                            <div class="divTableRow">
                                <div class="divTableCell" style="border-bottom: 0px !important;">
        <?php 
        $int_link = link_to_item($itemTitle, array('class'=>'permalink'));
        $int_link = str_replace("%3A/",":/",$int_link);
            if (strpos($int_link, 'ark:/16417') == false) {
                $int_link = str_replace("/xt7","/ark:/16417/xt7",$int_link);
            }
        echo "<h3>$int_link</h3>";

        $int_rights = strip_formatting(metadata('item', array('Dublin Core', 'Rights')));
        if ($int_rights === "Restricted") {
        $int_restriction = "Restrictions Apply";
        } else {
        $int_restriction = "No Restrictions";
        }
        $int_online = strip_formatting(metadata('item', array('OHMS', 'OHMS Object')));
        $int_accession = strip_formatting(metadata('item', array('General', 'Interview Accession')));
        $online_label = "<span class=\"online_flag\">Online</span>";
        if ($int_online != NULL) {
        $int_online = link_to_item($online_label, array('class'=>'permalink'));
        $int_online = str_replace("%3A/",":/",$int_online);
            if (strpos($int_online, 'ark:/16417') == false) {
                $int_online = str_replace("/xt7","/ark:/16417/xt7",$int_online);
            }
        } else {
        $int_online = "Available By Request";
        $int_online = link_to_item($int_online, array('class'=>'permalink'));
        $int_online = str_replace("%3A/",":/",$int_online);
            if (strpos($int_online, 'ark:/16417') == false) {
                $int_online = str_replace("/xt7","/ark:/16417/xt7",$int_online);
            }
        }
        ?>
                
                    </div>
                </div>
                <div class="divTableRow">
                            <div class="divTableCell"> 
                            <span class="metalabel">Interview Accession Number</span>: <?php echo metadata('item', array('General','Interview Accession')); ?><br/>
                            <span class="metalabel">Interviewer</span>: <?php echo metadata('item', array('General','Interviewer Name')); ?>
                </div>
                            <div class="divTableCell">
                            <span class="metalabel">Restrictions</span>: <?php echo $int_restriction ?>
                            <br/>
                            <span class="metalabel">Access</span>: <?php echo $int_online ?>
                            </div>
    </div>
    </div>
    </div>
    </div>
    
    <?php endif; ?>
    
        <?php endforeach; ?>

    <?php else: ?>
        <p><?php echo __("There are currently no items within this collection."); ?></p>
    <?php endif; ?>
</div>



