<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PHPFunctions</title>


</head>
<body>
<?php // 1-
$original_date = "2019-03-31";
 
// Creating timestamp from given date
$timestamp = strtotime($original_date);
 
// Creating new date format from that timestamp
$new_date = date("m-d-Y", $timestamp);
echo "mm/dd/yyyy Format : $new_date <br>"; // Outputs: 03-31-2019
?>
<?php // 2
// Creating timestamp from given date
$timestamp = strtotime($original_date);
 
// Creating new date format from that timestamp
$new_date = date("d-m-Y", $timestamp);
echo "dd/mm/yyyy Format : $new_date <br>" // Outputs: 31-03-2019
?>
<?php // 3-

$my_str1 = '    Leonardo Saraiva Filho      ';
echo strlen($my_str1); // Outputs: 32
 echo "<br>";
 $trimmed = rtrim($my_str1);
 var_dump($trimmed);
echo "<br>";

$my_str2 = '             Leo Saraiva Filho                ';
echo strlen($my_str2); // Outputs: 46
echo "<br>";
$trimmed = ltrim($my_str2);
var_dump($trimmed);
echo "<br>";
echo strtolower($my_str2);
echo "<br>";
?>

<?php // 4-
$input = "1234567890"; 
$output = substr($input, -10, -7) . "-" . substr($input, -7, -4) . "-" . substr($input, -4); 
echo $output;
echo "<br>";
?>
<?php //5-
$number = 123456;
$format_number = number_format($number);
echo "$ $format_number";

?>


</body>
</html>