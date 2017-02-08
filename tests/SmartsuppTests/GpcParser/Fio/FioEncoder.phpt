<?php

namespace SmartsuppTests\GpcParser\Fio;

use Smartsupp\GpcParser\Bank\Fio;
use Smartsupp\GpcParser\Encoder;
use Tester\TestCase;
use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';

class FioEncoderTest extends TestCase
{

	public function testFunctionality()
	{
		$expected = "0740000002400717034Smartsupp.com, s.r.o00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000"."\r\n".
					"0750000002400717034000002400717034000000000000000000000020000002160014200000000000000000000000000FUNDACION VICENTE FE00203281216"."\r\n".
					"0750000002400717034000002400717035000000000000000000000020000002160005000000000000000000000000000FUNDACION VICENTE FE00203281126"."\r\n";

		$fio = new Fio(new Encoder());
		$fio->setData([
			[
				'type' => '074',
				'account' => '2400717034',
				'account_name' => 'Smartsupp.com, s.r.o',
			],
			[
				'v_symbol' => '21600142',
				'currency' => '0203',
				'date' => '281216',
				'price' => '20' . '00',
				'type' => '075',
				'account' => '2400717034',
				'client_name' => 'FUNDACION VICENTE FERRER',
				'account_counter' => '2400717034',
			],
			[
				'v_symbol' => '21600050',
				'currency' => '0203',
				'date' => '281126',
				'price' => '20' . '00',
				'type' => '075',
				'account' => '2400717034',
				'client_name' => 'FUNDACION VICENTE FERRER',
				'account_counter' => '2400717035',
			],
		]);

		Assert::equal($expected, $fio->encode());
	}

}

$test = new FioEncoderTest();
$test->run();