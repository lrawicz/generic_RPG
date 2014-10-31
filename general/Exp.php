<?php

/**
 * Description of Exp
 *
 * @author Leandro Rawicz <lrawicz@gmail.com>
 */
class Exp{
    public  $expActual;
    public  $expTotal;
    public  $expProximoLvl;
    private  $lvl;
    const FIB1 = 5;
    const FIB2 = 8;
    function __construct() {
        $this->expActual = 0;
        $this->expTotal = 0;
        $this->lvl = 1;
        $this->expProximoLvl = self::FIB1 + self::FIB2;
    }
    public function setLvl($lvl){
        $this->_Lvl = $lvl;
        $this->_ExpActual = 0;
        $this->_ExpProxNivel = $this->baseLvl($this->_Lvl + 1);
    }
    /**
    * Get the Actual Lvl
    *
    * @return integer 
    */
    public function getLvl(){
        return $this->lvl;
    }
    function __toString(){
        return $this->getExp();
    }
    function getExp(){
        return $this->expActual;
    }
    public function LvlUp(){
          $this->lvl ++;
          $this->expTotal= $this->expTotal + $this->expActual;
          $this->expProximoLvl = $this->baseLvl($this->getLvl() + 1);
          $this->expActual = 0;
    }
    /**
    * Return the minimun Exp for that lvl
    */
    public function baseLvl($lvl){
        $var1 = self::FIB1;
        $var2 = self::FIB2;
        for ($i=1;$i<=$lvl;$i++){
            $var3 = $var2 +  $var1;
            $var1 = $var2;
            $var2 = $var3;
        }
        return $var3;
    }
    public function addExp( $exp = 0){ 
        if (  $exp > $this->getExpFaltante()){
            $expActual = $this->expActual  ;
            $expProximo =$this->expProximoLvl;
            $resto = $exp - $this->getExpFaltante();
            $this->addExp( $this->getExpFaltante());
            $this->addExp( $resto);
        }elseif($exp = $this->getExpFaltante()){
            $this->expActual = $this->expActual + $exp ;   
            $this->LvlUp();
        }
        else{
            $this->expActual = $this->expActual + $exp ;   
        }
    }
    public function getExpFaltante(){
        return $this->expProximoLvl - $this->expActual;
    }
}

