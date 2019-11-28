<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Authors extends CI_Controller {

	
	public function index()
	{
		$this->load->view('author_view');
	}
	public function save_author()
	{
		//echo 'ins';
		//$this->load->model('Save_model');
		
		$result=$this->Save_model->save_author();
		
		
		redirect('Authors/list_author');
		
		
	}
	public function list_author()
	{
		$table='authors';
		$where=array('is_active'=>1);
		$order_field='author_id';
		$order_by='desc';
		$data['author_list']=$this->Save_model->select_data($table,$where,$order_field,$order_by);
		
		$this->load->view('author_list', $data);
		
	}
	
	public function edit_author($author_id)
	{
		$table='authors';
		$where=array('author_id'=>$author_id);
		$order_field='author_id';
		$order_by='desc';
		$data['author_data']=$this->Save_model->select_data($table,$where,$order_field,$order_by);
		
		$this->load->view('author_view', $data);
		
	}
	
	
	public function delete_author($author_id)
	{
		
		$data['author_data']=$this->Save_model->delete_author($author_id);
		
		redirect('Authors/list_author'); 
		
	}
	
	
	// add Books
	
	
	public function add_book()
	{
		$table='authors';
		$where=array('is_active'=>1);
		$order_field='author_id';
		$order_by='desc';
		$data['author_list']=$this->Save_model->select_data($table,$where,$order_field,$order_by);
		$this->load->view('book_view',$data);
	}
	public function save_book()
	{
		//echo 'ins';
		//$this->load->model('Save_model');
		
		$result=$this->Save_model->save_book();
		
		
		redirect('Authors/list_book');
		
		
	}
	public function list_book()
	{
		$table='books';
		$where=array('is_active'=>1);
		$order_field='book_id';
		$order_by='desc';
		$data['book_list']=$this->Save_model->select_data($table,$where,$order_field,$order_by);
		
		$this->load->view('book_list', $data);
		
	}
	
	public function edit_book($book_id)
	{
		$table='books';
		$where=array('book_id'=>$book_id);
		$order_field='book_id';
		$order_by='desc';
		$data['book_data']=$this->Save_model->select_data($table,$where,$order_field,$order_by);
		
		$table='authors';
		$where=array('is_active'=>1);
		$order_field='author_id';
		$order_by='desc';
		$data['author_list']=$this->Save_model->select_data($table,$where,$order_field,$order_by);
		
		$this->load->view('book_view', $data);
		
	}
	
	
	public function delete_book($book_id)
	{
		
		$data['book_data']=$this->Save_model->delete_book($book_id);
		
		redirect('Authors/list_book'); 
		
	}
	public function author_book()
	{
		$table='authors';
		$where=array();
		$order_field='author_id';
		$order_by='desc';
		$data['author_list']=$this->Save_model->select_data($table,$where,$order_field,$order_by);
		
		$table='books';
		$where=array();
		$order_field='book_id';
		$order_by='desc';
		$data['book_list']=$this->Save_model->select_data($table,$where,$order_field,$order_by);
		
		$table='author_book_connection';
		$where=array();
		$order_field='conn_id';
		$order_by='desc';
		$data['conn_list']=$this->Save_model->select_data($table,$where,$order_field,$order_by);
		
		
		$this->load->view('author_book_view',$data);
	}
	public function add_author_book()
	{
		
		
		
		
		$result=$this->Save_model->add_author_book();
		
		
		redirect('Authors/author_book');
	}
}
