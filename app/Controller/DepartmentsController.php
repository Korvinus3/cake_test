<?php

class DepartmentsController extends AppController
{

	public $helpers = [
		'Html' => [
			'className' => 'Bootstrap3.BootstrapHtml'
		],
		'Form' => [
			'className' => 'Bootstrap3.BootstrapForm'
		],
		'Modal' => [
			'className' => 'Bootstrap3.BootstrapModal'
		]
	];

	public $components = ['Flash'];

	public function index()
	{
		$this->set('departments', $this->Department->find('all', ['contain' => false]));
	}

	public function view($id)
	{

		if (!$id) {
			throw new NotFoundException(__('Invalid department id'));
		}

		$department = $this->Department->findById($id);

		if (!$department) {
			throw new NotFoundException(__('Invalid department id'));
		}

		$this->set('department', $department);

	}

	public function edit($id = null) {

		if (!$id) {
			throw new NotFoundException(__('Invalid department'));
		}

		$post = $this->Department->findById($id);

		if (!$post) {
			throw new NotFoundException(__('Invalid department'));
		}

		if ($this->request->is(['post', 'put'])) {

			$this->Department->id = $id;

			if ($this->Department->save($this->request->data)) {

				$this->Flash->success(__('department has been updated.'));
				return $this->redirect(['action' => 'index']);

			}

			$this->Flash->error(__('Unable to update department.'));

		}

		if (!$this->request->data) {
			$this->request->data = $post;
		}
	}

	public function delete($id) {

		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}

		if ($this->Department->delete($id)) {

			$this->Flash->success(
				__('The department with id: %s has been deleted.', h($id))
			);

		} else {

			$this->Flash->error(
				__('The department with id: %s could not be deleted.', h($id))
			);

		}

		return $this->redirect(array('action' => 'index'));
	}

	public function add()
	{

		if ($this->request->is('post')) {

			$this->Department->create();

			if ($this->Department->save($this->request->data)) {

				$this->Flash->success(__('Successfully added new department.'));

				return $this->redirect(['action' => 'index']);

			}

			$this->Flash->error(__('Something went wrong.'));

		}

	}

}