<?php


/**
 * Description of Character
 *
 * @author Leandro Rawicz <lrawicz@gmail.com>
 */
include_once './Exp.php';
include_once './Stats.php';
abstract class Character {
    /**
     * @var Stats
     */
    public $_stats;
    /**
     *
     * @var Exp 
     */
    public $_exp;
    public function __construct() {
        
    }
    public function setLvl(){
        
    }
    public function lvlUp(){
        $this->_exp->LvlUp();
    }
    public function addExp(){
    }
    
    
}
