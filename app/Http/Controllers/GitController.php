<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use GitHub;
use GrahamCampbell\GitHub\Facades\GitHub;

class GitController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('git.index');
    }

  
   
    public function store(Request $request) {
     /**
     * The input is first validated if it clears the test calls the github followers api and currenty overided to bring back 20 users
     *
     * 
     */
        $rules = [
            'username' => 'required|max:100'
        ];

        $this->validate($request, $rules);
        $arr = array();
        foreach (GitHub::user()->followers($request->get('username'),array('page'=>1,'per_page'=>20)) as $key => $val) {
            array_push($arr, $val['avatar_url']);
        }
        
        return view('git.index', compact('arr'));
    }


}
