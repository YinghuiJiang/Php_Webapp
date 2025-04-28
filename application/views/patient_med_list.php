<html>
<head>
    <title>patient medication list</title>
    
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
      margin-top:10px;
      
    }
    
    
    
  </style>
</head>
<body>
<h3 align="center">Define List of Patient and Medication Intake</h3><br />
  <div class="container box">
    
    <div class="table-responsive">
      <br />
      <table class="table table-striped table-bordered table-hover " >
        <thead>
          <tr>
            
            <th style="text-align:center">Gender</th>
            <th style="text-align:center">Stage</th>
            <th style="text-align:center">Intake Time</th>
          </tr>
        </thead>
          <tr>
            <td style="text-align:center">
                female
            </td>
            <td style="text-align:center">
                adult
            </td>
            <td style="text-align:center">
                8pm
            
            </td>

          </tr>
        <tbody>
        
        </tbody>
      </table>  
      <button type="button" id="btn_search1" name="btn_search1">Search</button>
      
  </div>
  
  </div>


  <div class="container box">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover " >
        <thead>
          <tr>
            
            <th style="text-align:center">Gender</th>
            <th style="text-align:center">Stage</th>
            <th style="text-align:center">Intake Time</th>
          </tr>
        </thead>
          <tr>
            <td style="text-align:center">
                male
            </td>
            <td style="text-align:center">
                infant
            </td>
            <td style="text-align:center">
                8am
            
            </td>

          </tr>
        <tbody>
        
        </tbody>
      </table>  
      <button type="button" id="btn_search2" name="btn_search2">Search</button>


    </div>
  </div>
</body>
</html>

<script>
$(document).ready(function(){
   
    $(document).on('click', '#btn_search1', function(){
    
    $.ajax({
      url:"<?php echo base_url(); ?>patient_med_list/load_query_result1",
      method:"POST",
      dataType:"json",
      success:function(data){
        load_query_result1();
      }
    })
  });
});


    
