<div class="col-md-8">
	<div class="panel-group" id="accordion">
		<div class="table-responsive">
			<table class="table">
				<tr>
					<th colspan="100">공지사항</th>
				</tr>
				<tr><td>
				<?php
				foreach($notify as $i => $entry){?>
				<div class="panel panel-default">
					<div class="panel-heading" >
						<h4 class="panel-title">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>" >
								[<?php echo $entry->regi_date?>]&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $entry->title?>
							</a>
						</h4>
					</div>
					<div id="collapse<?php echo $i;?>" class="panel-collapse collapse">
						<div class="panel-body">
							<?php echo $entry->des?>
						</div>
					</div>
				</div>
				<?php
			}?>
</th></td>
		</table>
	</div>
</div>

<br>