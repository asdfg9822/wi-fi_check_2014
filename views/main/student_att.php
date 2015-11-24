<div class="table-responsive">
	  <table class="table">
	    <tr>
	    	<th colspan="100">강의 차수별 출석정보</th>
	    </tr>
	    <tr>
	    <td> 학번 (이름)	</td>
	    	<?php
	    	foreach($dates as $entry){?>
	    	<td><?php echo $entry->date?></td>
	    	<?php
	    }
	    ?>
	    </tr>

	    <?php foreach($stu_list as $i => $entry){?>
	    	<tr>	
	    			<td style="vertical-align: center;"><?php echo '<h4><span class="label label-primary">'.$entry->s_num."</span></h4>".$entry->s_name."";?></td>
	    			<?php
	    			
	    			foreach($dates as $entry1){?>
	    			<td>
	    				<?php 
	    				if($att_info[$i]->res=="fail"){
	    					$result= '<button type="button" class="btn btn-danger">결석</button>';
	    				}else if($att_info[$i]->res=="late"){
	    					$result='<button type="button" class="btn btn-warning">지각</button>';
	    				}else{
	    					$result='<button type="button" class="btn btn-success">출석</button>';
	    				}
	    				echo $result."<br>";
	    				echo $att_info[$i]->conn;
	    				?>
	    			</td>
			    <?php
			}
			    ?>
	    	</tr>
	    <?php
	    }
	    ?>

	  </table>
	</div>




</div>