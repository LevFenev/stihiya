<?php
$s = "My";
//print "Hello $s Wild!";
//print "<br>";
//print 'Hello $s Wild!';

$s = 1;
$g = new Greeting("Wild");
$g1 = new Greeting(77);
while ($s <= 10){
    $g->print_greeting();
    $g1->print_greeting();
    $s++;
}


class Greeting {
    private string $name;

    /**
     * Greeting constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function print_greeting():void {
        print 'hello '.$this->name.'!'."<br>";
    }
}
