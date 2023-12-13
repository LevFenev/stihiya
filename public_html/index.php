<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);

$s = "My";
//print "Hello $s Wild!";
//print "<br>";
//print 'Hello $s Wild!';

$s = 1;
$g = new Wild_Greeting();
$g1 = new SeventySeven();
while ($s <= 10){
    $g->print_greeting();
    $g1->print_greeting();
    $g1->set_greeting($s);
    $s++;
}

abstract class Greeting {
    protected string $name;

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

class Wild_Greeting extends Greeting {

    /**
     * Wild_Greeting constructor.
     */
    public function __construct()
    {
        parent::__construct("Wild");
    }

    public function set_greeting($s = "Wild")
    {
        $this->name = $s;
    }
}

class SeventySeven extends Greeting {
    use UsefulFunctions;

    /**
     * SeventySeven constructor.
     */
    public function __construct()
    {
        parent::__construct(77);
    }

    public function set_greeting($s)
    {
        $this->name = $s;
    }
}

trait UsefulFunctions {
    public function printNewLine() {
        print "<br>";
    }
}

interface DoGreeting {
    public function set_greeting($s);
}
