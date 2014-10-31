<?php

/**
 * Description of Type
 *
 * @author Leandro Rawicz
 */
class Type {
public $_types;
public $_weak;
public $_strong;
public $_inmune;
    //put your code here
function __construct($type,$weak,$strong,$inmune =[]){
    $this->_weak = array();
    $this->_strong = array();
    $this->_inmune = array();
    $this->_types[] = array();
}

}
class Fire extends Type{
    public function __construct() {
        $weak=["Water","Rock","Ground"];
        $strong = ["Water","Rock","Ground"];
        $inmune = [];
        parent::__construct(get_class($this), $weak, $strong);
    }
}
class Water extends Type{
    public function __construct() {
        $weak=["Fire"];
        $strong = [];
        $inmune = [];
        parent::__construct(get_class($this), $weak, $strong);
    }
}
