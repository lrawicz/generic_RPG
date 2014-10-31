<?php

/**
 * Description of weapons
 *
 * @author Leandro Rawicz <lrawicz@gmail.com>
 */
require_once '../general/Type.php';
require_once '../general/Stats.php';
require_once '../items/Gems.php';
require_once '../items/item.php';
class weapons extends items {
    /** @var Type  */
    public $_type;
    /** @var Stats */
    private $_stats;
    private $_slots;
    public function __construct($name, $stats) {
        $this->_slots = array();
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

    public function getElementalDamage($elemental){
        $result = 0;
        foreach ($this->_slots as $object) {
            if (get_class($object) === 'Stats'){
                $result += $object->_elementalDamage[$elemental];
            }else{
                $result += $object->getStats()->_elementalDamage[$elemental];
            }
        }
        return $result;
    }
    public function getElementalResistence($elemental){
        $result = 0;
        foreach ($this->_slots as $object) {
            if (get_class($object) === 'Stats'){
                $result += $object->_elementalResistence[$elemental];
            }else{
                $result += $object->getStats()->_elementalResistence[$elemental];
            }
        }
        return $result;
    }
    public function getTotalStatValue($stat){
        $function = 'get' . $stat;
        $stats = call_user_func(array($this,'getStats'));
        $result = call_user_func(array($stats,$function));
        foreach ($this->_slots as $object) {
            $stats = call_user_func(array($object,'getStats'));
            $result += call_user_func(array($stats,$function));
        }
        return $result;
    }
    public function addObjectToSlot($object){
        $this->_slots[] = $object;
    }
}

