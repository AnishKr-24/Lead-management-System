<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('logout', 'Auth::logout');

$routes->group('', ['filter' => 'Nologin'], function($routes){
    $routes->get('login', 'Auth::index');
    $routes->post('auth-user', 'Auth::login_auth');

    $routes->get('register', 'Auth::register');
    $routes->post('register', 'Auth::save_register');

});

$routes->group('', ['filter' => 'Islogin'], function($routes){
    // lead
    $routes->get('/', 'Home::index');
    $routes->get('new-lead', 'Leads::add_lead');
    $routes->get('lead-list', 'Leads::lead_list');
    $routes->get('lead-detail/(:num)', 'Leads::lead_detail/$1');
    $routes->post('save-lead', 'Leads::save_lead');
    $routes->post('update-lead', 'Leads::update_lead');
    $routes->post('save-note', 'Leads::save_note');
    $routes->get('won-leads', 'Leads::won_leads');
    $routes->get('lead-follow', 'Leads::follow_ups');
    $routes->get('lead-converter', 'Leads::converted_leads');


    //agent
    $routes->get('agent-report', 'Agent::agent_report');                                                                                                                                        
    $routes->get('source-report', 'Agent::source_report');
    $routes->get('user', 'Agent::users');
    $routes->get('role', 'Agent::roles');
    $routes->get('user-profile/(:num)', 'Agent::user_profile/$1');
    $routes->post('save-user', 'Agent::save_user');
    $routes->post('update-user', 'Agent::update_user');

    // Setting
    $routes->get('comapny-setting', 'Setting::company_settings');
    $routes->get('email-setting', 'Setting::email_settings');
    $routes->get('notifications', 'Setting::notifications');

});


