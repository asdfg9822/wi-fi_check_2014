<?php echo form_open_multipart('main/excel_upload');?>
<button type="button" class="btn btn-primary" style="float: right;" onclick="document.getElementById('classfile').click();">
	<span class="glyphicon glyphicon-plus-sign">&nbsp;수업추가하기
	</span></button>
	<br>
	<input type="file" name="userfile" size="20" id="classfile" onchange="this.form.submit()" style="display:none" />
</form>
<br>
<br>
</div>