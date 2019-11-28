<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet" >
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" >
<br><br>
<div class="container">
<h4> Book List </h4>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Sr.No</th>
                <th>Book Title</th>                
                <th>Author Name</th>
                <th>Book Status</th>
                <th>Action</th>
               
            </tr>
        </thead>
        <tbody>
		<?php $i=0;foreach($book_list as $res) {  $i++;
		$author_id= explode(',',$res->author_id);
		
		// echo count($author_id);
		$author_name='';
		 for($i=0;$i<count($author_id);$i++)
		 {
			$author_id[$i];
			$this->db->select('first_name');
			$this->db->from('authors');
			$this->db->where('author_id',$author_id[$i]);			
			 $author_name[]=$this->db->get()->row()->first_name;
			 

		 }
		?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $res->book_title; ?></td>
                <td><?php echo implode(',',$author_name);?></td>
               
                <td><?php echo ($res->is_active==1)? 'Active': 'Inactive'; ?></td>
                <td><a href='<?php echo base_url()?>index.php/Authors/edit_book/<?php echo $res->book_id; ?>'><button >Edit</button ></a>&nbsp;&nbsp;
				<a href='<?php echo base_url()?>index.php/Authors/delete_book/<?php echo $res->book_id; ?>'><button >delete</button >
				</td>
                
            </tr>
		<?php } ?>
			</tbody>
			</table>
			</div>
			<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
			<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
			<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
			


			<script>
			
			$(document).ready(function() {
    $('#example').DataTable();
} );
			</script>
			
			