<?php

namespace Smartsupp\GpcParser\DI;

use Nette\DI\CompilerExtension;

class GpcParserExtension extends CompilerExtension
{

	public function loadConfiguration(): void
	{
		$builder = $this->getContainerBuilder();

		$utils = $builder->addDefinition($this->prefix('utils'))
			->setFactory(\Smartsupp\GpcParser\Utils::class, []);

		$encoder = $builder->addDefinition($this->prefix('encoder'))
			->setFactory(\Smartsupp\GpcParser\Encoder::class, [$utils]);

		$builder->addDefinition($this->prefix('fio'))
			->setFactory(\Smartsupp\GpcParser\Bank\Fio::class, [$encoder]);
	}

}
