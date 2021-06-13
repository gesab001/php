
<?php
$string = 'giovanni 20 gooble';
$pattern = '/(\w+) (\d+) (\w+)/i';
$replacement = '${0} ';
echo preg_replace($pattern, $replacement, $string);
?>

