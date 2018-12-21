<h2>Employee - <?php echo $employee['Employee']['name'];?></h2>

<div class="employee_item" id=<?php echo $employee['Employee']['id'];?>>
	<div class="actions">
		<ul class="list-inline">
			<li>
				<div class="action_edit">
					<?php
						echo $this->Html->link(
							'Edit', array('controller' => 'employees', 'action' => 'edit', $employee['Employee']['id'])
						);
					?>
				</div>
			</li>
			<li>
				<div class="action_delete">
					<?php
					echo $this->Form->postLink(
							'Delete',
								array('controller' => 'employees', 'action' => 'delete', $employee['Employee']['id']),
								array('confirm' => 'Are you sure?')
						);
					?>
				</div>
			</li>
		</ul>
	</div>
	<div style="clear:both;">
	<div><?php echo $this->Html->image('/files/' . $employee['Employee']['photo'],array('border'=>'0', 'max-height'=>'450'));?></div></br>
	<div>Surname: <?php echo $employee['Employee']['surname'];?></div></br>
	<div>Email: <?php echo $employee['Employee']['email'];?></div></br>
	<div>Registered: <?php echo $employee['Employee']['registered'];?></div></br>
	<div>Department: <?php echo $employee['Department']['title'];?></div></br>
</div>


