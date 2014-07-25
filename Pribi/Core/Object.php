<?php
namespace Pribi\Core;

abstract class Object {
	public function __get($name) {
		throw new Exceptions\ReadingAccess(\sprintf('Reading of property [%s->%s] fails. Does not exists or has restricted access.', \get_class($this), $name));
	}

	public function __set($name, $value) {
		throw new Exceptions\WritingAccess(\sprintf('Writting to property [%s->%s] fails. Does not exists or has restricted access.', \get_class($this), $name));
	}

	public function __call($name, array $arguments) {
		throw new Exceptions\UnknownMethodCalled(\sprintf('Executing method [%s->%s()] fails. Does not exists or has restricted access.', \get_class($this), $name));
	}

	public static function __callStatic($name, array $arguments) {
		throw new Exceptions\UnknownStaticMethodCalled(\sprintf('Executing static method [%s->%s()] fails. Does not exists or has restricted access.', \get_called_class(), $name));
	}

	public function __invoke() {
		throw new Exceptions\UnknownMethodCalled(\sprintf('Calling object of class [%s] as method fails. Does not implements __invoke() method.', \get_called_class()));
	}
}
