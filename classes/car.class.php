<?php

namespace Vehicles;

final class Car extends Vehicle
{
	public function getInfo()
	{
		echo 'Vehicle type: ' . get_class($this) . "<br />";
	}

	/**
	 * Method is called when object is called as a function
	 *
	 */
	public function __invoke()
	{

		echo 'Method: ' . __METHOD__ . ' is called';
	}

	/**
	 * __wakeup is called when object is unserialized
	 * this function can reconsturct any resources tha object may have
	 */
	public function __wakeup()
	{
			echo 'Waking up...';
	}

	/*
	 * __sleep is called whe object is serialized
	 * function is being run prior to any serialization
	 * It can clean up object and is supposed to return an array with names of all variables tha should be serialized
	 * It is usefull if you have very large object which need to be save completely
	 *
	 */
	public function __sleep()
	{
			echo 'Sleeping ...';
			return array('color','brand');
	}

}