<?php

class Beast implements Battlers
{
    private $health;
    private $strength;
    private $defence;
    private $speed;
    private $luck;

    public function __construct()
    {
        $this->health = rand(60,90);
        $this->strength = rand(60,90);
        $this->defence = rand(40,60);
        $this->speed = rand(40,60);
        $this->luck = rand(25,40);
    }

    /**
     * @return int
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    /**
     * @return int
     */
    public function getStrength(): int
    {
        return $this->strength;
    }

    /**
     * @return int
     */
    public function getSpeed(): int
    {
        return $this->speed;
    }

    /**
     * @return int
     */
    public function getLuck(): int
    {
        return $this->luck;
    }

    public function takeDamage(int $attack){
        if($attack > $this->defence){
            $this->health = $this->health - ($attack - $this->defence);
            echo("Beast takes ".($attack - $this->defence)." damage\n");
            echo("Beast now has ".$this->health." hp\n");
        }
        else{
            echo("Beast takes no damage.");
        }
    }

    public function dealDamage(Battlers $enemy){
        $enemy->takeDamage($this->getStrength());
    }

    public function writeStats(){
        echo("-----------------------------\n");
        echo("Beast stats:\n");
        echo("Health: ".$this->health."\n");
        echo("Strength: ".$this->strength."\n");
        echo("Defense: ".$this->defence."\n");
        echo("Speed: ".$this->speed."\n");
        echo("Luck: ".$this->luck."%\n");
        echo("-----------------------------\n");
    }
}