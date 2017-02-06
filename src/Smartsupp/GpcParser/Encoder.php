<?php

namespace Smartsupp\GpcParser;

class Encoder
{

	/**
	 * @param integer|string $value
	 * @param integer        $bitPosition
	 * @param integer        $maxBitPosition
	 * @param bool|string    $autoFill
	 * @param string         $align
	 * @param mixed          $line
	 * @return mixed
	 */
	public function addValue($value, $line, $bitPosition, $maxBitPosition, $autoFill = false, $align = 'left')
	{
		$value = (string) $value;
		$value = $align == 'right' ? strrev($value) : $value;

		for ($i = 0; $i < $maxBitPosition; $i++) {

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