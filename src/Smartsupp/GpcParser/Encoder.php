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
	public function addValue($value, $bitPosition, $maxBitPosition, $autoFill = false, $align = 'left', $line)
	{
		$value = (string) $value;
		$value = $align == 'right' ? strrev($value) : $value;

		for ($i = 0; $i < $maxBitPosition; $i++) {

			if ($isset = !isset($value[$i]) && !$autoFill) {
				continue;
			}

			if ($align == 'left') {
				$pos = ($bitPosition - 1) + $i;
			} else {
				$pos = ($bitPosition + $maxBitPosition - 1) - $i;
			}

			$put = $isset ? $autoFill : $value[$i];
			$line[$pos] = $put;
		}

		return $line;
	}
}