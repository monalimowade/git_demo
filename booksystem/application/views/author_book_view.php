<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" >
<!------ Include the above in your HEAD tag ---------->
<style>
body {
    
    background-size: cover;
}

*[role="form"] {
    max-width: 530px;
    padding: 15px;
    margin: 0 auto;
    border-radius: 0.3em;
    background-color: #f2f2f2;
}

*[role="form"] h2 { 
    font-family: 'Open Sans' , sans-serif;
    font-size: 40px;
    font-weight: 600;
    color: #000000;
    margin-top: 5%;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 4px;
}

</style>
<?php foreach($author_data as $res) ?>

<div class="container">
            <form  method='POST'class="form-horizontal" role="form" action='<?php echo base_url();?>index.php/Authors/add_author_book' >
                <h2>Assign Book-Author</h2>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Book Name</label>
                    <div class="col-sm-9">
					<input type="hidden" name="check" placeholder="" class="form-control" autofocus value='<?php echo $res->book_id; ?>'>
                       <select name="book_name[]" multiple="multiple" class="form-control" >
					   <?php foreach($book_list as $bookres) { ?>
  <option value="<?php echo $bookres->book_id;?>"><?php echo $bookres->book_title; ?></option>
 
					   <?php } ?>
</select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label">Author Name</label>
                    <div class="col-sm-9">
                       <select name="author_name[]" multiple="multiple" class="form-control" >
					   <?php foreach($author_list as $autres) { ?>
  <option value="<?php echo $autres->author_id;?>"><?php echo $autres->first_name.' '.$autres->last_name; ?></option>
 
					   <?php } ?>
</select>
                    </div>
                </div>
                
                
                
                <button type="submit" class="btn btn-primary btn-block"><?php echo ($res->author_id=='')? 'Assign': 'Edit'; ?>  Book Author</button>
            </form> <!-- /form -->
        </div> <!-- ./container -->
		<br><br>
<div class="container">
<h4> Book-Author List </h4>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Sr.No</th>
                <th>Book Name</th>                
                <th>Author Name</th>
                
               
            </tr>
        </thead>
        <tbody>
		<?php $i=0;foreach($conn_list as $conn_list) {  $i++;
		$author_id= explode(',',$conn_list->author_id);
		$book_id= explode(',',$conn_list->book_id);
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
		 
		 $book_name='';
		 for($i=0;$i<count($book_id);$i++)
		 {
			$author_id[$i];
			$this->db->select('book_title');
			$this->db->from('books');
			$this->db->where('book_id',$book_id[$i]);			
			 $book_name[]=$this->db->get()->row()->book_title;
		 }
		
		?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo implode(',',$book_name);?></td>
                <td><?php echo implode(',',$author_name); ?></td>
               
               
                
            </tr>
		<?php } ?>
			</tbody>
			</table>
			</div>
		
		<script>
		$('.date').datepicker({format: "yyyy-mm-dd",
		
		}); 
		$(document).ready(function() {
 $('#example').DataTable();
});
 
		</script>