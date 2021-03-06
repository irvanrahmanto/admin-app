<?php

function is_logged_in()
{

    $ci = get_instance(); // for calling CI library, because app_helper didn't know mvc CI and library too.
    // filtering user to loggin

    if (!$ci->session->userdata('email')) { //filter user access to application, the user cannot be in to dashboard menu if they didn't have account, they must have account before, checked by session on his email
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id'); //checked role_id of user
        $menu = $ci->uri->segment(1); //checked segment based on his url

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array(); //checked query from tabel user_menu, if menu_id = menu access, output row array *means 1 row from the table

        $menu_id = $queryMenu['id']; //checked menu_id must be = queryMenu['id']

        $userAccess = $ci->db->get_where(
            'user_access_menu',
            [
                'role_id' => $role_id,
                'menu_id' => $menu_id
            ]
        );

        if ($userAccess->num_rows() < 1) { // checled if user role member/2 want to access admin menu/1
            redirect('auth/blocked'); // kicked out to controller auth/blocked
        }
    }
}


function check_access($role_id, $menu_id)
{
    $ci = get_instance(); // mengenali library CI pada helper

    // $ci->db->where('role_id', $role_id);
    // $ci->db->where('menu_id', $role_id);
    // $ci->db->get('user_access_menu');

    // Query agar role id nya cocok sama menu id nya cocok juga sepert ditabel database mencocokan pada check box
    $result = $ci->db->get_where('user_access_menu', [
        'role_id' => $role_id,
        'menu_id' => $menu_id
    ]);

    // it means if result from query $result > 0 , means can be access then return
    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
