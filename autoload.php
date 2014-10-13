<?php

function __autoload($class)
{

	$parts = explode('\\', $class);
	$name = strtolower(end($parts));

	// Load interface
	if (mb_substr($name, 0, 1, 'utf-8') == "i") {
		require_once 'classes/' . $name . '.class.php';
		return true;
	}

	require_once 'classes/' . $name . '.class.php';
}
