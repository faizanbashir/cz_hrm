<table style="border:1px solid black;">
	<tr style="border:1px solid black; font-size: 13px;">
		<th style="border:1px solid black;">ID</th>	
		<th style="border:1px solid black;">PROJECT</th>
		<th style="border:1px solid black;">TODO TITLE</th>
		<th style="border:1px solid black;">EMPLOYEE</th>
		<th style="border:1px solid black;">DEADLINE</th>
		<th style="border:1px solid black;">DAYS EXCEEDED</th>
	</tr>
	<?php
		$sno 	= 	1; 
		foreach($todos as $todo): 
	?>
	<tr style="border:1px solid black; font-size: 12.5px;">
		<td style="border:1px solid black; text-align:center;"><?php echo $sno++; ?></td>
		<td style="border:1px solid black; ">
			<?php 
				if($todo['project_title']) 
					echo 'IMC-'.$todo['project_id'].' '.$todo['project_title']; 
				else
					echo 'Special Assignment';
			?>
		</td>
		<td style="border:1px solid black;"><?php echo $todo['title']; ?></td>
		<td style="border:1px solid black;"><?php echo $todo['name']; ?></td>
		<td style="border:1px solid black; text-align:center"><?php echo date('jS M, Y H:i', strtotime($todo['exp_completion_date'])); ?></td>
		<td style="border:1px solid black; text-align:center">
			<?php
                $date1  =   date_create(date('d-M-Y',strtotime($todo['exp_completion_date'])));
                $date2  =   date_create(date('d-M-Y'));
                $diff   =   date_diff($date1,$date2);
                echo $diff->format("%R%a");
            ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>