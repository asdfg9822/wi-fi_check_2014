<div class="col-md-3"></div>
<div class="col-md-8">
	<br>

	<div class="table-responsive">
		<table class="table">
			<tr><th colspan="2">수업자료 download</th></tr>
			<tr>
				<th style="text-align:center; background:white; color:black;">파일명</th>
				<th style="text-align:center; background:white; color:black;">내려받기</th>
			</tr>
			<form action="main/do_download" method="post">
			<?php
			foreach($down_path as $entry){?>
			<tr>
				<td>
					<?php echo $entry->file_name; ?>
				</td>
				<td>
				<button type="submit" name = "file_id" value='<?php echo $entry->id;?>' class="btn btn-primary">Download</button>
				</td>
			</tr>
			<?php
		}?>
		</form>
	</table>
</div>