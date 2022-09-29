<?php
class User
{
	private $addUser_req;
    private $verifEmailRegister_req;
    private $verifEmailRegister;

	public function __construct($db)
	{
		$this->addUser_req = $db->prepare("INSERT INTO user (email, password) VALUES (:email, :password)");
		$this->verifEmailRegister_req = $db->prepare("SELECT email FROM user WHERE email = :email");
	}

	public function addUser($email, $password)
	{
		$params = array(':email'=>$email, ':password'=>$password);
		$this->addUser_req->execute($params);
		return $this->addUser_req->rowCount();
	}

    public function verifEmailRegister($email)
	{
		$params = array(':email'=>$email);
		$this->verifEmailRegister_req->execute($params);
		return $this->verifEmailRegister_req->rowCount();
	}
}
?>