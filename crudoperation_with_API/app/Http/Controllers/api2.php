<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;

class api2 extends Controller
{
    public function crude()
    {
        $select = user::get();
        return json_encode($select);
    }

    public function edit($id)
    {
        $user = user::find($id);
        return json_encode($user);
    }
}
