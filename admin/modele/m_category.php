<?php
class CategoryAdmin
{
	private $viewAllCategories_req;
	private $viewAllCategories;
	private $searchCategoryId_req;
	private $searchCategoryId;

	public function __construct($db)
	{
		$this->viewAllCategories_req = $db->prepare("SELECT id, name FROM category");
		$this->searchCategoryId_req = $db->prepare("SELECT id FROM category WHERE name = :name");
	}

	public function getAllCategories()
	{
		$this->viewAllCategories_req->execute();
		$this->viewAllCategories = $this->viewAllCategories_req->fetchAll(PDO::FETCH_ASSOC);
		return $this->viewAllCategories;
	}

	public function searchCategoryId($name)
	{
		$params = array(':name'=>$name);
		$this->searchCategoryId_req->execute($params);
		$this->searchCategoryId = $this->searchCategoryId_req->fetchAll(PDO::FETCH_ASSOC);
		return $this->searchCategoryId;
	}
}
?>