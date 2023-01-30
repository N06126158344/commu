<?php 

function opened($id_1, $conn, $chats){
    foreach ($chats as $chat) {
    	if ($chat['opened'] == 0) {
    		$opened = 1;
    		$ChatID = $chat['ChatID'];

    		$sql = "UPDATE chats
    		        SET   opened = ?
    		        WHERE from_id=? 
    		        AND   ChatID = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$opened, $id_1, $ChatID]);

    	}
    }
}