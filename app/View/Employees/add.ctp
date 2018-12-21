<h1>Add new Employee</h1>
<?php
echo $this->Form->create('Employee', ['type' => 'file']);
echo $this->Form->input('Employee.name', ['required' => true]);
echo $this->Form->input('Employee.surname');
echo $this->Form->input('Employee.email', ['type' => 'email', 'required' => true]);
echo $this->Form->input('Employee.photo', ['type' => 'file']);
echo $this->Form->input('Employee.department_id', ['options' => $departments, 'selected' => reset($departments)]);
echo $this->Form->end('Save Employee');
