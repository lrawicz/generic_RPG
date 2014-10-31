<?php

/**
 * Description of Pokemon
 *
 * @author Leandro Rawicz <lrawicz@gmail.com>
 */
include_once "../general/Type.php";
include_once "EvolutionChain.php";
include_once "../general/Exp.php";
include_once "../general/Stats.php";
include_once "PokeState.php";
include_once '../items/weapons.php';
include_once '../items/Gems.php';
include_once '../items/Usableitems.php';
abstract class Pokemon {

    public $_alias;
    public $_weak;
    public $_strong;
    public $_inmune;
    public $_Types;
    public $_weapons;
    public $_items;
    /**
     *   @var Stats 
     */
    public $_STATS;

    /** @var Exp  */
    private $_exp;

    /** @var EvolutionChain */
    private $_evolChain;

    /** @var pokeState */
    public $_estate;

    function __string() {
        return $this->getAlias();
    }
    /**
     * 
     * @param Array $types
     * @param EvolutionChain $evol
     * @param String $alias
     */
    function __construct( $types,  EvolutionChain $evol = null, $alias = null) {
        foreach ($types as $type) {
            $this->_Types[] = new $type;
        }
        $this->_weak = $this->_getGroup("_weak");
        $this->_strong = $this->_getGroup("_strong");
        $this->_inmune = $this->_getGroup("_inmune");
        //Exp
        $this->_exp = new Exp();
        
        $this->_STATS = new Stats();
        $this->_evolChain = $evol;
        $this->_alias = empty($alias) ? null : $alias;
        $this->_estate = new pokeState();
        $this->_weapons = array();
    }
    //Items & Weapons
        function useItem(Usableitems $item){
            $method = $item->_method;
            $object = $item->_object;
            $value = $item->_value;
            if(!empty($object)){
                if(!empty($value)){
                    call_user_func(array(call_user_func(array($this,$object)),$method), $value);
                }else{
                    call_user_func(array(call_user_func(array($this,$object)),$method));
                }
            }else{
                if(!empty($value)){
                    call_user_func(array($this,$method),$value);
                }else{
                    call_user_func(array($this,$method));
                }

            }

        }
        function addWeapon(Weapons $weapon){
            $this->_weapons[] = $weapon;
        }
        function removeWeapon(Weapons $weapon){

        }
        function addItem(items $item){
            $this->_items[] = $item;
        }
        function removeItem(items $item){

        }
    //Stats
        public function getTotalStatValue($stat){
        $function = 'get' . $stat;
        $stats = call_user_func(array($this,'getStats'));
        $result  = call_user_func(array($stats,$function));
        foreach ($this->_weapons as $weapon) {
            if(get_class($weapon) === 'weapons'){
                $result += call_user_func(array($weapon, 'getTotalStatValue'),$stat);
            }
        }
        return $result;        
    }
    //Exp & Lvl Up
        private function checkConditionalEvolution(){
            foreach ($this->getEvolChain()->_condEvolutionObjectType as $key => $value) {
                if($value== EvolutionChain::ObjectTypeLvl){
                    $lvl = $this->getExp()->getLvl();
                    if($lvl >= $this->getEvolChain()->_condEvolutionId[$key]){
                       $this->_evolChain->_canEvolve[$key] = true;
                    }
                }
            }
        }
        function addExp($exp){
            $lvl = $this->getExp()->getLvl();
            $resto = 0;
            if($exp >= $this->getExp()->getExpFaltante()){
                $this->lvlUp();
                $resto = $exp - $this->getExp()->getExpFaltante();
                if ($resto>0){$this->addExp($resto);}
            }else{
                $this->getExp()->addExp($exp);
            }
        }
        public function lvlUp(){
            $this->getExp()->addExp($this->getExp()->getExpFaltante());
            $this->ActionLvlUp();
            $this->checkConditionalEvolution();
        }
        function ActionLvlUp(){
            // setear en clases hijas
        }
    //Others
        private function _getGroup($group) {
        $weaknes = [];
        foreach ($this->_Types as $key => $type) {
            foreach ($type->$group as $key => $value) {
                $weaknes[] = ($value );
            }
        }
        return $weaknes;
    }
    //Getters & Setters
        function getStats() {
            return $this->_STATS;
        }
        function setSTATS(Stats $STATS) {
            $this->_STATS = $STATS;
            return $this;
        }
        public function getAlias() {
            return empty($this->_Alias) ? get_class($this) : $this->_Alias;
        }
        /**
         * 
         * @return pokeState
         */
        function getEstate() {
            return $this->_estate;

        }
        function setEstate(pokeState $estate) {
            $this->_estate = $estate;
            return $this;
        }
        function getWeapons() {
            return $this->_weapons;
        }
        function setWeapons($weapons) {
            $this->_weapons = $weapons;
            return $this;
        }
        /**
         * 
         * @return Exp
         */
        function getExp() {
            return $this->_exp;
        }
        /**
         * 
         * @return EvolutionChain
         */
        function getEvolChain() {
            return $this->_evolChain;
        }
        function setExp(Exp $exp) {
            $this->_exp = $exp;
            return $this;
        }
        function setEvolChain(EvolutionChain $chainEvol) {
        $this->_evolChain = $chainEvol;
        return $this;
    }

}

class generalFunction {
    static function CalcDamage(Pokemon $charOffensive, 
                                Attack $attack, 
                                Pokemon &$charDeffensive){
        if($attack->getType == 'Fisical'){
            $Totaldamage = $charOffensive->getTotalStatValue(Stats::FisDam);
            $Totaldamage -= $charDeffensive->getTotalStatValue(Stats::FisRes);
            if ($Totaldamage<0){$Totaldamage = 0;}
        }else{
            
        }
        $charDeffensive->getStats()->removeHP($Totaldamage);
    }
    static function evolucionar(Pokemon &$pokemon, $evolvTo , $force = false) {
        try {
            if(!$force){
                $potenicialEvolArray = $pokemon->getEvolChain()->_evolvesTo;
                foreach ($potenicialEvolArray as $key => $potenicialEvol) {
                    if($potenicialEvol == $evolvTo &&
                        $pokemon->getEvolChain()->_canEvolve[$key]
                    ){
                    $newAlias = $pokemon->getAlias() == get_class($pokemon) ? null : $pokemon->getAlias();
                    $pokemonevolve = new $evolvTo($newAlias);
                    $pokemonevolve->setEstate($pokemon->getEstate());
                    $pokemonevolve->setSTATS($pokemon->getStats());
                    $pokemonevolve->setExp($pokemon->getExp());
                    $pokemonevolve->setWeapons($pokemon->getWeapons());
                    $pokemon = $pokemonevolve;
                    return true;
                }
            }
                return false;
            }else{
                $newAlias = $pokemon->getAlias() == get_class($pokemon) ? null : $pokemon->getAlias();
                $pokemonevolve = new $evolvTo($newAlias);
                $pokemonevolve->setEstate($pokemon->getEstate());
                $pokemonevolve->setSTATS($pokemon->getStats());
                $pokemonevolve->setExp($pokemon->getExp());
                $pokemonevolve->setWeapons($pokemon->getWeapons());
                $pokemon = $pokemonevolve;
                return true;
            }
        }catch (Exception $exc) {
            return $exc->getTraceAsString();
        }
    }

    static function checkEvolution(Pokemon &$pokemon) {
        
    }

}
