<style type="text/css">
	table, th, td {
	   border: 3px solid black;
	   font-size: 13px;
	   
	}
	td{
		padding: 5px 10px 5px 10px;
	}
</style>

<table>
	<tr>
		<td width="200px;"><strong>TODO TITLE</strong></td>
		<td width="500px;"><?php echo $todo['title']; ?></td>
	</tr>
	<tr>
		<td width="200px;"><strong>PROJECT</strong></td>
		<td width="500px;">
			<?php 
				if($todo['special_assignment_status'])
					echo 'Special Assignment';
				else
					echo 'IMC-'.$todo['project_id'];
			?>
		</td>
	</tr>
	<tr>
		<td width="200px;"><strong>ASSIGNED TO</strong></td>
		<td width="500px;"><?php echo $this->general_model->get_user_name_desig($todo['assigned_to']); ?></td>
	</tr>
	<tr>
		<td width="200px;"><strong>TODO STATUS</strong></td>
		<td width="500px;"><?php echo $todo['status'];?></td>
	</tr>
	<tr>
		<td width="200px;"><strong>ASSIGNED ON</strong></td>
		<td width="500px;"><?php echo date("jS M, Y", strtotime($todo['exp_completion_date']));?></td>
	</tr>
	<tr>
		<td width="200px;"><strong>COMPLETED ON</strong></td>
		<td width="500px;"><?php echo date("jS M, Y", strtotime($todo['actu_completion_date']));?></td>
	</tr>	
	<?php if($todo['status'] !== 'Pending at QA'): ?>
		<tr>
			<td width="200px;"><strong>REPORT LINK</strong></td>
			<td width="500px;">
				<a href="<?php echo base_url().'testing/report/view_report/'.$todo['id'];?>" target="_BLANK">Click Me!</a>
			</td>
		</tr>
	<?php endif; ?>
	<tr>
		<td width="200px;"><strong>BRIEF ABOUT TODO</strong></td>
		<td width="500px;"><?php echo $todo['todo'];?></td>
	</tr>
</table>