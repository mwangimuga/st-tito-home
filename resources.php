<?php

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "upload.db";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

 $sql = "SELECT *FROM files";
 $result = $conn->query($sql);


 $conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ST. TITO HOME</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="wrapper">
    <nav class="nav">
        <div class="nav-logo">
            <p><a href="index.html">
                   <i class='bx bxs-school'>
                    
                   </i> 
                </a> 
             </p>
        </div>

        
        
        <div class="nav-menu" id="navMenu">
            <ul>
                <li><a href="index.html" class="link">Home</a></li>
                <li><a href="gallery.html" class="link">Gallery</a></li>
                <li><a href="about.html" class="link">Contact-Us</a></li>
                <li><a href="resources.php" class="link active">Resources</a></li>
            </ul>
        </div>
        <div class="nav-menu-btn">
            <i class="bx bx-menu" onclick="myMenuFunction()"></i>

        </div>
    </nav>
    
    


    <div class="resources-table">
        <h2 class="title"><i class='bx bxs-download'></i>Download <span>Documents </span>Here</h2>
        <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>File Name</th>
                    
                    <th>Download</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row['filename']."</td>";
                        echo '<td><a href="uploads/'.$row['filename'].'" class="btn btn-info" download>Download</a></td>';
                        echo "</tr>";
                    }
                    }else{
                        echo "<tr><td colspan='3'>No Records found.</td></tr>";
                    }
                    ?>
            </tbody>
        </table>
        </div>
    </div>
        
  </div>
     <footer>
       <div class="footerContainer">
        <div class="socialIcons">
            <a href="tel:+254722323919"><i class="fa-solid fa-phone" target="_blank"></i></a>
            <a href="mailto:st.titohighsch@yahoo.com" target="_blank"><i class='bx bx-envelope' ></i></a>            
            <a href="https://web.facebook.com/p/ST-TITO-HIGH-School-100064049411518/?_rdc=1&_rdr"><i class="fa-brands fa-facebook" target="_blank"></i></a>
            <a href="https://www.instagram.com/st.tito_high/"><i class="fa-brands fa-instagram" target="_blank"></i></a>
            <a href="https://api.whatsapp.com/send/?phone=%2B254722323919&text&type=phone_number&app_absent=0" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>

        </div>
        <div class="footerNav">
            <ul>
                <li><a href="index.html" class="link">Home</a></li>
                <li><a href="gallery.html" class="link">Gallery</a></li>
                <li><a href="about.html" class="link">Contact-Us</a></li>
                <li><a href="resources.php" class="link active">Resources</a></li>
            </ul>
        </div>
        
       </div>
       <div class="footerBottom">
        <p>Copyright &copy;2024; Designed by <span class="designer"><a href="https://api.whatsapp.com/send/?phone=%2B254725406995&text&type=phone_number&app_absent=0" target="_blank">Mark <span>Mwangi</span></a></span></p>
       </div>
     </footer>

<script>
   
    function myMenuFunction() {
     var i = document.getElementById("navMenu");
     if(i.className === "nav-menu") {
         i.className += " responsive";
     } else {
         i.className = "nav-menu";
     }
    }
  
</script>

<script src="https://unpkg.com/boxicons@latest/dist/boxicons.js">

</script>

</body>

</html>
