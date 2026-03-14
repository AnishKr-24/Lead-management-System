<?php

namespace App\Controllers;

class Leads extends BaseController
{
    // 1. ADD LEAD
    public function add_lead()
    {
        return view('leads/add_lead');
    }

    // 2. SAVE LEAD
    public function save_lead()
    {
        $response = ['success' => false, 'message' => [], 'before' => true];
        $in = $this->request->getPost();
        $valid = service('validation');

        $valid->setRule('first_name', 'First Name', 'required|min_length[3]');
        $valid->setRule('phone', 'Mobile Number', 'required|numeric|is_unique[lead_master.mobile_no]');

        
        if ($valid->run($in)) {
            $this->db->transBegin(); 
            try {
                $data = [
                    'first_name'     => $in['first_name'],
                    'last_name'      => $in['last_name'],
                    'lead_gender'    => $in['gender'],
                    'lead_dob'       => $in['dob'],
                    'countary_code'  => $in['country'],
                    'mobile_no'      => $in['phone'],
                    'Alt_mob_no'     => $in['alt_phone'],
                    'email_address'  => $in['email'] ,
                    'full_address'   => $in['address'] ,
                    'state'          => $in['state'] ,
                    'city'           => $in['city'],
                    'district'       => $in['district'],
                    'lead_landmark'  => $in['landmark'],
                    'pin_code'       => $in['pincode'],
                    'lead_source'    => $in['source'],
                    'updated_by'    => $in['updated_by'],
                    'lead_status'    => $in['status']
                ];

                // ★ MODEL USE KIYA
                $q = $this->mymodel->insert_data('lead_master', $data);

                if ($q) {
                    $this->db->transCommit();
                    $response['success'] = true;
                    $response['rlink'] = base_url('lead-detail/'.$q);
                    $response['message'] = 'Lead added successfully';
                } else {
                    $this->db->transRollback();
                    $response['message']['first_name'] = 'Error In Data Insert';
                }
            } catch (\Exception $e) {
                $this->db->transRollback();
                $response['message']['ttitle'] = $e->getMessage();
            }
        } else {
            $response['message'] = $valid->getErrors();
        }
        return $this->response->setJSON($response);
    }

    // 3. LEAD LIST
    public function lead_list()
    {
        // ★ MODEL USE KIYA
        $data['leads'] = $this->mymodel->select_data('lead_master');
        return view('leads/lead_list', $data);
    }

    // 4. LEAD DETAILS (Cleaned Up)
    public function lead_detail($id)
    {
        // A. Basic Info
        $data['lead'] = $this->mymodel->select_one('*', 'lead_master', ['id' => $id]);
        if (!$data['lead']) { return redirect()->to('lead-list'); }
        
        // B. Activities
        $data['lead_activity'] = $this->mymodel->select_all('*', 'lead_activity', ['lead_id' => $id]);
        
        // C. Sidebar List (Using new helper in Model)
        $data['lead_list'] = $this->mymodel->select_array('*', 'lead_master', 10);
        
        // D. Assignment History (Complex Logic moved to Model)
        $data['assign_history'] = $this->mymodel->get_assign_history($id);

        return view('leads/lead_detail', $data);
    } 

    // 5. UPDATE LEAD
    public function update_lead()
    {
        $response = ['success' => false, 'message' => [], 'before' => true];
        $in = $this->request->getPost();
        $valid = service('validation');
        $valid->setRule('name', 'Full Name', 'required|min_length[3]');
        $valid->setRule('phone', 'Phone', "required|numeric|min_length[10]|is_unique[lead_master.mobile_no,id,{$in['lead_id']}]");

        if ($valid->run($in)) {
            try {
                $nameParts = explode(" ", $in['name'], 2);
                $data = [
                    'first_name' => $nameParts[0],
                    'last_name'  => $nameParts[1] ?? '',
                    'mobile_no'  => $in['phone'],
                    'email_address' => $in['email'],
                    'city'       => $in['city'],
                    // 'lead_status' => $in['status'],
                    // 'lead_source' => $in['source']
                ];
                
                // ★ MODEL USE KIYA
                $q = $this->mymodel->update_data('lead_master', $data, ['id' => $in['lead_id']]);

                if ($q) {
                    $response['success'] = true;
                    $response['message'] = 'Lead updated successfully';
                    $response['rlink'] = base_url('lead-detail/'.$in['lead_id']); 
                } else {
                    $response['message']['name'] = 'Database Error';
                }
            } catch (\Exception $e) {
                $response['message']['name'] = $e->getMessage();
            }
        } else {
            $response['message'] = $valid->getErrors();
        }
        return $this->response->setJSON($response);
    }

    // 6. SAVE NOTE (Activity)
    public function save_note()
    {
        $session = session();
        $in = $this->request->getPost();
        
        $activityData = [
            'lead_id'       => $in['lead_id'],
            'user_id'       => $session->get('id') ?? 1,
            'activity_type' => $in['type'],
            'priority'      => $in['priority'],
            'remarks'       => $in['note'],  
            'call_back_type' => !empty($in['callback_datetime']) ? $in['callback_datetime'] : null,
            'date'          => date('Y-m-d H:i:s')
        ];
        
        // ★ MODEL USE KIYA (Insert)
        $this->mymodel->insert_data('lead_activity', $activityData);
        
        // ★ MODEL USE KIYA (Update Last Note)
        $this->mymodel->update_data('lead_master', ['lead_remark' => $in['note']], ['id' => $in['lead_id']]);

        return redirect()->to('lead-detail/' . $in['lead_id']);
    }

    // 7. WON LEADS (Cleaned)
    



    public function follow_ups()
    {
        $today = date('Y-m-d 0:0:0'); 

        $whr = array('lead_activity.call_back_type >' => $today);
        $jb = array(
            array('lead_master', 'lead_master.id=lead_activity.lead_id', 'left')
        );

        $data['todays_leads'] = $this->mymodel->join_tables('lead_activity.*, lead_master.first_name, lead_master.last_name, lead_master.mobile_no, lead_master.lead_source', 'lead_activity', $jb, $whr, true, ['lead_activity.call_back_type', 'ASC'], [0,5]);

        return view('followup/follow_ups', $data);
    }

    
    public function converted_leads() 
    {
        $joinqry = [
            ['users', 'users.id = lead_master.updated_by', 'left']
        ];
        $where = ['lead_master.lead_status' => 'Won'];
        $data['won_leads'] = $this->mymodel->join_tables('lead_master.*, users.user_name as agent_name', 'lead_master', $joinqry, $where, true, ['lead_master.id', 'DESC']);
        $statSelect = 'COUNT(id) as total_deals, SUM(deal_value) as total_revenue';
        $data['total_deals'] = $this->mymodel->join_tables($statSelect, 'lead_master', [], $where, false)->total_deals;
        $data['total_revenue'] = $this->mymodel->join_tables($statSelect, 'lead_master', [], $where, false)->total_revenue;
        $monthWhere = [
            'lead_status' => 'Won',
            'MONTH(created_at)' => date('m'),
            'YEAR(created_at)' => date('Y')
        ];
        $monthStats = $this->mymodel->join_tables('COUNT(id) as month_count', 'lead_master', [], $monthWhere, false);
        $data['this_month_deals'] = $monthStats->month_count;
        return view('converted/converted_leads', $data);
    }
    
    // public function converted_leads()
    // {
        
    //     return view('converted/converted_leads');
    // }
}