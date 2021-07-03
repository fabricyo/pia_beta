<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
	    load_view('home/home');
	}

	public function login(){
	    load_view('home/login', ['var1' => 'Trojan']);
    }

    public function get_image($url){

    }
}
