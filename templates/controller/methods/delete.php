	public function action_delete()
	{
		$id = $this->request->param('id');
		$delete = ORM::factory('item')->delete($id);
	
		if($delete)
		{
			$this->request->redirect('redirect_to_somewhereelse');
		}
		else
		{
			// Failed Delete
		}
	}