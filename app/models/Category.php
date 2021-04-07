<?php


namespace app\models;


use app\core\Model;

class Category extends Model
{
	public function getCategories($start, $take)
	{
		//SELECT * FROM categories LIMIT start, take
		return $this->db->row('SELECT id as `categoryId`, 
							   category_name as `categoryName`, 
							   description_short as `categoryDescSh`, 
							   description_full as `categoryDescFl`, 
							   is_activity as `isActivity` 
                                FROM categories 
                                LIMIT ' . $start . ', ' . $take);
	}
	public function getAllCategories()
	{
		return $this->db->row('SELECT id as `categoryId`, 
							   category_name as `categoryName`, 
							   description_short as `categoryDescSh`, 
							   description_full as `categoryDescFl`, 
							   is_activity as `isActivity` 
                                FROM categories');
	}

	public function getCategoryByName($categoryName)
	{
		return $this->db->row('SELECT id as `categoryId`, 
							   category_name as `categoryName`, 
							   description_short as `categoryDescSh`, 
							   description_full as `categoryDescFl`, 
							   is_activity as `isActivity` 
								FROM categories
								WHERE category_name=:categoryName',
							  [
								  'categoryName' => $categoryName
							  ]);
	}

	public function getCategoryById($id)
	{
		return $this->db->row('SELECT id as `categoryId`, 
							   category_name as `categoryName`, 
							   description_short as `categoryDescSh`, 
							   description_full as `categoryDescFl`, 
							   is_activity as `isActivity` 
								FROM categories
								WHERE id=:id',
							  [
								  'id' => $id
							  ])[0];
	}

	public function offCategoryById($id)
	{
		$this->db->row('UPDATE categories SET is_activity = 0 WHERE id = :id',
					   [
						   'id' => $id
					   ]);
	}

	public function onCategoryById($id)
	{
		$this->db->row('UPDATE categories SET is_activity = 1 WHERE id = :id',
					   [
						   'id' => $id
					   ]);
	}

	public function deleteCategoryById($id)
	{

		$this->db->row('DELETE FROM category_product WHERE category_id=:id',
					   [
						   'id' => $id
					   ]);
		$this->db->row('DELETE FROM categories WHERE id=:id',
					   [
						   'id' => $id
					   ]);
	}

	public function update($id, $name, $sh, $fl)
	{
		$this->db->row("UPDATE categories SET category_name = :name, description_short = :sh, description_full = :fl
						WHERE id = :id",
					   [
						   'id' => $id,
						   'name' => $name,
						   'sh' => $sh,
						   'fl' => $fl
					   ]);
	}

	public function add($name, $sh, $fl)
	{
		$this->db->row("INSERT INTO categories(category_name, description_short, description_full, is_activity) 
						VALUES ('$name', '$sh', '$fl', 1)");
	}
}