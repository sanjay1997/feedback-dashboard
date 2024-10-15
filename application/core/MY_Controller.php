<?php
class Admin_Controller extends CI_Controller {
    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('fb_logged_in') && !$this->session->userdata('fb_id') && !$this->session->userdata('fb_fname')) {
            $this->session->set_flashdata('error_msg',' Please Login First !');
        	return redirect(base_url());
        }
    }
}

// class User_Controller extends CI_Controller {
//     function __construct() {
//         parent::__construct();
//         if (!$this->session->userdata('dstb_id') && !$this->session->userdata('dstb_logged_in') && !$this->session->userdata('dstb_fname')) {
//             $this->session->set_flashdata('error_msg',' Please Login First !');
//         	return redirect(base_url('userpanel'));
//         }
//     }
// }

?>