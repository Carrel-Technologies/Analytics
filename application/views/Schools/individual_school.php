<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo $title ; ?>

			</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><?php echo $title?></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<section class="col-lg-7">
				 Students from <?php echo $title ?>
				<!-- Custom tabs (Charts with tabs)-->
				<div class="table-responsive">
					<table class="table table-responsive table-striped" style="overflow: auto">
						<thead>
						<tr>
							<th> #</th>
							<th>Student Name </th>
							<th>Minutes</th>

						</tr>
						</thead>
						<tbody id="students">
						<?php
						$count =0;
						foreach ($students as $student){
							?>
							<tr>
								<?php
								sscanf($student->appMinutes, "%d:%d:%d", $hours, $minutes, $seconds);
								$appMinutes = $hours * 3600 + $minutes * 60 + $seconds;
								?>

								<td><?php echo $count+1?></td>
								<td><?php echo $student->fname?></td>
								<td><?php echo round($appMinutes / 60 ,2)?></td>

							</tr>




							<?php  $count++;
						}
						?>

						</tbody>
					</table>
				</div>
				<!-- /.nav-tabs-custom -->

			</section>
			<!-- right col -->
		</div>
		<!-- /.row (main row) -->

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
