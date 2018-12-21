<h2>Emloyee list</h2>

<div class="add_item">
	<?php
		echo $this->Html->link(
			'Add new employee', array('controller' => 'employees', 'action' => 'add')
		);
	?>
</div>
<table class="table">
<thead>
<tr>
	<th>Title</th>
	<th>Actions</th>
</tr>
</thead>
<tbody>
<?php foreach($employees as $employee) { ?>
		<tr>
		<td><?php echo $employee['Employee']['name'];?></td>
		<td><?php echo $employee['Employee']['surname'];?></td>
		<td><?php echo $employee['Employee']['email'];?></td>
		<td><?php echo $employee['Employee']['registered'];?></td>
		<td><div class="action_view">
				<?php
					echo $this->Html->link(
						'View', array('controller' => 'employees', 'action' => 'view', $employee['Employee']['id'])
					);
				?>
			</div>
			<div class="action_edit">
				<?php
					echo $this->Html->link(
						'Edit', array('controller' => 'employees', 'action' => 'edit', $employee['Employee']['id'])
					);
				?>
			</div>
			<div class="action_delete">
				<?php
				echo $this->Form->postLink(
						'Delete',
							array('controller' => 'employees', 'action' => 'delete', $employee['Employee']['id']),
							array('confirm' => 'Are you sure?')
					);
				?>
			</div>
		</td>
		</tr>
<?php } ?>
</tbody>
</table>
