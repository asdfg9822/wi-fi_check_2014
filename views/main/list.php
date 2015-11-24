 <div class="col-md-3">
 	<ul class="list-group">
 	<li class="list-group-item" style="text-align:center;background:#428bca;color:white;border:1px #ddd solid;" ><b>수업목록</b></li>
 	<?php
	  foreach($lists as $entry){
	  ?>
	  <li class="list-group-item" >
	    <span class="badge"><?php echo $entry->c_num ?></span>
	    <a href="/check_sys/check_web/index.php/main/group/<?php echo $entry->c_num ?>"><?php echo $entry->c_name?></a>
	  </li>
	  <?php 
	  }   
	  ?>
	</ul>
 