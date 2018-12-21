<h2>Department - <?php echo $department['Department']['title'];?></h2>

<h3>Employee list:</h3>

<table class="table">
<thead>
<tr>
	<th>Name</th>
	<th>Surname</th>
	<th>Email</th>
	<th>Registered</th>
</tr>
</thead>
<tbody>
<?php foreach($department['Employee'] as $employee) { ?>
		<tr>
		<td><?php echo $employee['name'];?></td>
		<td><?php echo $employee['surname'];?></td>
		<td><?php echo $employee['email'];?></td>
		<td><?php echo $employee['registered'];?></td>
		<td><div class="action_view">
				<?php
					echo $this->Html->link(
						'View', array('controller' => 'employees', 'action' => 'view', $employee['id'])
					);
				?>
			</div>
			<div class="action_edit">
				<?php
					echo $this->Html->link(
						'Edit', array('controller' => 'employees', 'action' => 'edit', $employee['id'])
					);
				?>
			</div>
			<div class="action_delete">
				<?php
				echo $this->Form->postLink(
						'Delete',
							array('controller' => 'employees', 'action' => 'delete', $employee['id']),
							array('confirm' => 'Are you sure?')
					);
				?>
			</div>
		</td>
		</tr>
<?php } ?>
</tbody>
</table>
