<html>
<head>
    <title>Define List of Patients and Medications</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
    * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        
        body {
            background-color: #eee;
            color: #333;
            line-height: 1.6;
            
        }
        
        /* container */
        .container {
            max-width: 65%;
            margin: 0 auto;
            padding: 20px;
        }
        
        /* card */
        .card {
            background: #fff;
            margin-bottom: 30px;
            overflow: hidden;
        }
        
        .card-header {
            background:rgb(42, 140, 221);
            color: white;
            padding: 15px 20px;
            font-size: 18px;
            font-weight: bold;
        }
        
        .card-body {
            padding: 20px;
        }
        
        /* form */
        .filter-form {
            display: flex;
            margin-bottom: 15px;
        }
        
        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            margin-right: 20px;
        }
        
        .form-group label {
            display: block;
            color: #555;
            margin-right: 8px;
            white-space: nowrap;
        }
        
        .form-select {
            width: 100%;
            padding: 5px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        
        .form-select:focus {
            border-color:rgb(151, 151, 151);
            outline: none;
            box-shadow: 0 0 0 2px rgba(66, 133, 244, 0.2);
        }
        
        .form-btn {
            display: inline-block;
            padding: 6px 20px;
            background:rgb(255, 255, 255);
            color: black;
            border: 2px solid rgb(42, 140, 221);
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        
        /* result */
        .result-count {
            font-size: 16px;
            color: #666;
            margin-bottom: 15px;
            padding: 5px 0;
        }
        
        .alert {
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            background: #fff3cd;
            color: #856404;
            border-left: 4px solid #ffeeba;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 15px;
        }
        
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #f8f9fa;
            font-weight: 600;
            color: #555;
            position: sticky;
            top: 0;
        }
        
        tr:hover {
            background-color: #f5f5f5;
        }
    
    
    
  </style>
</head>
<body>

<!-- Navigation Bar -->
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
        <div class="card">
            <div class="card-header">Define List of Patients and Medications</div>
            <div class="card-body">
                <form method="post" class="filter-form">
                    <div class="form-group">
                        <label for="gender">gender</label>
                        <select name="gender" id="gender" class="form-select">
                            <?php foreach ($gender as $g): ?>
                            <option value="<?= $g['gender'] ?>" <?= ($this->input->post('gender') == $g['gender']) ? 'selected' : '' ?>>
                                <?= $g['gender'] ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="stage">stage</label>
                        <select name="stage" id="stage" class="form-select">
                            <?php foreach ($stage as $s): ?>
                            <option value="<?= $s['stage'] ?>" <?= ($this->input->post('stage') == $s['stage']) ? 'selected' : '' ?>>
                                <?= $s['stage'] ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="intake_time">intake time</label>
                        <select name="intake_time" id="intake_time" class="form-select">
                            <?php foreach ($intake_time as $t): ?>
                            <option value="<?= $t['intake_time'] ?>" <?= ($this->input->post('intake_time') == $t['intake_time']) ? 'selected' : '' ?>>
                                <?= $t['intake_time'] ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="form-btn">Search</button>
                    </div>
                </form>
            </div>
        
            <?php if (isset($results)): ?>
                <?php if (!empty($results)): ?>
                <div class="card-header">There are <?= count($results) ?> possible combinations</div>
                <div class="card-body">
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Patient ID</th>
                                        <th>Gender</th>
                                        <th>Stage</th>
                                        <th>Medication ID</th>
                                        <th>IntakeTime</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                  
                                    <?php foreach ($results as $row): ?>
                                    <tr>
                                        <td><?= $row['id'] ?></td>
                                        <td><?= $row['gender'] ?></td>
                                        <td><?= $row['stage'] ?></td>
                                        <td><?= $row['med_ID'] ?></td>
                                        <td><?= $row['intake_time'] ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="card-body">
                        <div class="alert">No possible combinations!</div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>