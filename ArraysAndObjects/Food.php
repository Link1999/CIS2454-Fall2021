<?php

class Food {
    private $name;
    private $cost;
    
    public function __construct($name, $cost){
        $this->setCost($cost);
        $this->setName($name);
    }
    
    public function setName($name){
        $this->name = $name;
    }
    
    public function setCost($cost){
        if ($cost > 0 ){
            $this->cost = $cost;
        } else{
            $this->cost = 0;
        }
        
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function getCost(){
        return $this->cost;
    }
}