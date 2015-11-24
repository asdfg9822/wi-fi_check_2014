<br>

<div class="table-responsive">
	<table class="table">
		<tr><th colspan="2">강의자료 Upload</th></tr>

		<?php echo form_open_multipart('main/do_upload/'.$c_num);?>
		<tr>
			<th style="text-align:center; background:white; color:black;">파일경로</th>
		</tr>
		<tr>
			
				<select class="form-control" name="hw" style="display:none"> 
					<?php
					foreach($hw_list as $entry){?>
					<option value="1">><?php echo $entry->title?></option>
					<?php
				}?>
			</select>
		
		<td style="text-align: right;">
			<input type="text" class="form-control" size="5" id="txt"/><br>
			<button type="button" class="btn btn-primary" onclick="document.getElementById('file').click();">찾아보기</button>
			<input type="file" name="userfile" size="20" id="file" style="display:none;" onchange="document.getElementById('txt').value=this.value" />
			<input type="submit" id="upload" style="display:none;" />
			<button type="button" class="btn btn-primary" onclick="document.getElementById('upload').click();">upload</button>	
		</td>
	</tr>
</form>
</div>