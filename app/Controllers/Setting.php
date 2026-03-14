<?php

namespace App\Controllers;

class Setting extends BaseController
{
    public function company_settings()
    {
        return view('setting/company_settings');
    }
    public function email_settings()
    {
        return view('setting/email_settings');
    }
    public function notifications()
    {
        return view('setting/notifications');
    }

}