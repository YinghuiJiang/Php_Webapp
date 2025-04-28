<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
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
      padding:20px;
      background-color:#fff;
      border:1px solid #ccc;
      border-radius:5px;
      margin-top:10%;
       }
    </style>
</head>
<body>
<div class="container box">
  <h3 style="color:gray">Login - Medical Data Management System</h>
<div class="container">
    <h1 class="page-header text-center"></h1>
      <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
          <div class="login-panel panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><span class="glyphicon glyphicon-lock"></span> Login
              </h3>
            </div>
            <div class="panel-body">
              <form method="POST" action="<?php echo base_url(); ?>index.php/user/login">
                <fieldset>
                  <div class="form-group">
                    <input class="form-control" placeholder="User ID" type="number" name="userid" required>
                      </div>
                        <div class="form-group">
                          <input class="form-control" placeholder="Password" type="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-lg btn-primary btn-block"><span class="glyphicon glyphicon-log-in"></span> Login</button>
                </fieldset>
              </form>
            </div>
        </div>
        <?php
            if($this->session->flashdata('error')){
            ?>
            <div class="alert alert-danger text-center" style="margin-top:20px;">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
</div>
</body>
</html>