<?php
class Product
{
	private $viewAllProducts_req;
	private $viewAllProducts;
	private $latestProduct_req;
	private $latestProduct;
	private $viewProduct_req;
	private $viewProduct;

	public function __construct($db)
	{
		$this->viewAllProducts_req = $db->prepare("SELECT image, name, description, price, id FROM product");
		$this->latestProduct_req = $db->prepare("SELECT image, name, description, price, id FROM product ORDER BY id DESC LIMIT 1");
		$this->viewProduct_req = $db->prepare("SELECT image, name, description, price, id FROM product WHERE id = :id");
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

	public function getProduct($id)
	{
		$params = array(':id'=>$id);
		$this->viewProduct_req->execute($params);
		$this->viewProduct = $this->viewProduct_req->fetchAll(PDO::FETCH_ASSOC);
		return $this->viewProduct;
	}
}
?>