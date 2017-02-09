<?php

namespace Smartsupp\GpcParser\DI;

use Nette\DI\CompilerExtension;

class GpcParserExtension extends CompilerExtension
{

	public function loadConfiguration()
	{
		$builder = $this->getContainerBuilder();

		$utils = $builder->addDefinition($this->prefix('utils'))
			->setClass('Smartsupp\GpcParser\Utils', []);

		$encoder = $builder->addDefinition($this->prefix('encoder'))
			->setClass('Smartsupp\GpcParser\Encoder', [$utils]);

		$builder->addDefinition($this->prefix('fio'))
			->setClass('Smartsupp\GpcParser\Bank\Fio', [$encoder]);
	}

}
