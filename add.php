<?php
$error = "";
if (!empty($_POST['submit'])){
$tieude = $_POST['name'];
$noidung = $_POST['textt'];
$today = date("Y-m-d"); 
$error = "Đăng bài viết thành công!";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "members";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO timeline (title, content, date)
VALUES ('$tieude', '$noidung', '$today')";

if ($conn->query($sql) === FALSE) {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

}
?>
<head>
<meta charset="utf-8">
<title>Timeline</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container py-5">
<form method="POST" action="add.php">
<label for="name">Tiêu đề:</label><br>
  <input type="text" id="name" name="name"><br><br>
  
  <label for="textt">Nội dung:</label><br>

<textarea id="textt" name="textt" rows="4" cols="50"></textarea><br><br>
<input type="submit" name="submit">
<br><br>
<p><?php echo $error;?></p>
</form>
    </div>
	<style>
	/*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*
*/

/* Timeline holder */
ul.timeline {
    list-style-type: none;
    position: relative;
    padding-left: 1.5rem;
}

 /* Timeline vertical line */
ul.timeline:before {
    content: ' ';
    background: #fff;
    display: inline-block;
    position: absolute;
    left: 16px;
    width: 4px;
    height: 100%;
    z-index: 400;
    border-radius: 1rem;
}

li.timeline-item {
    margin: 20px 0;
}

/* Timeline item arrow */
.timeline-arrow {
    border-top: 0.5rem solid transparent;
    border-right: 0.5rem solid #fff;
    border-bottom: 0.5rem solid transparent;
    display: block;
    position: absolute;
    left: 2rem;
}

/* Timeline item circle marker */
li.timeline-item::before {
    content: ' ';
    background: #ddd;
    display: inline-block;
    position: absolute;
    border-radius: 50%;
    border: 3px solid #fff;
    left: 11px;
    width: 14px;
    height: 14px;
    z-index: 400;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
}


/*
*
* ==========================================
* FOR DEMO PURPOSES
* ==========================================
*
*/
body {
    background: #E8CBC0;
    background: -webkit-linear-gradient(to right, #E8CBC0, #636FA4);
    background: linear-gradient(to right, #E8CBC0, #636FA4);
    min-height: 100vh;
}

.text-gray {
    color: #999;
}
	</style>
	</body>