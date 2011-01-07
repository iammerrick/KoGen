	public function action_edit()
	{
		$id = $this->request->param('id');
	
		if($_POST)
		{
			$this->edit();
		}
		else
		{
			// Edit Form Please
		}
	}