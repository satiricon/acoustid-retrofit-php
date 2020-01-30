<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use Satiricon\AcoustId\Converter\AcousticIdResponseBodyConverter;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Tebru\Retrofit\HttpClient;
use Tebru\Retrofit\RetrofitBuilder;
use Tebru\RetrofitHttp\Guzzle6\Guzzle6HttpClient;
use Tebru\Retrofit\Retrofit;
use GuzzleHttp\Client;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Satiricon\AcoustId\Converter\AcoustIdConverterFactory;
use ProxyManager\Factory\LazyLoadingGhostFactory;
use Satiricon\AcoustId\AcoustIdService;

AnnotationRegistry::registerLoader('class_exists');

$dotenv = Dotenv::create(__DIR__ . '/../');
$dotenv->load();
$dotenv->required(['API_APP_TOKEN', 'API_USER_TOKEN'])->notEmpty();


/*$container = new ContainerBuilder();
$container->setParameter('acoustid.api.app_token', getenv('API_APP_TOKEN'));
$container->setParameter('acoustid.api.user_token', getenv('API_USER_TOKEN'));
$container->setParameter('acoustid.api.url', getenv('API_BASE_URL'));

$container->register(LazyLoadingGhostFactory::class);

$container->register(Client::class);

$container->register(HttpClient::class)
	->setClass(Guzzle6HttpClient::class)
	->addArgument(new Reference(Client::class));

$container->register(AcousticIdResponseBodyConverter::class)
	->addArgument(new Reference(LazyLoadingGhostFactory::class));

$container->register(AcoustIdConverterFactory::class)
	->addArgument(new Reference(AcousticIdResponseBodyConverter::class));

$container->register(RetrofitBuilder::class)
	->setFactory([Retrofit::class, 'builder'])
	->addMethodCall('setBaseUrl', ['%acoustid.api.url%'])
	->addMethodCall('setHttpClient', [new Reference(HttpClient::class)])
	->addMethodCall('addConverterFactory', [new Reference(AcoustIdConverterFactory::class)]);

$container->register(Retrofit::class)
	->setFactory([new Reference(RetrofitBuilder::class), 'build'])
	->setPublic(true);

$container->register(AcoustIdService::class)
	->setFactory([new Reference(Retrofit::class), 'create'])
	->addArgument(AcoustIdService::class)
	->setPublic(true);*/