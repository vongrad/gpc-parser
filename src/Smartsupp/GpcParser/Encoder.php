<?php

namespace Smartsupp\GpcParser;

class Encoder
{

	/** @var Utils */
	private $utils;


	public function __construct(Utils $utils)
	{
		$this->utils = $utils;
	}


	/**
	 * @param integer|string $value
	 * @param mixed          $line
	 * @param integer        $bitPosition
	 * @param integer        $maxBitPosition
	 * @param bool|string    $autoFill
	 * @param string         $align
	 * @return mixed
	 * @throws InvalidArgumentException
	 */
	public function addValue($value, $line, $bitPosition, $maxBitPosition, $autoFill = false, $align = 'left')
	{
		if (!is_string($value)) {
			throw new InvalidArgumentException('Input argument {$value} must be a string!');
		}

		$value = $this->utils->remove_accents($value);
		$value = $align == 'right' ? strrev($value) : $value;

		for ($i = 0; $i <= $maxBitPosition; $i++) {

			if (!isset($value[$i]) && !$autoFill) {
				continue;
			}

			if ($align == 'left') {
				$pos = ($bitPosition) + $i;
			} else {
				$pos = ($bitPosition + $maxBitPosition) - $i;
			}

			$put = !isset($value[$i]) ? $autoFill : $value[$i];

			$line[$pos - 1] = $put;
		}

		return $line;
	}
}
