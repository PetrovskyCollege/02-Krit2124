<?php
echo "<h1>Привет</h1>" . "adssad";

$str = "dsfdsf";
$num = 123;
$bool = true;
$arr = [1, 2, 3, 4, "23"];
$assoc = ["random" => "adasd", "123" => 31434];


for ($i = 0; $i < 10; $i++) {
    echo $i;
}

foreach ($assoc as $key => $item) {
    echo $key . " : " . $item . "<br>";
}