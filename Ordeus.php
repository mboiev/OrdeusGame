<?php

class Ordeus implements Battlers
{
    private $health;
    private $strength;
    private $defence;
    private $speed;
    private $luck;

    public function __construct()
    {
        $this->health = rand(70,100);
        $this->strength = rand(70,80);
        $this->defence = rand(45,55);
        $this->speed = rand(40,50);
        $this->luck = rand(10,30);
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
        if(rand(1,100)<=$this->luck){
            echo("Magic shield! Ordeus takes half of the damage!\n");
            if($attack > $this->defence){
                $this->health = $this->health - ($attack - $this->defence)/2;
                echo("Ordeus takes ".(($attack - $this->defence)/2)." damage\n");
                echo("Ordeus now has ".$this->health." hp\n");
            }
            else{
                echo("Ordeus takes no damage.");
            }
            return;
        }
        if($attack > $this->defence){
            $this->health = $this->health - ($attack - $this->defence);
            echo("Ordeus takes ".($attack - $this->defence)." damage\n");
            echo("Ordeus now has ".$this->health." hp\n");
        }
        else{
            echo("Ordeus takes no damage.");
        }
    }

    public function dealDamage(Battlers $enemy){
        $enemy->takeDamage($this->getStrength());
        if(rand(1,100)<= $this->getLuck()){
            echo("Rapid strike!\n");
            $enemy->takeDamage($this->getStrength());
        }
    }

    public function writeStats(){
        echo("-----------------------------\n");
        echo("Ordeus stats:\n");
        echo("Health: ".$this->health."\n");
        echo("Strength: ".$this->strength."\n");
        echo("Defense: ".$this->defence."\n");
        echo("Speed: ".$this->speed."\n");
        echo("Luck: ".$this->luck."%\n");
        echo("-----------------------------\n");
    }
}