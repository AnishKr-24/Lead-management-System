<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['recent_leads'] = $this->mymodel->select_data('lead_master'); 
        return view('index', $data);
    }
}
