<?php
class Category
{
	private $viewAllCategories_req;
	private $viewAllCategories;

	public function __construct($db)
	{
		$this->viewAllCategories_req = $db->prepare("SELECT id, name FROM category");
	}

	public function getAllCategories()
	{
		$this->viewAllCategories_req->execute();
		$this->viewAllCategories = $this->viewAllCategories_req->fetchAll(PDO::FETCH_ASSOC);
		return $this->viewAllCategories;
	}
}
?>