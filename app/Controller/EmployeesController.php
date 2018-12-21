<?php

class EmployeesController extends AppController
{

	public $helpers = [
		'Html' => [
			'className' => 'Bootstrap3.BootstrapHtml'
		],
		'Form' => [
			'className' => 'Bootstrap3.BootstrapForm'
		]
	];

	public $components = ['Flash'];

	public function index()
	{
		$this->set('employees', $this->Employee->find('all'));
	}

	public function view($id)
	{

		if (!$id) {
			throw new NotFoundException(__('Invalid employee id'));
		}

		$employee = $this->Employee->findById($id);

		if (!$employee) {
			throw new NotFoundException(__('Invalid employee id'));
		}

		$this->set('employee', $employee);

	}

	public function edit($id = null) {

		if (!$id) {
			throw new NotFoundException(__('Invalid employee'));
		}

		$post = $this->Employee->findById($id);

		if (!$post) {
			throw new NotFoundException(__('Invalid employee'));
		}

		$departments = $this->_getDepartments();

		$this->set(compact('departments'));

		if ($this->request->is(['post', 'put'])) {

			$this->Employee->id = $id;

			if (
				!empty($this->request->data['Employee']['photo']['tmp_name'])
				&& is_uploaded_file($this->request->data['Employee']['photo']['tmp_name'])
			) {

				$filename = basename($this->request->data['Employee']['photo']['name']);
				move_uploaded_file(
					$this->data['Employee']['photo']['tmp_name'],
					WWW_ROOT . 'files' . DS . $filename
				);

				$this->request->data['Employee']['photo'] = $filename;

			} else {

				$this->request->data['Employee']['photo'] = '';

			}

			if ($this->Employee->save($this->request->data)) {

				$this->Flash->success(__('employee has been updated.'));
				return $this->redirect(['action' => 'index']);

			}

			$this->Flash->error(__('Unable to update employee.'));

		}

		if (!$this->request->data) {
			$this->request->data = $post;
		}
	}

	public function delete($id) {

		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}

		if ($this->Employee->delete($id)) {
			$this->Flash->success(
				__('The employee with id: %s has been deleted.', h($id))
			);
		} else {
			$this->Flash->error(
				__('The employee with id: %s could not be deleted.', h($id))
			);
		}

		return $this->redirect(['action' => 'index']);

	}

	public function add()
	{

		$departments = $this->_getDepartments();

		$this->set(compact('departments'));

		if ($this->request->is('post')) {

			$this->Employee->create();

			if (
				!empty($this->request->data['Employee']['photo']['tmp_name'])
				&& is_uploaded_file($this->request->data['Employee']['photo']['tmp_name'])
			) {

				$filename = basename($this->request->data['Employee']['photo']['name']);
				move_uploaded_file(
					$this->data['Employee']['photo']['tmp_name'],
					WWW_ROOT . 'files' . DS . $filename
				);

				$this->request->data['Employee']['photo'] = $filename;

			} else {

				$this->request->data['Employee']['photo'] = '';

			}

			if ($this->Employee->save($this->request->data)) {

				$this->Flash->success(__('Successfully added new employee.'));

				return $this->redirect(['action' => 'index']);

			}

			$this->Flash->error(__('Something went wrong.'));

		}

	}

	private function _getDepartments()
	{
		return $this->Employee->Department->find('list', ['contain' => false, 'fields' => 'title']);
	}

}