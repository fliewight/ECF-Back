<?php
class Home
{
	private $displayRandomProduct_req;
	private $displayRandomProduct;
	private $displayRandomCrush_req;
	private $displayRandomCrush;
	private $latestProducts_req;
	private $latestProducts;

	public function __construct($db)
	{
		$this->displayRandomProduct_req = $db->prepare("SELECT image FROM product ORDER BY rand() LIMIT 3");
		$this->displayRandomCrush_req = $db->prepare("SELECT image, name, description, price, id FROM product ORDER BY rand() LIMIT 1");
		$this->latestProducts_req = $db->prepare("SELECT image, name, description, price, id FROM product ORDER BY id DESC LIMIT 4");
	}

	public function getRandomProduct()
	{
		$this->displayRandomProduct_req->execute();
		$this->displayRandomProduct = $this->displayRandomProduct_req->fetchAll(PDO::FETCH_ASSOC);
		return $this->displayRandomProduct;
	}

	public function getRandomCrush()
	{
		$this->displayRandomCrush_req->execute();
		$this->displayRandomCrush = $this->displayRandomCrush_req->fetchAll(PDO::FETCH_ASSOC);
		return $this->displayRandomCrush;
	}

	public function getLatestProducts()
	{
		$this->latestProducts_req->execute();
		$this->latestProducts = $this->latestProducts_req->fetchAll(PDO::FETCH_ASSOC);
		return $this->latestProducts;
	}
}
?>