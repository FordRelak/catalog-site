<?php


namespace app\core;


abstract class Model
{
    public $db;

    public function __construct()
    {
        $this->db = Registry::get('db');
    }


	public function countRecordInDatabase($table)
	{
		return $this->db->count("SELECT COUNT(*) FROM $table");
	}
}