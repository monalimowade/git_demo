<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Save_model extends CI_Model {
	
	public function save_author()
	{
		if($_POST['check']=='')
		{
		$insert_data=array(
		'first_name'=> $_POST['firstName'],
		'last_name'=> $_POST['lastName'],
		'date_of_birth'=> date('Y-m-d',strtotime($_POST['birthDate'])),
		
		);
		$this->db->insert('authors',$insert_data);
		}else
		{
		$update_data=array(
		'first_name'=> $_POST['firstName'],
		'last_name'=> $_POST['lastName'],
		'date_of_birth'=> date('Y-m-d',strtotime($_POST['birthDate'])),
		
		);
		$where=array('author_id'=>$_POST['check']);
		$this->db->where($where);
		$this->db->update('authors',$update_data);
			
		}
		
	}
	public function select_data($table,$where,$order_field,$order_by)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($where);
		$this->db->order_by($order_field,$order_by);
		
		$query = $this->db->get();
		 return $query->result();
		
	}
	public function delete_author($author_id)
	{
		$update_data=array('is_active'=>0);
		$where=array('author_id'=>$author_id);
		$this->db->where($where);
		$this->db->update('authors',$update_data);
	}
	
	public function save_book()
	{
		$author_name= $_POST['author_name'];
		$author_name = implode(', ', $author_name);
		if($_POST['check']=='')
		{
		$insert_data=array(
		'book_title'=> $_POST['book_title'],
		'author_id'=> $author_name,
		
		
		);
		$this->db->insert('books',$insert_data);
		}else
		{
		$update_data=array(
		'book_title'=> $_POST['book_title'],
		'author_id'=> $author_name,
		
		);
		$where=array('book_id'=>$_POST['check']);
		$this->db->where($where);
		$this->db->update('books',$update_data);
			
		}
		
	}
	
	public function delete_book($book_id)
	{
		$update_data=array('is_active'=>0);
		$where=array('book_id'=>$book_id);
		$this->db->where($where);
		$this->db->update('books',$update_data);
	}
	public function add_author_book()
	{
		$author_name= $_POST['author_name'];
		$author_name = implode(', ', $author_name);
		
		$book_name= $_POST['book_name'];
		$book_name = implode(', ', $book_name);
		
		if($_POST['check']=='')
		{
			
		$insert_data=array(
		'author_id'=> $author_name,
		'book_id'=> $book_name,
		
		
		);
		$this->db->insert('author_book_connection',$insert_data);
		}else
		{
		$update_data=array(
		'author_id'=> $author_name,
		'book_id'=> $book_name,
		
		);
		$where=array('conn_id'=>$_POST['check']);
		$this->db->where($where);
		$this->db->update('author_book_connection',$update_data);
			
		}
	}
}
