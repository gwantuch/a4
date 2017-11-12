<?php
class Category extends Model {
	
	function getCategory($categoryID){
		
		$sql =  'SELECT * FROM categories WHERE categoryID = ?;';
		
		// perform query
		$category = $this->db->getrow($sql, array($categoryID));
		
		return $category;
	}
	
	function getCategories(){
		
		$sql =  'SELECT * FROM categories;';
		
		// perform query
		$categories = $this->db->getrow($sql);
	
		return $categories;
	
	}
}