<?php

namespace Vehicles;

/**
 * 
 */
final class Garage
{
	/*
	 * Garage's number
	 */
	private $_number;


	public function __construct($number)
	{
		$this->setNumber($number);
	}

	public function getNumber()
	{
		return $this->_number;
	}

	public function setNumber($number)
	{
		$this->_number = $number;
	}



}