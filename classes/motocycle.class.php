<?php

namespace Vehicles;

final class Motocycle extends Vehicle
{

	/**
	 *
	 * @var \Vehicle\Garage
	 */
	private $garage;

	public function __construct()
	{
		parent::__construct();
		$this->garage =  new Garage('1');
	}

	/**
	 * Test if property is visbile from child class
	 *
	 * @param string $property
	 */
	public function testProtectedValueFromVehicle($property)
	{
		return $this->$property;
	}

	/*
	 * Implemented abstract mehod from Vehicle class
	 */
	public function getInfo()
	{

		echo 'Vehicle type: ' . get_class($this) . "<br />";
	}

	/**
	 *
	 * @return \Vehicles\Garage
	 */
	public function getGarage()
	{
		return  $this->garage;
	}

	/*
	 * This method making a shallow copy of object,
	 * that means the internal objects of the cloned object will NOT be cloned.
	 */
	public function __clone()
	{
		// Internal objects (garage) will be ONLY REFERENCE to the same object in nemory
		// To make deep copy (internal objecst are also copy and NOT REFERNECE) you muss explicity instruct the object to clone these internal objects TOO
		$this->garage = clone $this->garage;
	}

}

