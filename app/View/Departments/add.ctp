<h1>Add new Department</h1>
<?php
echo $this->Form->create();
echo $this->Form->input('title', ['required' => true]);
echo $this->Form->end('Save Department');
