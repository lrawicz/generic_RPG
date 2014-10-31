<?php

/**
 * Description of Stats
 *
 * @author Leandro Rawicz <lrawicz@gmail.com>
 */
class Stats {
    
    const FisDam = 'FisDam';
    const FisRes = 'FisRes';
    const MagDam = 'MagDam';
    const MagRes = 'MagRes';
    const HP = 'HP';
    const HPMAX = 'HPMAX';
    const MP = 'MP';
    const MPMAX = 'MPMAX';
    
    
    
    public $_HP;
    public $_HPMax;
    public $_MP;
    public $_MPMax;
    /**FisicalDamage*/
    private $_FD;
    /**FisicalResistence*/
    private $_FR;
    /**MagicalDamage*/
    private $_MD;
    /**MagicalResistence*/
    private $_MR;
    public $_elementalDamage;
    public $_elementalResistence;
    public function __construct() {
        $this->setHP(0);
        $this->setMP(0);
        $this->setFisDam(0);
        $this->setFisRes(0);
        $this->setMagDam(0);
        $this->setMagRes(0);
        $this->_elementalDamage = array();
        $this->_elementalResistence = array();
        }
        
    function getMP() {
        return $this->_MP;
    }

    function setMP($MP) {
        $this->_MP = $MP;
        return $this;
    }
    function setHP($HP) {
        $this->_HP = $HP;
        return $this;
    }
    function getHP() {
        return $this->_HP;
    }
    function removeHP($value){
        $this->_HP =-$value; 
    }
    function addHP($value){
        $this->_HP +=$value; 
    }
    function removeMP($value){
        $this->_MP =-$value; 
    }
    function addMP($value){
        $this->_MP =+$value; 
    }
    function getHpMax() {
        return $this->_HPMax;
    }
    function getMpMax() {
        return $this->_MPMax;
    }

    /** get Fisical Damage
     * 
     * @return type
     */
    function getFisDam() {
        return $this->_FD;
    }
    /** get Fisical Resistence
     * 
     * @return type
     */
    function getFisRes() {
        return $this->_FR;
    }
    /** get Magical Damage
     * 
     * @return type
     */
    function getMagDam() {
        return $this->_MD;
    }
    /** get Magical Resistence
     * 
     * @return type
     */
    function getMagRes() {
        return $this->_MR;
    }
    /** set Fisical Damage
     * 
     * @param type $FD
     * @return \Stats
     */
    function setFisDam($FD) {
        $this->_FD = $FD;
        return $this;
    }
    /** set fisical Resistence
     * 
     * @param type $FR
     * @return \Stats
     */
    function setFisRes($FR) {
        $this->_FR = $FR;
        return $this;
    }
    /** set Magical Defence
     * 
     * @param type $MD
     * @return \Stats
     */
    function setMagDam($MD) {
        $this->_MD = $MD;
        return $this;
    }
    /** set Magical Resistence
     * 
     * @param type $MR
     * @return \Stats
     */
    function setMagRes($MR) {
        $this->_MR = $MR;
        return $this;
    }






}
