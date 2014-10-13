<?php

namespace Vehicles;

abstract class Vehicle extends \Core\Object implements \Vehicles\IVehicle
{

	/**
	 * Vehicle color
	 *
	 * @var string
	 */
	protected $color;

	/**
	 * Vehicle brand
	 *
	 * @var string
	 */
	protected $brand;

	public function drive()
	{

	}

	public function stop()
	{

	}

	public function showInfo()
	{
		echo $this->getInfo();
	}

	public function __toString()
	{
		foreach (get_object_vars($this) as $property => $val) {
			$properties[] = $property . ': ' . $val;
		}

		$str = 'Class name: ' . get_class($this);
		$str .= '<br />';
		$str .= 'Class methods: '. implode(', ', get_class_methods($this));
		$str .= '<br />';
		$str .= 'Class properties: ' . implode(', ', $properties);

		return $str;
	}

	abstract public function getInfo();


}

?>
