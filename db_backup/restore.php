

<?php
$conn = new mysqli("localhost", "root", "", "pd_istanablock");

$conn->query('SET foreign_key_checks = 0');
if ($result = $conn->query("SHOW TABLES"))
{
    while($row = $result->fetch_array(MYSQLI_NUM))
    {
        $conn->query('DROP TABLE IF EXISTS '.$row[0]);
    }
}

$conn->query('SET foreign_key_checks = 1');

if (! empty($_FILES)) {
    // Validating SQL file type by extensions
    if (! in_array(strtolower(pathinfo($_FILES["backup_file"]["name"], PATHINFO_EXTENSION)), array(
        "sql"
    ))) {
        $response = array(
            "type" => "error",
            "message" => "Invalid File Type"
        );
    } else {
        if (is_uploaded_file($_FILES["backup_file"]["tmp_name"])) {
            move_uploaded_file($_FILES["backup_file"]["tmp_name"], $_FILES["backup_file"]["name"]);
            $response = restoreMysqlDB($_FILES["backup_file"]["name"], $conn);
        }
    }
}

function restoreMysqlDB($filePath, $conn)
{
   
    $sql = '';
    $error = '';
    
    if (file_exists($filePath)) {
        $lines = file($filePath);
        
        foreach ($lines as $line) {
            
            // Ignoring comments from the SQL script
            if (substr($line, 0, 2) == '--' || $line == '') {
                continue;
            }
            
            $sql .= $line;
            
            if (substr(trim($line), - 1, 1) == ';') {
                $result = mysqli_query($conn, $sql);
                if (! $result) {
                    $error .= mysqli_error($conn) . "\n";
                }
                $sql = '';
            }
        } // end foreach
        
        if ($error) {
            $response = array(
                "type" => "error",
                "message" => $error
            );
        } else {
            $response = array(
                "type" => "success",
                "message" => "Database Restore Completed Successfully."
            );
        }
        exec('rm ' . $filePath);
    } // end if file exists
    
    return $response;
}

?>
<html>
<head>
<title>MySQL database restore using PHP</title>
<style>
body {
	max-width: 550px;
	font-family: "Segoe UI", Optima, Helvetica, Arial, sans-serif;
}

.wrapper {
    position: absolute;
    width: 50%;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.wrapper h2 {
    text-align: center;
}

#frm-restore {
	background: #aee5ef;
	padding: 20px;
	border-radius: 2px;
	border: #a3d7e0 1px solid;
}

.form-row {
	margin-bottom: 20px;
    text-align: center;
}

.input-file {
	background: #FFF;
    text-align: center;
    width: 50%;
	padding: 10px;
	margin-top: 5px;
	border-radius: 2px;
}

.btnsubmit {
    text-align: center;
}

.btn-action {
	background: #333;
    width: 50%;
	border: 0;
	padding: 10px 40px;
	color: #FFF;
	border-radius: 2px;
    cursor: pointer;
    transition: .7s;
}

.btn-action:hover{
	box-shadow: 0 0 5px #333;
}

.response {
	padding: 10px;
	margin-bottom: 20px;
    border-radius: 2px;
}

.error {
    background: #fbd3d3;
    border: #efc7c7 1px solid;
}

.success {
    background: #cdf3e6;
    border: #bee2d6 1px solid;
}
</style>
</head>
<body>
    <div class="wrapper">
        <h2>Restore Database Istana Block</h2>
        <?php
        if (! empty($response)) {
            ?>
        <div class="response <?php echo $response["type"]; ?>">
        <?php echo nl2br($response["message"]); ?>
        </div>
        <?php
        }
        ?>
            <form method="post" action="" enctype="multipart/form-data"
                id="frm-restore">
                <div class="form-row">
                    <div>Choose Backup File</div>
                    <div>
                        <input type="file" name="backup_file" class="input-file" />
                    </div>
                </div>
                <div class="btnsubmit">
                    <input type="submit" name="restore" value="Restore"
                        class="btn-action" />
                </div>
            </form>
    </div>
</body>
</html>