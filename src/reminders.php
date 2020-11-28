<div>
	<div class="reminderholder rounded-top rounded-bottom">
		<h5 class="remindTitle">DUE TODAY<h5>
		<table>
			<?php
				$query = "SELECT * FROM task WHERE user_ID = $user_ID AND DATE(task_Due) = CURDATE() ORDER BY task_Due";
				$result = $conn->query($query);

				if (!($result->num_rows > 0)) {
					echo "<div class='notasksdue'>No tasks due today.</div>";
				} else {
	        		while ($row = $result->fetch_assoc()) {
	        			$name = html_entity_decode($row['task_Name'], ENT_QUOTES);
	        			if (strlen($name)> 25){
	        				$name = substr($name, 0, 25) . "...";
	        			}
					?>
					<tr class="remindText">
						<td class="col-md-8">
							📝 <a class="remind" href="tasks.php"><?php echo $name;?></a>
						</td>
						<td class="col-md-4">
							<?php
								$time = date("h:iA", strtotime($row['task_Due']));
								if ($time[0] == "0"){
									$time = " " . substr($time, 1);
								}
								echo $time;
							?>
						</td>
					</tr>
					<?php
					}
				}
			?>
		</table>
	</div>
	<br>
	<div class="reminderholder rounded-top rounded-bottom">
		<h5 class="remindTitle">DUE TOMORROW<h5>
		<table>
			<?php
				$query = "SELECT * FROM task WHERE user_ID = $user_ID AND DATE(task_Due) = CURDATE() + INTERVAL 1 DAY ORDER BY task_Due";
				$result = $conn->query($query);

				if (!($result->num_rows > 0)) {
	            	echo "<div class='notasksdue'>No tasks due tomorrow.</div>";
	        	} else {
	        		while ($row = $result->fetch_assoc()) {
	        			$name = html_entity_decode($row['task_Name'], ENT_QUOTES);
	        			if (strlen($name)> 25){
	        				$name = substr($name, 0, 25) . "...";
	        			}
					?>
					<tr class="remindText">
						<td class="col-md-8">
							📝 <a class="remind" href="tasks.php"><?php echo $name;?></a>
						</td>
						<td class="col-md-4">
							<?php
								$time = date("h:iA", strtotime($row['task_Due']));
								if ($time[0] == "0"){
									$time = " " . substr($time, 1);
								}
								echo $time;
							?>
						</td>
					</tr>
					<?php
	        		}
	        	}       	
	        ?>
		</table>
	</div>
</div>