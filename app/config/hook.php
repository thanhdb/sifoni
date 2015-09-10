<?php

$app = \Sifoni\Engine::getInstance()->getApp();
$app->register(new Cocur\Slugify\Bridge\Silex\SlugifyServiceProvider());
// Hook anything you want :)