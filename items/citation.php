<?php
$int_date = metadata('item', array('General', 'Interview Date'));
$int_part_date = metadata('item', array('General', 'Interview Partial Date'));
if (isset($int_date)) {
$date_array = str_split($int_date);
$int_year = $date_array[0] . $date_array[1] . $date_array[2] . $date_array[3];
$int_mon = $date_array[5] . $date_array[6];
$monthObj   = DateTime::createFromFormat('!m', $int_mon);
$monthNameMLA = $monthObj->format('M'); 
$monthName = $monthObj->format('F');
$int_day = $date_array[8] . $date_array[9];
} else if (isset($int_part_date)) {
    
}

$interviewee = (metadata('item', array('General', 'Interviewee Name')));
$interviewee = trim($interviewee);
$interviewee = preg_replace('/"(.*)"/', '', $interviewee);
$interviewee = preg_replace("([0-9]+)", "2000", $interviewee);
$interviewee = str_replace("  "," ",$interviewee);

if (strpos($interviewee, ", Sr.") !== false) {
    $interviewee_spec_part = ", Sr.";
    $interviewee = str_replace(", Sr.","",$interviewee);
} elseif (strpos($interviewee, ", Jr.") !== false) {
    $interviewee_spec_part = ", Jr.";
    $interviewee = str_replace(", Jr.","",$interviewee);
} elseif (strpos($interviewee, " (Pseudonym)") !== false) {
    $interviewee_spec_part = " (Pseudonym)";
    $interviewee = str_replace(" (Pseudonym)","",$interviewee);
}

$interviewee_array = explode(" ",$interviewee);
$intee_count = count($interviewee_array);

$interviewer = (metadata('item', array('General', 'Interviewer Name')));
$interviewer = trim($interviewer);

$interviewer = preg_replace('/"(.*)"/', '', $interviewer);

$interviewer = str_replace("  "," ",$interviewer);
$interviewer_array = explode(" ",$interviewer);
$inter_count = count($interviewer_array);
$interviewee = trim($interviewee);
$interviewee = str_replace("  "," ",$interviewee);
//$space_count = substr_count($interviewee, ' ');
//echo $interviewee;
//echo $interviewer;
//echo $intee_count;
//echo $inter_count;
//pattern 5 = 2 1 2
if ($inter_count === 5) {
    $interviewer_chic = $interviewer_array[0] . " " . $interviewer_array[1] . " " . $interviewer_array[2] . " " . $interviewer_array[3];
    $interviewer_mla = $interviewer_array[0] . " " . $interviewer_array[1] . " " . $interviewer_array[2] . " " . $interviewer_array[3];
    $interviewer_apa = substr($interviewer_array[0], 0,1) . ". " . substr($interviewer_array[1], 0,1) . ". " . substr($interviewer_array[2], 0,1). " " . $interviewer_array[3];
} else if ($inter_count === 4) {
    $interviewer_chic = $interviewer_array[0] . " " . $interviewer_array[1] . " " . $interviewer_array[2] . " " . $interviewer_array[3];
    $interviewer_mla = $interviewer_array[0] . " " . $interviewer_array[1] . " " . $interviewer_array[2] . " " . $interviewer_array[3];
    $interviewer_apa = substr($interviewer_array[0], 0,1) . ". " . substr($interviewer_array[1], 0,1) . ". " . substr($interviewer_array[2], 0,1). " " . $interviewer_array[3];

} else if ($inter_count === 3) {
    $interviewer_chic = $interviewer_array[0] . " " . $interviewer_array[1] . " " . $interviewer_array[2];
    $interviewer_mla = $interviewer_array[0] . " " . $interviewer_array[1] . " " . $interviewer_array[2];
    $interviewer_apa = substr($interviewer_array[0], 0,1) . ". " . substr($interviewer_array[1], 0,1) . ". " . $interviewer_array[2];
} else if ($inter_count === 2) {
    $interviewer_chic = $interviewer_array[0] . " " . $interviewer_array[1] . " ";
    $interviewer_mla = $interviewer_array[0] . " " . $interviewer_array[1] . " ";
        $interviewer_apa = substr($interviewer_array[0], 0,1) . ". " . $interviewer_array[1];
} else {
    //do nothing
}

if ($intee_count === 5) {
    $interviewee_chic = $interviewee_array[3] . " " . $interviewee_array[4] . ", " . $interviewee_array[0] . " " . $interviewee_array[1] . " " . $interviewee_array[2];
    $interviewee_apa = $interviewee_array[3] . " " . $interviewee_array[0][0] . "." . $interviewee_array[2][0] . ". ";
    $interviewee_mla = $interviewee_array[3] . " " . $interviewee_array[4] . " " . $interviewee_array[0] . " " . $interviewee_array[2] . " ";
} else if ($intee_count === 4) {
    $interviewee_chic = $interviewee_array[3] . ", " . $interviewee_array[0] . " " . $interviewee_array[1] . " " . $interviewee_array[2];
    $interviewee_apa = $interviewee_array[3] . ", " . $interviewee_array[0][0] . "." . $interviewee_array[1][0] . ".";
    $interviewee_mla = $interviewee_array[3] . ", " . $interviewee_array[0] . " " . $interviewee_array[1] . " " . $interviewee_array[2] . " ";
} else if ($intee_count === 3) {
    $interviewee_chic = $interviewee_array[2] . ", " . $interviewee_array[0] . " " . $interviewee_array[1];
    $interviewee_apa = $interviewee_array[2] . ", " . $interviewee_array[0][0] . "." . $interviewee_array[1][0] . ". ";
    $interviewee_mla = $interviewee_array[2] . ", " . $interviewee_array[0] . " " . $interviewee_array[1] . " ";
} else if ($intee_count === 2) {
    $interviewee_chic = $interviewee_array[1] . ", " . $interviewee_array[0];
    $interviewee_apa = $interviewee_array[1] . ", " . $interviewee_array[0][0] . ". ";
    $interviewee_mla = $interviewee_array[1] . ", " . $interviewee_array[0] . " ";
} else {
    //do nothing
}

$interviewee_chic = rtrim( $interviewee_chic, " " );
$interviewee_chic = str_replace("..",".",$interviewee_chic);
$interviewee_chic = str_replace(" .",".",$interviewee_chic);

$interviewee_apa = rtrim( $interviewee_apa, " " );
$interviewee_apa = str_replace("..",".",$interviewee_apa);
$interviewee_apa = str_replace(" .",".",$interviewee_apa);

$interviewee_mla = rtrim( $interviewee_mla, " " );
$interviewee_mla = str_replace("..",".",$interviewee_mla);
$interviewee_mla = str_replace(" .",".",$interviewee_mla);

$interviewer_chic = rtrim( $interviewer_chic, " " );
$interviewer_chic = str_replace("..",".",$interviewer_chic);
$interviewer_chic = str_replace(" .",".",$interviewer_chic);

$interviewer_apa = rtrim( $interviewer_apa, " " );
$interviewer_apa = str_replace("..",".",$interviewer_apa);
$interviewer_apa = str_replace(" .",".",$interviewer_apa);

$interviewer_mla = rtrim( $interviewer_mla, " " );
$interviewer_mla = str_replace("..",".",$interviewer_mla);
$interviewer_mla = str_replace(" .",".",$interviewer_mla);
?>

        <div id="item-citation" class="element">
        <!--<h3><?php // echo __('Citation'); ?></h3>-->
  <div id="tabs">
    <div id="nav">
      <p>MLA:&nbsp;<input type="radio" name="tab" value="mla" class="div1" />&nbsp;&nbsp;APA:&nbsp;<input type="radio" name="tab" value="apa" class="div2" />&nbsp;&nbsp;Chicago:&nbsp;<input type="radio" name="tab" value="chic" id="default" class="div3" checked/></p>
    </div>

    <div id="div1" class="tab">
      <p id="div-target-mla"><?php echo $interviewee_mla . $interviewee_spec_part ?> Interview by <?php echo $interviewer_mla ?>. <?php if ($monthNameMLA != null) {echo $int_day . " " . $monthNameMLA . ". " . $int_year . ". ";} else {echo "";} ?>Lexington, KY:  Louie B. Nunn Center for Oral History, University of Kentucky Libraries.</p>
          <button class="btn" data-clipboard-action="copy" data-clipboard-target="#div-target-mla">copy MLA citation</button>
    </div>

    <div id="div2" class="tab">
      <p id="div-target-apa"><?php echo $interviewee_apa. $interviewee_spec_part ?> (<?php if ($monthName != null) {echo $int_year . ", " . $monthName . " " . $int_day;} else {echo "n.d.";} ?>). Interview by <?php echo $interviewer_apa ?>. <?php echo metadata('item','Collection Name'); ?>. Louie B. Nunn Center for Oral History, University of Kentucky Libraries, Lexington.</p>
          <button class="btn" data-clipboard-action="copy" data-clipboard-target="#div-target-apa">copy APA citation</button>
    </div>

    <div id="div3" class="tab">
      <p id="div-target-chicago"><?php echo $interviewee_chic . $interviewee_spec_part ?>, interview by <?php echo $interviewer_chic ?>. <?php 
      if ($monthName != null) {echo $monthName . " " . $int_day . ", " . $int_year;} else {echo "(n.d.)";} ?>, <?php echo metadata('item','Collection Name'); ?>, Louie B. Nunn Center for Oral History, University of Kentucky Libraries. </p>
 
    <button class="btn" data-clipboard-action="copy" data-clipboard-target="#div-target-chicago">copy Chicago citation</button>
    </div>

  </div>
  </div>
  
    <script type="text/javascript" charset="utf-8">
    (function(){
      var tabs =document.getElementById('tabs');
      var nav = tabs.getElementsByTagName('input');

      /*
      * Hide all tabs
      */
      function hideTabs(){
        var tab = tabs.getElementsByTagName('div');
        for(var i=0;i<=nav.length;i++){
          if(tab[i].className == 'tab'){
            tab[i].className = tab[i].className + ' hide';
          }
        }
      }

      /*
      * Show the clicked tab
      */
      function showTab(tab){
        document.getElementById(tab).className = 'tab'
      }
      
      hideTabs(); /* hide tabs on load */

      /*
      * Add click events
      */
      for(var i=0;i<nav.length;i++){
        nav[i].onclick = function(){
          hideTabs();
          showTab(this.className);
        }
      }

      $('input[value="chic"]:checked').trigger('click');

    })();
  </script>
