<?php
class User
{
	private $addUser_req;
    private $verifEmailRegister_req;
    private $verifEmailRegister;
	private $verifMemberIsRegistered_req;

	public function __construct($db)
	{
		$this->addUser_req = $db->prepare("INSERT INTO user (email, name, password) VALUES (:email, :name, :password)");
		$this->verifEmailRegister_req = $db->prepare("SELECT * FROM user WHERE email = :email");
		$this->verifMemberIsRegistered_req = $db->prepare("SELECT count(*) AS nb FROM user WHERE email = :email AND password = :password");
	}

	public function addUser($email, $name, $password)
	{
		$params = array(':email'=>$email, ':name'=>$name, ':password'=>$password);
		$this->addUser_req->execute($params);
		return $this->addUser_req->rowCount();
	}

    public function verifEmailRegister($email)
	{
		$params = array(':email'=>$email);
		$this->verifEmailRegister_req->execute($params);
		return $this->verifEmailRegister_req->rowCount();
	}

	public function getConnexion($email, $password)
	{
		$params = array(':email'=>$email, ':password'=>$password);
		$this->verifMemberIsRegistered_req->execute($params);
		return $this->verifMemberIsRegistered_req->rowCount();
	}
}
?>