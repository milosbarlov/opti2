<?php
use tests\codeception\frontend\AcceptanceTester;
use tests\codeception\frontend\_pages\UserPage;

$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
UserPage::openBy($I);
$I->see('Users');


