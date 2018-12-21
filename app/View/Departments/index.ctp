<h1>Departments list</h1>

<div class="add_item">
	<?php
		echo $this->Html->link(
			'Add new department', array('controller' => 'departments', 'action' => 'add')
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
<?php foreach($departments as $department) { ?>
		<tr>
		<td><?php echo $department['Department']['title'];?></td>
		<td>
			<div class="action_view">
				<?php
					echo $this->Html->link(
						'View', array('controller' => 'departments', 'action' => 'view', $department['Department']['id'])
					);
				?>
			</div>
			<div class="action_edit">
				<?php
					echo $this->Html->link(
						'Edit', array('controller' => 'departments', 'action' => 'edit', $department['Department']['id'])
					);
				?>
			</div>
			<div class="action_delete">
				<?php
				echo $this->Form->postLink(
						'Delete',
							array('controller' => 'departments', 'action' => 'delete', $department['Department']['id']),
							array('confirm' => 'Are you sure?')
					);
				?>
			</div>
		</td>
		</tr>
<?php } ?>
</tbody>
</table>
