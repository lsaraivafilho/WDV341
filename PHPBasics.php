<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PHPBasics</title>
<?php
$leonardo = array("Leonardo", "Saraiva", "Filho"); //1.
?>
<?php
$number1 = 1;
$number2 = 2;
$total = $number1 + $number2; // 4
?>

</head>
<body>
<?php
    echo "<h1> PHP Basics </h1>";//2
?>

<h2> 
    <?php
    echo $leonardo[0]. " ". $leonardo[1] . " ". $leonardo[2]; //3.
    ?>
</h2>
<?php
echo $number1 . " + ". $number2 . " = ". $total ; //5
?>
<br> </br>
<?php
$language= array('PHP', 'HTML', 'Javascript');

foreach ($language as $value) {
  echo "$value <br>"; //6 
}
?>

</body>
</html>