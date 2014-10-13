<?php

/**
 * PHP 5
 * namespace,interface , autoload , abstrac and final class
 * overloading magic method class - __call, __get, __set, __toString
 * other methos __invoke, new static, __clone, __wakeup, __sleep
 * class functions  - get_declared_interfaces, class_exists, get_class, get_decalred_classes
 */

// Load autoload script
require_once 'autoload.php';

/*********************************/
/* Testing instance and counting */
/*********************************/
//echo \Vehicles\Vehicle::getCount();
//$motocyle = new \Vehicles\Motocycle();
//echo \Vehicles\Vehicle::getCount();
//$car = new \Vehicles\Car();
//echo \Vehicles\Vehicle::getCount();

/***********************************************/
/* Testing instance via facotry design pattern */
/***********************************************/
$car = \Vehicles\VehicleFacotry::car();
/* @var $car \Vehicles\Car */
$motocyle = \Vehicles\VehicleFacotry::motocyle();
/* @var $motocyle \Vehicles\Motocycle */
$motocyle2 = \Vehicles\VehicleFacotry::motocyle();
/* @var $motocyle2 \Vehicles\Motocycle */
$obj = new stdClass();
$obj->name = "John";

/******************************************************************/
/* Test if object is callable ? If object has function __invoke() */
/******************************************************************/
// Typehint Callable - If $func is not callable object (do not have __invoke function) we get fatal error
function callFunction(Callable $func )
{
	$func();
}
//callFunction($car);

/*********************************************************/
/* Test if prperty color is visible from class motocycle */
/*********************************************************/
$motocyle->testProtectedValueFromVehicle('color');

/**********************************************/
/* Testing  child objects : car and motocycle */
/**********************************************/
$car->setColor('blue');
$car->setBrand('Audi');
$motocyle->setColor('green');
$motocyle->setBrand('Suzuki');
//$car->showInfo();
//$motocyle->showInfo();

/***********************************************/
/* Testing cloning with internal object Garage */
/***********************************************/
$motocyle2 = clone $motocyle;
$garage = $motocyle->getGarage();
$garage->setNumber(55);
$garage2 = $motocyle2->getGarage();
$garage2->setNumber(66);

/************************************/
/* Testing to add metohd on the fly */
/************************************/
// This invokes overload method __set
//$motocyle->getDoorsCount = function () {echo "Hello !";};
// This invokeds overlaod metdhod __call
//$motocyle->getDoorsCount();

/************************************************************/
/* Testing serialize and unserialize (__sleep and __wakeup) */
/************************************************************/
// Serialization CAN NOT work with clousure
// Serializtaion IS NOT json reprezentation
// $serializedCar = serialize($car);
// JSON decode only arrays and primitive objecsty
//var_dump(json_encode($obj));


/****************************************/
/* Get objec info via __toString method */
/****************************************/
//echo $car;
//echo '<br />';
//echo $motocyle;
//echo '<br />';
//echo $motocyle2;

var_dump($car);
var_dump($motocyle);
var_dump($motocyle2);
//var_dump($motocyle === $motocyle2);

/*
echo '<br /><br />';

echo 'Declared classes:<br />';
foreach (get_declared_classes() as $key => $classname) {
	echo $key.' -&gt; '.$classname.'<br />';
}

echo '<br /><br />';

echo 'Interfaceces:<br />';
foreach (get_declared_interfaces() as $key => $interface) {
	echo $key.' =&gt; '.$interface.'<br />';
}
 */


