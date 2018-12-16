<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  
<?php
// define variables and set to empty values

$project = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if (empty($_POST["project"])) {
    $projectErr = "Project id is required";
  } else {
    $project = test_input($_POST["project"]);
    // check if project only contains letters and no whitespace
    if (!preg_match("/^[a-zA-Z]*$/",$project)) {
      $projectErr = "Only letters allowed"; 
    }
  }
  
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

    
}
?>
<div class="panel">
<h3>Enter Project Code:</h3>
<form method="get">
<input type="text" name="project" value="<?php echo $project;?>">
<input type="submit" value="Generate Accession Number">
</form> 

<?php
$proj = $_GET['project'];
$projold = "pain";
$curYear = date('Y');
$abrev = "oh";
$string = "";

if ($proj) {
// get all interview records in the database and store in an array
$items = get_records('Item', array(), 30000);
$all_accessions = array();

set_loop_records('items', $items);

foreach (loop('items') as $item): 
$accnums = metadata('item', array('General','Interview Accession'));
$accessions[] = $accnums;
endforeach;

// get all interview records from the database array that are for the current year
$numof = array();
foreach($accessions as $accession) {
if (strpos($accession, $curYear) !== false) {
    $totalints = substr($accession, 0, 9);
    $digits = substr($totalints, -3); 
//    echo $seq;
//    echo "<br/>";
    $numof[] = $digits;
}
}
    $total_seq = (max($numof));
//    echo "<h4>Last interview sequence of the year so far:</h4>";
//    echo $total_seq;
//    echo "<br/>";

// get all interview records from the database array that are for the requested project

//echo "<h4>Project accession numbers already assigned:</h4>";
$numbers = array();
foreach($accessions as $accession) {
if (strpos($accession, $proj) !== false) {
//    echo $accession;
//    echo "<br/>";
    $seqs = substr($accession, -3);
    $numbers[] = $seqs;
}
}

$seq = (max($numbers));
    
if ($numbers) {
    // do nothing
} else {
    echo "<br/>no accessions for for this project code . '$proj'";
}

// Generate new accession number
$plus_one = 1;
$sum_total_seq = $total_seq + $plus_one;
$sum_total_seq = str_pad($sum_total_seq,3,"0",STR_PAD_LEFT);
$sum_seq = $seq + $plus_one;
$sum_seq = str_pad($sum_seq,3,"0",STR_PAD_LEFT);
$new_accession = $curYear . oh . $sum_total_seq . _ . $proj . $sum_seq;

echo "<h4>New accession number:</h4>";
echo $new_accession;

}

?>
</div>

</body>
</html>

