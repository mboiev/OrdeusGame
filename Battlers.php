<?php


interface Battlers
{
    public function takeDamage(int $attack);
    public function dealDamage(Battlers $enemy);
    public function writeStats();
}