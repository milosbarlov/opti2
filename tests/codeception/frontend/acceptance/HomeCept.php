<?php
use tests\codeception\frontend\AcceptanceTester;
use tests\codeception\frontend\_pages\HomePage;
/* @var $scenario Codeception\Scenario */

$I = new AcceptanceTester($scenario);
$I->wantTo('ensure that home page works');
HomePage::openBy($I);
$I->see('Congratulations!');
$I->seeLink('Get started with Yii');
$I->seeLink('Login');