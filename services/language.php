<?php

use Symfony\Component\Translation\Loader\ArrayLoader;
use Symfony\Component\Translation\Translator;

require_once __DIR__.'/vendor/autoload.php';

$translator = new Translator('en');
$translator->addLoader('array',new ArrayLoader());


// translation to english
$translator->addResource('array',[
    
    // login petugas or admin
    'admin_username' => 'Enter Your Username',
    'admin_pass' => 'Enter Your Password',

],'en');

