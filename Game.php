<?php

spl_autoload_register(function ($class_name) {
    include $class_name . ".php";
});

echo("Fight participants have been created.\n");

$ordeus = new Ordeus();
$beast = new Beast();

$ordeus->writeStats();
$beast->writeStats();

echo("The battle starts!\n");

if($ordeus->getSpeed()>$beast->getSpeed()){
    $attacker = $ordeus;
    $defender = $beast;
    echo("Ordeus attacks first.\n");
}
else if($ordeus->getSpeed()<$beast->getSpeed()){
    $attacker = $beast;
    $defender = $ordeus;
    echo("Beast attacks first.\n");
}
else{
    if($ordeus->getLuck()>$beast->getLuck()){
        $attacker = $ordeus;
        $defender = $beast;
        echo("Ordeus attacks first.\n");
    }
    else{
        $attacker = $beast;
        $defender = $ordeus;
        echo("Beast attacks first.\n");
    }
}
for($i = 1; $i<21;$i++){
    echo("Round  ".$i."\n");
    $attacker->dealDamage($defender);
    if($defender->getHealth()<=0){
        echo(get_class($defender). " is dead.\n");
        echo(get_class($attacker). " has won.\n");
        $attacker->writeStats();
        echo("Battle has finished.\n");
        die;
    }
    $temp = $defender;
    $defender = $attacker;
    $attacker = $temp;
}
echo("We'll call it a draw.\n");
echo("Battle has finished.\n");
