<?php


namespace app\controllers;


use app\core\Controller;

class HomeController extends Controller
{
	private $productPage = 0;
	private $categoryPage = 0;
	private const RECORD_PER_PAGE = 5;

	public function __construct($route)
	{
		parent::__construct($route);
		if (isset($route[0]['productPage'])) {
			$this->productPage = $route[0]['productPage'];
		}
		if (isset($route[0]['categoryPage'])) {
			$this->categoryPage = $route[0]['categoryPage'];
		}

	}

	public function indexAction()
	{
		$startProduct = $this->productPage * self::RECORD_PER_PAGE;
		$startCategory = $this->categoryPage * self::RECORD_PER_PAGE;

		$this->loadModel('Product');
		$this->loadModel('Category');

		$result['Products']['Page'] = ceil($this->model['Product']->countRecordInDatabase('goods') / self::RECORD_PER_PAGE);
		$result['Category']['Page'] = ceil($this->model['Category']->countRecordInDatabase('categories') / self::RECORD_PER_PAGE);


		$result['Products']['Data'] = $this->model['Product']->getProducts($startProduct, self::RECORD_PER_PAGE);
		$result['Category']['Data'] = $this->model['Category']->getCategories($startCategory, self::RECORD_PER_PAGE);

		$this->view->render("Home", 'home/', ['products', 'categories'], $result);
	}

	public function getGoodsByCategoriesAction()
	{
		$startCategory = $this->categoryPage * self::RECORD_PER_PAGE;
		$startProduct = $this->productPage * self::RECORD_PER_PAGE;

		//Загружаем модель
		$this->loadModel('Product');
		$this->loadModel('Category');

		$category = $this->route[0]['category'];

		/*$result['Products']['Page'] = ceil($this->model['Product']->countRecordInDatabase('goods') / self::RECORD_PER_PAGE);
		$result['Category']['Page'] = ceil($this->model['Category']->countRecordInDatabase('categories') / self::RECORD_PER_PAGE);*/

		$result['Products']['Data'] = $this->model['Product']->getGoodsByCategory($category, $startProduct, self::RECORD_PER_PAGE);
		$result['Products']['Category'] = $this->model['Category']->getCategoryByName($category)[0];
		$result['Category']['Data'] = $this->model['Category']->getCategories($startCategory, self::RECORD_PER_PAGE);

		$result['Products']['Page'] = ceil($this->model['Product']->getCountGoodsByCategory($category)/ self::RECORD_PER_PAGE);
		$result['Category']['Page'] = ceil($this->model['Category']->countRecordInDatabase('categories') / self::RECORD_PER_PAGE);

		//Загружаем view
		$this->view->render("Home", 'home/', ['products', 'categories'], $result);
	}


}