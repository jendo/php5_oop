<?php

namespace Vehicles;

/**
 * Facotry design pattern
 *
 * Benefits:
 * If you need later rename, replace ro change class, you have to do it only in one place in its facotry
 * Somtime is creating object from class a complicated job and you can do all of the work in the factory,
 * instead of repeating it every time you want create a new instance
 */
final class VehicleFacotry
{

	private static $instances = array();

	public static function motocyle()
	{
		// Test singleton
		if (empty(self::$instances['motocycle'])){
			self::$instances['motocycle'] = new Motocycle();
		}
		return self::$instances['motocycle'];
	}

	public static function car()
	{
		return new Car();
	}

}