<?php


namespace Satiricon\AcoustId\Tests;


use Symfony\Component\DependencyInjection\Container;

class Provider {

	public static $container;

	public static function container() : Container {
		if(self::$container === null) {
			global $container;
			self::$container = $container;
		}
		return self::$container;
	}

	public static function get(string $id) {
		return self::container()->get($id);
	}
}