<?php 
$dsn = "mysql:host=localhost;dbname=my_database"; 
$username = "root"; 
$password = "";  
try {     
    $pdo = new PDO($dsn, $username, $password);     
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch (PDOException $e) {     
    die("Connection failed: " . $e->getMessage()); 
}  
if ($_SERVER["REQUEST_METHOD"] == "POST") {        
    $username = $_POST['username'];     
    $rating = $_POST['rating'];     
    $comment = $_POST['comment'];      
     if (empty($username) || empty($rating) || empty($comment)) {         
        die("All fields are required.");     }           
   $sql = "INSERT INTO reviews (username, rating, comment) 
   VALUES (:username, :rating, :comment)";
   try {
    $stmt = $pdo->prepare($sql); 
    $stmt->execute(
        [ ':username' => $username, 
        ':rating' => $rating, 
        ':comment' => $comment
         ]); 
         echo "Review saved successfully!"; 
         } catch (PDOException $e) { 
            echo "Error: " . $e->getMessage(); 
            } 
            } 
            ?>