<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        return 'adminUser';
        
    }

    public function getAdd()
    {
        return 'GetAdduser';

    }

    public function postAdd(){
        return 'PostAdduser';
    }

    public function getEdit(){
 
        return 'getEdituser';

    }

    public function putEdit(){
        return 'putEdituser';

    }

    public function delete(){
        return 'deleteuser';
    }
}
