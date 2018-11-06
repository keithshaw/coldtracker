<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visitor;

class MainController extends Controller
{
    public function index(){
   		$unique_visitors = Visitor::select('ip_address')->distinct()->get()->count()+2;
    	return view('pages.index', compact('unique_visitors'));
    }
    public function about(){
    	return view('pages.about');
    }    
    public function heatmap(){
    	return view('pages.heatmap');
    }
    public function help(){
    	return view('pages.help');
    }
}
