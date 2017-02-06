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
		$expected = "07400000002400717034Smartsupp.com, s.r.o0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000"."\r\n".
					"0750000000240071703400000000000000000000000000000000000005400216001420000000000000000000000000000FUNDACION VICENTE FE00203011117"."\r\n".
					"0750000000240071703400000000000000000000000000000000000005400216000500000000000000000000000000000FUNDACION VICENTE FE00203121216"."\r\n";

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
				'date' => '011117',
				'price' => '540',
				'type' => '075',
				'account' => '2400717034',
				'client_name' => 'FUNDACION VICENTE FERRER',
			],
			[
				'v_symbol' => '21600050',
				'currency' => '0203',
				'date' => '121216',
				'price' => '540',
				'type' => '075',
				'account' => '2400717034',
				'client_name' => 'FUNDACION VICENTE FERRER'
			],
		]);

		Assert::equal($expected, $fio->encode());
	}

}

$test = new FioEncoderTest();
$test->run();