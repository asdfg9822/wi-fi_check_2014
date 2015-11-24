<html>
<head>
<title>Upload Form</title>
</head>
<body>

<table class="table">
	    <tr>
	    	<th colspan="100">강의 차수별 출석정보</th>
	    </tr>
	    <tr>
	    	<?php
	    	foreach($dates as $entry){?>
	    	<td><?php echo $entry->date?></td>
	    	<?php
	    }
	    ?>
	    </tr>
	    <tr>	
	    	<?php
	    	foreach($att_info as $entry){?>
	    	<td>
	    		<?php
	    		if(($entry->res)=='pass'){$res="출석";}
	    		else if(($entry->res)=='late'){$res="지각";}
	    		else {$res="결석";}?>
	    		<button type="button" class="btn btn-primary" id="att_btn " onclick="changeValue()"><?php echo $res?></button>
	    		<br><?php echo $entry->conn?> 
	    	</td>
	    	<?php
	    }
	    ?>	


	    </tr>
	  </table>
	  <br><br>
	  <button type="button" id="test" onclick="changeValue()">출석</button>

</body>
</html>

<script type="text/javascript">
	function changeValue(){
		var test=document.getElementById("att_btn");
		test.innerHTML="결석";
	}
</script>