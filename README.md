# GPC parser
GPC format decoder and decoder for generating transactions for accountant's system 

**Supports**

- Fiobank

Installation
------------

The best way to install is using  [Composer](http://getcomposer.org/):

```sh
$ composer require smartsupp/gpc-parser
```

Running tests
------------
```sh
$ php vendor/nette/tester/src/tester ./tests/SmartsuppTests/GpcParser/
```

Usage
------------
```php
$fio = new \Smartsupp\GpcParser\Bank\Fio(
    new \Smartsupp\GpcParser\Encoder(
        new \Smartsupp\GpcParser\Utils()
    )
);
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

echo $fio->encode();

/*

07400000002400717034Smartsupp.com, s.r.o0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000 
0750000000240071703400000000000000000000000000000000000005400216001420000000000000000000000000000FUNDACION VICENTE FE00203011117 
0750000000240071703400000000000000000000000000000000000005400216000500000000000000000000000000000FUNDACION VICENTE FE00203121216

*/
```

