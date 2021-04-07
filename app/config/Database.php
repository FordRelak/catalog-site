<?php


namespace app\config;

use PDO;

class Database
{
	protected $db;

	public function __construct()
	{
		$config = require 'app/config/db.php';
		$this->db = new PDO('mysql:host = ' . $config['host'] . ';dbname=' . $config['dbname'],
							$config['login'],
							$config['password']);
	}

	protected function query($sql, $params = [])
	{
		$stmt = $this->db->prepare($sql);
		if (!empty($params)) {
			foreach ($params as $key => $val) {
				$stmt->bindValue(':' . $key, $val);
			}
		}
		$stmt->execute();
		return $stmt;
	}

	public function row($sql, $params = [])
	{
		$result = $this->query($sql, $params);
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	public function column($sql, $params = [])
	{
		$result = $this->query($sql, $params);
		return $result->fetchColumn();
	}

	public function count($sql)
	{
		return intval($this->db->query($sql)->fetch()[0]);
	}

	public function lastInsertId()
	{
		return $this->db->lastInsertId();
	}
}