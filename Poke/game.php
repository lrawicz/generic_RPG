<?php


include_once "./Pokemon/especies.php";

$pokemon = new Charmander();
//$pokemon->addExp(20);
$pokemon->getStats()->setFisDam(20);
$stat = new Stats();
    $stat->setMagDam(20);
    $stat->setFisDam(-2);
$weapon = new weapons('Espada Imperial', $stat);
$stat = new Stats();
$stat->setMagDam(5);
$gem  = new Gems('gema de fuego',$stat);
$weapon->addObjectToSlot($gem);
    
$pokemon->addWeapon($weapon);
$item = new Usableitems('Rare Candy', null, 'lvlUp');
echo $pokemon->getExp()->getLvl() . PHP_EOL;
$pokemon->useItem($item);
echo $pokemon->getExp()->getLvl() . PHP_EOL;
$pokemon->useItem($item);
$pokemon->useItem($item);
echo $pokemon->getExp()->getLvl() . PHP_EOL;
generalFunction::evolucionar($pokemon, 'Charmeleon');
echo get_class($pokemon);
$pokemon->useItem($item);
foreach ($pokemon->getWeapons() as $key => $weapon) {
    echo $weapon->_name . PHP_EOL;
}




//echo ("Magical Damage : " . $pokemon->getStatValue(Stats::MagDam)) . PHP_EOL;
//echo ("Magical Resistence : " . $pokemon->getStatValue(Stats::MagRes)) . PHP_EOL;
//echo ("Fisical Damage : " . $pokemon->getStatValue(Stats::FisDam)) . PHP_EOL;
//echo ("Fisical Resistence : " . $pokemon->getStatValue(Stats::FisRes)) . PHP_EOL;