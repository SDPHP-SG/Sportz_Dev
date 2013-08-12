<?php

/**
 * Sportz
 *
 * A web application for sports enthusiasts
 *
 * @package		Sportz
 * @author		The San Diego PHP Study group (SDPHP-SG) team
 * @copyright	Copyright (c) SDPHP-SG
 * @license
 * @link
 * @since		Version 1.0
 * @filesource
 */

/**
 * Sportz Override Class
 *
 * This Controller is for error 404 override.  It is used to redirect any bad url's back
 * to the primary controller
 *
 *
 * @package		Sportz
 * @subpackage	Libraries
 * @category	Libraries
 * @author		The SDPHP-SG team.
 * @author		Matt Gass
 * @link
 */
class Override extends CI_Controller {

	public function index() {
		redirect('main/home/index');
	}

}

//end of class Override

/* End of file override.php */