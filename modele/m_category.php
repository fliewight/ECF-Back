<?php
class Category
{
	private $viewAllCategories_req;
	private $viewAllCategories;
	private $viewCategory_req;
	private $viewCategory;

	public function __construct($db)
	{
		$this->viewAllCategories_req = $db->prepare("SELECT id, name FROM category");
		$this->viewCategory_req = $db->prepare("SELECT id, name FROM category WHERE id = :id");
	}

	public function getAllCategories()
	{
		$this->viewAllCategories_req->execute();
		$this->viewAllCategories = $this->viewAllCategories_req->fetchAll(PDO::FETCH_ASSOC);
		return $this->viewAllCategories;
	}

	public function getCategory($id)
	{
		$params = array(':id'=>$id);
		$this->viewCategory_req->execute($params);
		$this->viewCategory = $this->viewCategory_req->fetchAll(PDO::FETCH_ASSOC);
		return $this->viewCategory;
	}
}
?>