<?php

namespace Vehicles;

/**
 * Interface allow to define common structure for classes
 * In interface we declate function that must be implmented
 */
interface IVehicle
{

	/**
	 *
	 */
	public function drive();

	/**
	 *
	 */
	public function stop();

}

?>
