<?php
$ch = curl_init();
// IMPORTANT: the below line is a security risk, read https://paragonie.com/blog/2017/10/certainty-automated-cacert-pem-management-for-php-software
// in most cases, you should set it to true
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, 'https://openlibrary.org/api/books?bibkeys=ISBN:9780980200447&jscmd=data&format=json');
$result = curl_exec($ch);
curl_close($ch);
echo "<pre>";
//echo $result;
$obj = json_decode($result,true);

$output = $obj['ISBN:9780980200447'];
//print_r($output);

echo "Title: ".$output['title'];
echo "<br>";
echo "Number Of Pages:".$output['number_of_pages'];
echo "<br>";
echo "Medium Cover:".$output['cover']['medium'];
 ?>