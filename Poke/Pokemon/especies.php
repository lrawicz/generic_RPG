<?php


include_once "Pokemon.php";
class Charmander extends Pokemon{
    
    function __construct($alias = null) {
        $types = ["Fire","Water"];
        $chain = new EvolutionChain("Charmeleon",  EvolutionChain::ObjectTypeLvl,3);
        parent::__construct($types,$chain,$alias);
        $stats = new Stats();
        $stats->setFisDam(rand(1,4));
        $this->setSTATS($stats);
    }
    function ActionLvlUp(){
        //$this->getStats()->setFisDam($this->getStats()->getFisDam() + 2);
        $stat = new Stats();
        $stat->setFisDam(rand(1,4));
        $weapon = new weapons('garra Charmander', $stat);
        $this->addWeapon($weapon);
                
    }
    

}
class Charmeleon extends Pokemon{
      function __construct($alias = null) {
        $types = ["Fire"];
        $chain = new EvolutionChain("Charizard",EvolutionChain::ObjectTypeLvl,35);
        parent::__construct($types,$chain,$alias);
    }
    function ActionLvlUp(){
        //$this->getStats()->setFisDam($this->getStats()->getFisDam() + 2);
        $stat = new Stats();
        $stat->setFisDam(5);
        $weapon = new weapons('garra Charmeleon', $stat);
        $this->addWeapon($weapon);
                
    }
}
class Charizard extends Pokemon{
      function __construct($alias = null) {
        $types = ["Fire","Water"];
        parent::__construct($types,null,$alias);
        $this->_ExpActual = 40;
    }
}
