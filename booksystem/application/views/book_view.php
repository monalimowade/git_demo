
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js"></script>
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
<?php foreach($book_data as $res) ?>

<div class="container">
            <form  method='POST'class="form-horizontal" role="form" action='<?php echo base_url();?>index.php/Authors/save_book' >
                <h2>Add Book</h2>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Book Title</label>
                    <div class="col-sm-9">
                        <input type="text" name="book_title" placeholder="Book Title" class="form-control" value='<?php echo $res->book_title; ?>' autofocus>
                        <input type="hidden" name="check" placeholder="" class="form-control" autofocus value='<?php echo $res->book_id; ?>'>
                    </div>
                </div>
				
				 <div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label">Author Name</label>
                    <div class="col-sm-9">
                       <select name="author_name[]" multiple="multiple" class="form-control" value='<?php echo $res->author_id ?>' >
					   <?php foreach($author_list as $autres) { 
					   //$author_id= explode(',',$conn_list->author_id);
$weekendArr=explode(',',$res->author_id);
					   if($autres->author_id==''){ ?>
  <option value="<?php echo $autres->author_id;?>"><?php echo $autres->first_name.' '.$autres->last_name; ?></option>
 
					   <?php } else { 
					   $weekendArr='';
					  $weekendArr=$autres->author_id;
		 for($i=0;$i<count($weekendArr);$i++)
		 {
			echo $author_id[$i];
			/* $this->db->select('first_name');
			$this->db->from('authors');
			$this->db->where('author_id',$author_id[$i]);			
			 $author_name[]=$this->db->get()->row()->first_name; */
			 

		 }
					   ?>
					   <option value="<?php echo $autres->author_id;?>"  <?php echo in_array($author_id[$i], $weekendArr)  ? "'selected:selected'" : ""; ?> ><?php echo $autres->first_name.' '.$autres->last_name; ?></option>
 
					   <?php }} ?>
</select>

                    </div>
                </div>
               
                
                <button type="submit" class="btn btn-primary btn-block"> <?php echo ($res->book_id=='')? 'Add': 'Edit'; ?>  Book </button>
            </form> <!-- /form -->
        </div> <!-- ./container -->
		
		<script>
		$('.date').datepicker({format: "yyyy-mm-dd",
		
		}); 
		</script>