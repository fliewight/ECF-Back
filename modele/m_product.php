<?php
class Product
{
	private $viewAllProducts_req;
	private $viewAllProducts;
	private $latestProduct_req;
	private $latestProduct;

	public function __construct($db)
	{
		$this->viewAllProducts_req = $db->prepare("SELECT image, name, description, price, id FROM product ORDER BY id");
		$this->latestProduct_req = $db->prepare("SELECT image, name, description, price, id FROM product ORDER BY id DESC LIMIT 1");
	}

	public function getAllProducts()
	{
		$this->viewAllProducts_req->execute();
		$this->viewAllProducts = $this->viewAllProducts_req->fetchAll(PDO::FETCH_ASSOC);
		return $this->viewAllProducts;
	}

	public function getLatestProduct()
	{
		$this->latestProduct_req->execute();
		$this->latestProduct = $this->latestProduct_req->fetchAll(PDO::FETCH_ASSOC);
		return $this->latestProduct;
	}
}
?>