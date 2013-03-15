<?php

namespace app\controllers;

use app\models\Tenants;
use lithium\action\DispatchException;

class TenantsController extends \lithium\action\Controller {

	public function index() {
		$tenants = Tenants::all();
		return compact('tenants');
	}

	public function view() {
		$tenant = Tenants::first($this->request->id);
		return compact('tenant');
	}

	public function add() {
		$tenant = Tenants::create();

		if (($this->request->data) && $tenant->save($this->request->data)) {
			return $this->redirect(array('Tenants::view', 'args' => array($tenant->id)));
		}
		return compact('tenant');
	}

	public function edit() {
		$tenant = Tenants::find($this->request->id);

		if (!$tenant) {
			return $this->redirect('Tenants::index');
		}
		if (($this->request->data) && $tenant->save($this->request->data)) {
			return $this->redirect(array('Tenants::view', 'args' => array($tenant->id)));
		}
		return compact('tenant');
	}

	public function delete() {
		if (!$this->request->is('post') && !$this->request->is('delete')) {
			$msg = "Tenants::delete can only be called with http:post or http:delete.";
			throw new DispatchException($msg);
		}
		Tenants::find($this->request->id)->delete();
		return $this->redirect('Tenants::index');
	}
}

?>