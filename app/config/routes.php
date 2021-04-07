<?php

use app\controllers\HomeController;

return [

	// '/'                                                      Все товары на 0-ой странице
	'' => [
		'controller' => 'home',
		'action' => 'index'
	],

	// '/page/{page_number}'                                    Все товары на n-ой странице
	'goods/page/(?P<productPage>[\w-]+)' => [
		'controller' => 'home',
		'action' => 'index'
	],

	// '/page/{page_number}'                                    Товар по id
	'product/(?P<productId>[\w-]+)' => [
		'controller' => 'product',
		'action' => 'index'
	],

	//Все товары в категории на 0-ой странице
	// '/category/'
	'category/(?P<category>[\w-]+)' => [
		'controller' => 'home',
		'action' => 'index'
	],

	//Все категории на n-ой странице
	// '/category/page/{page_number}'
	'category/page/(?P<categoryPage>[\w-]+)' => [
		'controller' => 'home',
		'action' => 'index'
	],

	// Все товары в категории на n-ой странице
	// '/category/{category_name}/page/{page_number}'
	'category/(?P<category>[\w-]+)/goods/page/(?P<productPage>[\w-]+)' => [
		'controller' => 'home',
		'action' => 'getGoodsByCategories'
	],
	//Админка
	'admin' => [
		'controller' => 'admin',
		'action' => 'index'
	],
	//Админка категории
	'admin/category/page/(?P<page>[\w-]+)' => [
		'controller' => 'admin',
		'action' => 'getCategories'
	],
	//Админка товары
	'admin/product/page/(?P<page>[\w-]+)' => [
		'controller' => 'admin',
		'action' => 'getProducts'
	],

	'admin/product/delete' => [
		'controller' => 'admin',
		'action' => 'deleteProduct'
	],

	'admin/category/delete' => [
		'controller' => 'admin',
		'action' => 'deleteCategory'
	],

	'admin/category/off' => [
		'controller' => 'admin',
		'action' => 'offCategory'
	],

	'admin/category/on' => [
		'controller' => 'admin',
		'action' => 'onCategory'
	],

	'admin/category/(?P<categoryId>[\w-]+)' => [
		'controller' => 'adminCategory',
		'action' => 'index'
	],

	'admin/product/(?P<productId>[\w-]+)' => [
		'controller' => 'adminProduct',
		'action' => 'index'
	],

	'admin/category' => [
		'controller' => 'adminCategory',
		'action' => 'index'
	],

	'admin/product' => [
		'controller' => 'adminProduct',
		'action' => 'index'
	]

];