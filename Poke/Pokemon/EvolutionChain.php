<?php

/**
 * Description of EvolutionChain
 *
 * @author Leandro Rawicz <lrawicz@gmail.com>
 */
class EvolutionChain{
    public $_evolvesTo;
    public $_condEvolutionId;
    public $_condEvolutionObjectType;
    public $_canEvolve;
    const ObjectTypeLvl = "Lvl";
    function __construct($evolvesTo ,$objectType , $objectId, $canEvolve = false ){
        $this->_condEvolutionId = array();
        $this->_condEvolutionObjectType = array();
        $this->_evolvesTo = array();
        $this->_canEvolve = array();
        return $this->add($evolvesTo,$objectType,$objectId, $canEvolve);
    }
    public function add($evolvesTo ,$objectType  , $objectId, $canEvolve = false ){
        if(!empty($evolvesTo) && !empty($objectType) && !empty($objectId) ){
            $this->_evolvesTo[] = $evolvesTo;
            $this->_condEvolutionObjectType[] = $objectType ;
            $this->_condEvolutionId[] = $objectId;
            $this->_canEvolve[] = $canEvolve;
            return true;
        }else{
            return false;
        }
    }
    function __set($name, $value) {
        var_dump($name);
    }
    
}
