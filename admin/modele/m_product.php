<?php
class AdminProduct
{
	private $addProduct_req;
	private $viewProduct_req;
	private $viewProduct;
	private $viewAllProducts_req;
	private $viewAllProducts;
	private $updateProduct_req;
	private $deleteProduct_req;

	public function __construct($db)
	{
		$this->addProduct_req = $db->prepare("INSERT INTO product (name, description, price, slug, creation_date, colors_list, image, promotion, category_id) VALUES (:name, :description, :price,:slug, :creation_date, :colors_list, :image, :promotion, :category_id)");
		$this->viewProduct_req = $db->prepare("SELECT name, description, price, slug, colors_list, promotion FROM product WHERE id = :id");
		$this->viewAllProducts_req = $db->prepare("SELECT image, name, description, price, id FROM product ORDER BY id");
		$this->updateProduct_req = $db->prepare("UPDATE product SET name = :name, description = :description, price = :price, slug = :slug, colors_list = :colors_list, promotion = :promotion WHERE id = :id");
		$this->deleteProduct_req = $db->prepare("DELETE FROM product WHERE id = :id");
	}

	public function addProduct($name, $description, $price, $slug, $creation_date, $colors_list, $image, $promotion, $category_id)
	{
		$params = array(':name'=>$name, 'description'=>$description, 'price'=>$price, 'slug'=>$slug, 'creation_date'=>$creation_date, 'colors_list'=>$colors_list, 'image'=>$image, 'promotion'=>$promotion, 'category_id'=>$category_id);
		$this->addProduct_req->bindParam(':name', $name, PDO::PARAM_STR);
		$this->addProduct_req->bindParam(':description', $description, PDO::PARAM_STR);
		$this->addProduct_req->bindParam(':price', $price, PDO::PARAM_INT);
		$this->addProduct_req->bindParam(':slug', $slug, PDO::PARAM_STR);
		$this->addProduct_req->bindParam(':creation_date', $creation_date, PDO::PARAM_STR);
		$this->addProduct_req->bindParam(':colors_list', $colors_list, PDO::PARAM_STR);
		$this->addProduct_req->bindParam(':image', $image, PDO::PARAM_STR);
		$this->addProduct_req->bindParam(':promotion', $promotion, PDO::PARAM_INT);
		$this->addProduct_req->bindParam(':category_id', $category_id, PDO::PARAM_INT);
		$this->addProduct_req->execute($params);
		return $this->addProduct_req->rowCount();
	}

	public function getProduct($id)
	{
		$params = array(':id'=>$id);
		$this->viewProduct_req->execute($params);
		$this->viewProduct = $this->viewProduct_req->fetchAll(PDO::FETCH_ASSOC);
		return $this->viewProduct;
	}

	public function getAllProducts()
	{
		$this->viewAllProducts_req->execute();
		$this->viewAllProducts = $this->viewAllProducts_req->fetchAll(PDO::FETCH_ASSOC);
		return $this->viewAllProducts;
	}

	public function setProduct($name, $description, $price, $slug, $colors_list, $promotion, $id)
	{
		$params = array(':name'=>$name, ':description'=>$description, 'price'=>$price, ':slug'=>$slug, ':colors_list'=>$colors_list, ':promotion'=>$promotion, ':id'=>$id);
		$this->updateProduct_req->execute($params);
		return $this->updateProduct_req->rowCount();
	}

	public function deleteProduct($id)
	{
		$params = array(':id'=>$id);
		$this->deleteProduct_req->execute($params);
		return $this->deleteProduct_req->rowCount();
	}
}
?>