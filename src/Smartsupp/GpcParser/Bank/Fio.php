<?php

namespace Smartsupp\GpcParser\Bank;

use Smartsupp\GpcParser\Encoder;

class Fio {

	const LINE_HEIGHT = 128;
	const EOL = '0x0D 0x0A';
	const DEFAULT_VALUE = 0;

	/** mixed $line */
	private $line;

	/** string $output  */
	private $output = '';

	/** Encoder $encoder */
	private $encoder;

	private static $dataPositions = [
		'v_symbol' => [62, 10],
	];


	/**
	 * Fio constructor.
	 * @param Encoder $encoder
	 */
	public function __construct(Encoder $encoder)
	{
		$this->line = str_repeat(self::DEFAULT_VALUE, self::LINE_HEIGHT);
		$this->encoder = $encoder;
	}


	public function setData(array $data)
	{
		foreach ($data as $item => $value) {
			if (isset(self::$dataPositions[$item])) {
				$this->output .= $this->encoder->addValue(
					$value,
					self::$dataPositions[$item][0],
					self::$dataPositions[$item][1],
					$this->line
				);
			}
		}
	}


	/**
	 * @return string
	 */
	public function __toString()
	{
		return $this->output;
	}
}