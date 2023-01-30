<?php session_start(); ?>
<?php
    if(!$_SESSION["USERID"]){
        header('location: index.php');
    }else{?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="img/logo.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
        include('connection.php');
        $sql = "SELECT * FROM users WHERE USERID = '".$_SESSION['USERID']."'";
        $query = mysqli_query($conn, $sql);
        if($result = mysqli_fetch_array($query)){?>
    <section class="d-flex justify-content-center align-items-center">
    <div class="p-2 w-400 rounded shadow">
    	<div>
    		<div class="d-flex mb-3 p-3 bg-light justify-content-between align-items-center">
    			<div class="d-flex align-items-center">
    			    <img src="../asset/uploads/<?php echo $result['img']; ?>" class="rounded-circle" width="60" height="60">
                    <h6 class="fs-xs m-2"><?php echo $result['Username']; ?></h6> 
    			</div>
    		</div>
    <?php } ?>
    		<div class="input-group mb-3">
    			<input type="text" placeholder="Search..." id="searchText" class="form-control">
    			<button class="btn btn-primary" id="serachBtn">
    			    <i class="fa fa-search"></i>	
    			</button>       
    		</div>
    		<ul id="chatList"
    		    class="list-group mvh-50 overflow-auto">
    			<?php if (!empty($conversations)) { ?>
    			    <?php 

    			    foreach ($conversations as $conversation){ ?>
	    			<li class="list-group-item">
	    				<a href="chat.php?user=<?=$conversation['Username']?>"
	    				   class="d-flex
	    				          justify-content-between
	    				          align-items-center p-2">
	    					<div class="d-flex
	    					            align-items-center">
	    					    <img src="../asset/uploads/<?=$conversation['img']?>"
	    					         class="w-10 rounded-circle">
	    					    <h3 class="fs-xs m-2">
	    					    	<?=$conversation['Username']?><br>
                      <small>
                        <?php echo lastChat($_SESSION['USERID'], $conversation['USERID'], $conn); ?>
                      </small>
	    					    </h3>            	
	    					</div>
	    				</a>
	    			</li>
    			    <?php } ?>
    			<?php }else{ ?>
    				<div class="alert alert-info 
    				            text-center">
					   <i class="fa fa-comments d-block fs-big"></i>
                       No messages yet, Start the conversation
					</div>
    			<?php } ?>
    		</ul>
    	</div>
    </div>
    </section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
	$(document).ready(function(){
      
      // Search
       $("#searchText").on("input", function(){
       	 var searchText = $(this).val();
         if(searchText == "") return;
         $.post('../app/ajax/search.php', 
         	     {
         	     	key: searchText
         	     },
         	   function(data, status){
                  $("#chatList").html(data);
         	   });
       });

       // Search using the button
       $("#serachBtn").on("click", function(){
       	 var searchText = $("#searchText").val();
         if(searchText == "") return;
         $.post('../app/ajax/search.php', 
         	     {
         	     	key: searchText
         	     },
         	   function(data, status){
                  $("#chatList").html(data);
         	   });
       });


      /** 
      auto update last seen 
      for logged in user
      **/
      let lastSeenUpdate = function(){
      	$.get("../app/ajax/update_last_seen.php");
      }
      lastSeenUpdate();
      /** 
      auto update last seen 
      every 10 sec
      **/
      setInterval(lastSeenUpdate, 10000);

    });
</script>
</body>
</html>
<?php } ?>