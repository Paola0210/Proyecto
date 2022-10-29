<?php
/**
 * Neo Billing -  Accounting,  Invoicing  and CRM Software
 * Copyright (c) Rajesh Dukiya. All Rights Reserved
 * ***********************************************************************
 *
 *  Email: support@ultimatekode.com
 *  Website: https://www.ultimatekode.com
 *
 *  ************************************************************************
 *  * This software is furnished under a license and may be used and copied
 *  * only  in  accordance  with  the  terms  of such  license and with the
 *  * inclusion of the above copyright notice.
 *  * If you Purchased from Codecanyon, Please read the full License from
 *  * here- http://codecanyon.net/licenses/standard/
 * ***********************************************************************
 */

defined('BASEPATH') OR exit('No direct script access allowed');
class Propertiesapto extends CI_Controller
{
    
    public function __construct()
    {

        parent::__construct();
        //$this->load->model('clientgroup_model', 'clientgroup');
        
               
        $this->load->library("Aauth");
        if (!$this->aauth->is_loggedin()) {
            redirect('/user/', 'refresh');
        }
        if ($this->aauth->get_user()->roleid == 0) {
            $this->limited = $this->aauth->get_user()->id;
        } else {
            $this->limited = '';
        }

    }

    //groups
    public function index()
    {
        
        //$head['usernm'] = $this->aauth->get_user()->username;
        $head['title'] = 'Properties';
        $this->load->view('fixed/header', $head);
        $this->load->view('properties/index', $data);
        $this->load->view('fixed/footer');
    }
    public function create()
    {
        
        
        $head['title'] = 'Properties';
        $this->load->view('fixed/header', $head);
        $this->load->view('properties/new', $data);
        $this->load->view('fixed/footer');
    }
    
}