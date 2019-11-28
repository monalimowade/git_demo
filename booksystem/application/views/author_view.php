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
<?php foreach($author_data as $res) ?>

<div class="container">
            <form  method='POST'class="form-horizontal" role="form" action='<?php echo base_url();?>index.php/Authors/save_author' >
                <h2>Add Author</h2>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">First Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="firstName" placeholder="First Name" class="form-control" value='<?php echo $res->first_name; ?>' autofocus>
                        <input type="hidden" name="check" placeholder="" class="form-control" autofocus value='<?php echo $res->author_id; ?>'>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label">Last Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="lastName" placeholder="Last Name" class="form-control" autofocus value='<?php echo $res->last_name; ?>'>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="birthDate" class="col-sm-3 control-label ">Date of Birth</label>
                    <div class="col-sm-9">
                        <input type="text" name="birthDate" class="form-control date" value='<?php echo $res->date_of_birth; ?>'>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary btn-block"><?php echo ($res->author_id=='')? 'Add': 'Edit'; ?> Author</button>
            </form> <!-- /form -->
        </div> <!-- ./container -->
		
		<script>
		$('.date').datepicker({format: "yyyy-mm-dd",
		autoclose: true,
		
		}); 
		</script>