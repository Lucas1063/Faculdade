<?php

// Autoload do Composer
require_once 'vendor/autoload.php';

// Criar uma instância do Faker
$faker = Faker\Factory::create('pt_BR');
$faker->addProvider(new Faker\Provider\pt_BR\Text($faker));
// Gerar dados falsos
echo "Nome: " . $faker->name() . "\n";
echo "Endereço: " . $faker->address() . "\n";
echo "Email: " . $faker->email() . "\n";
echo "Texto: " . $faker->realtext(200) . "\n";

?>
