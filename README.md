# KoGen

KoGen is a basic code generator for Kohana 3. It is a PHP command line utility to generate Kohana files. It should only be used in development and never pushed to a live environment.

## Installation

Drop KoGen in your root Kohana folder. Edit the templates folder files to generate the code you want, or use the defaults.

## Generate Commands

### Controllers

This will give you a full controller with shell methods of adding, editing and deleting.

	kogen/generate --controller=Website --methods=add,edit,delete


This will generate:

	<?php defined('SYSPATH') or die('No direct script access.');

	class Controller_Website extends Controller{

		public function action_index()
		{

		}

		public function action_add()
		{
			if($_POST)
			{
				$this->add();
			}
			else
			{
				// show form
			}
		}

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

	} // End Website
	

Or omit some methods:
	
	kogen/generate --controller=Website methods=add
	
Each controller comes with an index function.

### Models

	kogen/generate --model=Person --columns="name:varchar(255) phone:bigint(11)"
	
This will generate:

	<?php defined('SYSPATH') or die('No direct script access.');

	class Model_Person extends Model {

		protected $_labels = array(
			'name' => 'Name'
			'phone' => 'Phone'
		);

		protected $_rules = array(
			'name' => array(
				'max_length' => array(255),
				'not_empty'  => NULL
			),
			'phone' => array(
				'max_length' => array(11),
				'not_empty'  => NULL
			),
		);

	} // End Person

Obviously the --columns field can be any length and any field. All fields are required by default.
	