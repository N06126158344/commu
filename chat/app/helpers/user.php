<?php  

function getUser($Username, $conn){
   $sql = "SELECT * FROM users 
           WHERE Username=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$Username]);

   if ($stmt->rowCount() === 1) {
   	 $user = $stmt->fetch();
   	 return $user;
   }else {
   	$user = [];
   	return $user;
   }
}