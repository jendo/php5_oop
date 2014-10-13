<?php

namespace Core;

abstract class Object
{

	protected static $count = 0;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		self::$count++;
	}

	/**
	 * Function to get count of class instances
	 *
	 * @return int
	 */
	public static function getCount()
	{
		return self::$count;
	}

	/**
	 * Method overloading
	 * This method is only called when the original method name does not exists
	 * Dynamic setter and getter for properties like $color and $brand
	 *
	 */
	public function __call($method, $arguments)
	{
		$prefix = strtolower(substr($method, 0, 3));
		$property = strtolower(substr($method, 3));

		if (empty($prefix) || empty($property)) {
			return;
		}

		// getter
		if ($prefix == 'get' && isset($this->$property)) {
			return $this->$property;
		}

		// setter
		if ($prefix == 'set') {
			$this->$property = $arguments[0];
			return;
		}

		// other functions
		if (isset($this->$method)) {
				$func = $this->$method;
				return call_user_func_array($func, $arguments);
		}else {
			throw new \Exception('Method: ' . $method . ' DOES NOT exist!');
		}

	}

	/**
	 * Property overloading
	 * __get is called when reading the vaulue if an undefined property
	 * __set is called when trying to change value of undefined property
	 */
	public function __set($name, $value)
	{
		$this->$name = $value;
		//If it is  NOT anonymous function
		// Because Clousure CAN NOT be converted into string
		if (!($value instanceof \Closure)) {
			echo 'Trying to set value: ' . $value . ' into undefined property:' . $name . '<br />';
		}
	}

	public function __get($name)
	{
		echo 'Trying to get value of undefined property:' . $name . '<br />';
	}

}
