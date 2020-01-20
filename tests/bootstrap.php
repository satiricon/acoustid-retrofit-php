<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Tebru\Retrofit\RetrofitBuilder;
use Tebru\RetrofitHttp\Guzzle6\Guzzle6HttpClient;
use Tebru\Retrofit\Retrofit;
use Tebru\RetrofitConverter\Gson\GsonConverterFactory;
use Tebru\Gson\GsonBuilder;
use Tebru\Gson\Gson;
use GuzzleHttp\Client;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Satiricon\AcoustId\AcoustIdConverter;

AnnotationRegistry::registerLoader('class_exists');

$dotenv = Dotenv::create(__DIR__ . '/../');
$dotenv->load();
$dotenv->required(['API_APP_TOKEN', 'API_USER_TOKEN'])->notEmpty();


$container = new ContainerBuilder();
$container->setParameter('acoustid.api.app_token', getenv('API_APP_TOKEN'));
$container->setParameter('acoustid.api.user_token', getenv('API_USER_TOKEN'));
$container->setParameter('acoustid.api.url', getenv('API_BASE_URL'));

$container->register(Client::class);
$container->register(Guzzle6HttpClient::class)
	->addArgument(new Reference(Client::class));
$container->register(GsonBuilder::class)
	->setFactory([Gson::class, 'builder']);
$container->register(Gson::class)
	->setFactory([new Reference(GsonBuilder::class), 'build']);
$container->register(GsonConverterFactory::class)
	->addArgument(new Reference(Gson::class));
$container->register(RetrofitBuilder::class)
	->setFactory([Retrofit::class, 'builder'])
	->addMethodCall('setBaseUrl', ['%acoustid.api.url%'])
	->addMethodCall('setHttpClient', [new Reference(Guzzle6HttpClient::class)])
	->addMethodCall('addConverterFactory', [new Reference(GsonConverterFactory::class)]);
$container->register(Retrofit::class)
	->setFactory([new Reference(RetrofitBuilder::class), 'build'])
	->setPublic(true);

$container->compile();