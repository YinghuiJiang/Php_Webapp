<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <title>Home</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <style>
        body
        {
          margin:0;
          padding:0;
          background-color:#f1f1f1;
          text-align: center;
      
        }
        p{
        position: fixed;
        top: 2%;
        right: 20px;     
        }
        a.userid{
        position: fixed;
        top: 5%;
        right: 20px;

        }
        a.block{
                font-size: 20px;
                
        }
        .box{
                width:100%;
                height:100%;
                padding:20px;
                background-color:#fff;
                border:1px solid #ccc;
                border-radius:5px;
                margin-top:10%;
        }
        li {
  float: left;
  
}
        </style>
</head>
<body>

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







<div class="container">
        <div class="row">
                <div class="col-md-4 col-md-offset-4">
                        <?php
                                $user = $this->session->userdata('user');
                                extract($user);
                        ?>
                        <h2 style="color:gray">Welcome to Homepage! </h2>
                        <p>User ID: <?php echo $userid; ?></p>
                        
                        <a href="<?php echo base_url(); ?>index.php/user/logout" class="btn btn-danger userid">Logout</a>
                        
                <div class="container box">
                   <ul>
                       <li> <a href="<?php echo base_url(); ?>index.php/patients" class="block">Patient Data</a></li>
                        <br>
                        <br>
                        <li><a href="<?php echo base_url(); ?>index.php/medicines" class="block">Medication Data</a></li>
                        <br>
                        <br>
                        <li><a href="<?php echo base_url(); ?>index.php/patient_med_list" class="block">Define List</a></li>
                    </ul>
                </div>
                        
                </div>
        </div>
</div>
</body>
</html>

