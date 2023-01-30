<?php 

session_start();

# check if the user is logged in
if (isset($_SESSION['Username'])) {

	if (isset($_POST['id_2'])) {
	
	# database connection file
	include '../db.conn.php';

	$id_1  = $_SESSION['USERID'];
	$id_2  = $_POST['id_2'];
	$opend = 0;

	$sql = "SELECT * FROM chats
	        WHERE to_id=?
	        AND   from_id= ?
	        ORDER BY ChatID ASC";
	$stmt = $conn->prepare($sql);
	$stmt->execute([$id_1, $id_2]);

	if ($stmt->rowCount() > 0) {
	    $chats = $stmt->fetchAll();

	    # looping through the chats
	    foreach ($chats as $chat) {
	    	if ($chat['opened'] == 0) {
	    		
	    		$opened = 1;
	    		$ChatID = $chat['ChatID'];

	    		$sql2 = "UPDATE chats
	    		         SET opened = ?
	    		         WHERE ChatID = ?";
	    		$stmt2 = $conn->prepare($sql2);
	            $stmt2->execute([$opened, $ChatID]); 

	            ?>
                  <p class="ltext border 
					        rounded p-2 mb-1">
					    <?=$chat['message']?> 
					    <small class="d-block">
					    	<?=$chat['created_at']?>
					    </small>      	
				  </p>        
	            <?php
	    	}
	    }
	}

 }

}else {
	header("Location: ../../index.php");
	exit;
}