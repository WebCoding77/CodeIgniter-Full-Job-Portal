<?php

namespace App\Controllers;
use App\Models\Job\Job;


class Home extends BaseController
{


    public function __construct() {

        $this->db = \Config\Database::connect();
    }

    
    public function index()
    {

        $jobs = new Job();

        $allJobs = $jobs->findAll();

        $numJobs = $this->db->table("jobs")->countAllResults();


        $searches = $this->db->query('SELECT COUNT(*) AS count, keyword FROM searches GROUP BY keyword ORDER BY count DESC LIMIT 4')->getResult();

        
        return view('home', compact('allJobs', 'numJobs', 'searches'));
    }

    public function contact() {

        
        
        return view('pages/contact');
    }

    public function about() {

        
        
        return view('pages/about');
    }


    
}
