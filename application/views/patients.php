<html>
<head>
    <title>Patient Info</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
    body
    {
      margin:0;
      padding:0;
      background-color:#f1f1f1;
      text-align: center;
      
    }
    .box
    {
      width:80%;
      padding:20px;
      background-color:#fff;
      border:2px solid #ccc;
      border-radius:5px;
      margin-top:0px;
      
    }
    
    
    
  </style>
</head>

<!----Navigation Bar---->
<nav class="navbar">
	<div class="container-fluid">
		<!-- Nav Header -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse-1" aria-expanded="false">
                        <span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
                        <a class="navbar-brand" href="<?php echo base_url(); ?>index.php/user/home"><span class="fa fa-home"></span><span class="link"> Home</span></a>
		</div>
		<!-- Nav Collapse -->
		<div class="navbar-collapse collapse" id="collapse-1">
			<!-- Nav Left -->
			<ul class="nav navbar-nav">
				
                                <!-- Patient Data -->
				<li><a href="<?php echo base_url(); ?>index.php/patients"><span class="fa fa-info-circle"></span><span class="link"> Patient Data</span></a></li>
                                <!-- Medication Data -->
				<li><a href="<?php echo base_url(); ?>index.php/medicines"><span class="fa fa-info-circle"></span><span class="link"> Medication Data</span></a></li>
				<!-- Define List -->
				<li><a href="<?php echo base_url(); ?>index.php/patient_med_list"><span class="fa fa-phone"></span><span class="link"> Define List</span></a></li>
                        </ul>
		</div>
	</div>
</nav>



<body>
<h3 align="center" style="color:gray">Patient Information</h3><br />
  <div class="container box">
    <div class="table-responsive">
      <br />
      <table class="table table-striped table-bordered table-hover " >
        <thead>
          <tr>
            <th style="text-align:center">ID</th>
            <th style="text-align:center">Gender</th>
            <th style="text-align:center">Stage</th>
            <th style="text-align:center">Action</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>   
    </div>
  </div>
</body>
</html>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
  
  function load_data()
  {
    $.ajax({
      url:"<?php echo base_url(); ?>patients/load_data",
      dataType:"JSON",
      success:function(data){
        var html = '<tr class="text-center">';
        
        for(var count = 0; count < data.length; count++)
        {
          html += '<tr class="text-center">';
          html += '<td class="table_data" data-row_id="'+data[count].id+'" data-column_name="gender" contenteditable>'+data[count].id+'</td>';
          html += '<td class="table_data" data-row_id="'+data[count].id+'" data-column_name="gender" contenteditable>'+data[count].gender+'</td>';
          html += '<td class="table_data" data-row_id="'+data[count].id+'" data-column_name="stage" contenteditable>'+data[count].stage+'</td>';
          html += '<td><button type="button" name="delete_btn" id="'+data[count].id+'" class="btn  btn_delete" ><span class="glyphicon glyphicon-remove"></span></button></td></tr>';
        }

        html += '<td id="id" contenteditable"></td>';
        html += '<td id="gender" contenteditable placeholder="Enter gender"></td>';
        html += '<td id="stage" contenteditable placeholder="Enter stage"></td>';
        html += '<td class="text-center"><button type="button" name="btn_add" id="btn_add" class="btn btn_add"><span class="glyphicon glyphicon-plus"></span></button></td></tr>';
        $('tbody').html(html);
      }
    });
  }

  load_data();

  $(document).on('click', '#btn_add', function(){
    
    var gender = $('#gender').text();
    var stage = $('#stage').text();
   
    if(gender == '')
    {
      alert('Enter gender');
      return false;
    }
    $.ajax({
      url:"<?php echo base_url(); ?>patients/insert",
      method:"POST",
      data:{ gender:gender, stage:stage},
      success:function(data){
        load_data();
      }
    })
  });

  $(document).on('blur', '.table_data', function(){
    var id = $(this).data('row_id');
    var table_column = $(this).data('column_name');
    var value = $(this).text();
    $.ajax({
      url:"<?php echo base_url(); ?>patients/update",
      method:"POST",
      data:{id:id, table_column:table_column, value:value},
      success:function(data)
      {
        load_data();
      }
    })
  });

  $(document).on('click', '.btn_delete', function(){
    var id = $(this).attr('id');
    if(confirm("Are you sure you want to delete this?"))
    {
      $.ajax({
        url:"<?php echo base_url(); ?>patients/delete",
        method:"POST",
        data:{id:id},
        success:function(data){
          load_data();
        }
      })
    }
  });
  
});
</script>