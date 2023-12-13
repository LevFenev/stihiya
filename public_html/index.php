<?php
$s = "My";
//print "Hello $s Wild!";
//print "<br>";
//print 'Hello $s Wild!';

$s = 1;
while ($s <= 10){
    print_greeting("Wild");
    print_greeting(77);
    $s++;
}

function print_greeting(string $name) {
    print 'hello '.$name.'!'."<br>";
}
