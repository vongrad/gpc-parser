<?php

namespace Smartsupp\GpcParser\Bank;

use Smartsupp\GpcParser\Encoder;

class Fio {

	const LINE_HEIGHT = 128;
	const DEFAULT_VALUE = 0;

	/** mixed $line */
	private $line;

	/** string $output  */
	private $output = '';

	/** Encoder $encoder */
	private $encoder;

	private static $dataPositions = [
		'v_symbol' => [62, 9, false, 'right'],
		'currency' => [119, 4, false, 'left'],
		'date' => [123, 6, false, 'left'],
		'price' => [49, 11, false, 'right'],
		'type' => [1, 3, false, 'left'],
		'account' => [4, 15, false, 'right'],
		'account_name' => [19, 20, false, 'right'],
		'account_counter' => [19, 15, false, 'right'],
		'client_name' => [98, 20, '0', 'left'],
		'transaction_type' => [61, 1, false, 'left']
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


	/**
	 * @param array $data
	 */
	public function setData(array $data)
	{
		$this->output = '';
		foreach ($data as $item => $value) {
			$workingLine = $this->line;
			foreach ($value as $lineItem => $lineValue) {
				if (isset(self::$dataPositions[$lineItem])) {
					$workingLine = $this->encoder->addValue(
						$lineValue,
						$workingLine,
						self::$dataPositions[$lineItem][0],
						self::$dataPositions[$lineItem][1],
						self::$dataPositions[$lineItem][2],
						self::$dataPositions[$lineItem][3]
					);
				}
			}

			$this->output .= $workingLine . "\r\n";
		}
	}


	/**
	 * @return string
	 */
	public function encode()
	{
		return $this->output;
	}
}
