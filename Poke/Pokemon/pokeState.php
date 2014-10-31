<?php

/**
 * Description of pokeState
 *
 * @author Leandro Rawicz <lrawicz@gmail.com>
 */
class pokeState {
    /** @var bool  */
    private $_poison;
    /** @var bool  */
    private $_confuse;
    /** @var bool  */
    private $_paralize;
    /** @var bool  */
    private $_burn;
    /** @var bool  */
    private $_freeze;
    public function __construct() {
        $this->_burn = false;
        $this->_confuse = false;
        $this->_freeze = false;
        $this->_paralize = false;
        $this->_poison = false;
    }
    function getPoison() {
        return $this->_poison;
    }

    function getConfuse() {
        return $this->_confuse;
    }

    function getParalize() {
        return $this->_paralize;
    }

    function getBurn() {
        return $this->_burn;
    }

    function getFreeze() {
        return $this->_freeze;
    }

    function setPoison($poison) {
        $this->_poison = $poison;
        return $this;
    }

    function setConfuse($confuse) {
        $this->_confuse = $confuse;
        return $this;
    }

    function setParalize($paralize) {
        $this->_paralize = $paralize;
        return $this;
    }

    function setBurn($burn) {
        $this->_burn = $burn;
        return $this;
    }

    function setFreeze($freeze) {
        $this->_freeze = $freeze;
        return $this;
    }





}
