<?php

/**
 * Description of Gems
 *
 * @author Leandro Rawicz <lrawicz@gmail.com>
 */
require_once '../items/item.php';
class Gems extends items{
    /**
     *
     * @var Stats
     */
    private $_stats;
    public $_name;
    private $_colecction;
    function __construct($name,$stats) {
        $this->_stats = $stats;
        parent::__construct($name);
    }
    function getStats() {
        return $this->_stats;
    }

    function setStats(Stats $stats) {
        $this->_stats = $stats;
        return $this;
    }
    function getColecction() {
        return $this->_colecction;
    }

    function setColecction($colecction) {
        $this->_colecction = $colecction;
        return $this;
    }


}
class Colecction{
    //se recomienda que stats[0] = null
    public $stats; //array
    public $objects; //array
    public $boolean; //array
    public function __construct( $objects , $stats) {
        foreach ($objects as $value) {
            $boolean[] = false;
        }
    }
    public function getStats(){
        
    }
}