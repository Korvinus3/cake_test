<?php echo $this->Form->create('Department');
echo $this->Form->input('title', ['required' => true]);
echo $this->Form->end('Save Department');