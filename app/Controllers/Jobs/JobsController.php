<?php

namespace App\Controllers\Jobs;

use App\Controllers\BaseController;
use App\Models\Job\Job;
use App\Models\Category\Category;
use App\Models\SavedJob\SavedJob;
use App\Models\ApplyedJob\ApplyedJob;
use App\Models\Search\Search;

class JobsController extends BaseController
{



    public function __construct() {

        $this->db = \Config\Database::connect();
    }


    public function singleJob($id) {
        
        $job = new Job();

        $categories = new Category();

        $singleJob = $job->find($id);



        //displaying related jobs

        $relatedJobs = $this->db->query("SELECT * FROM jobs WHERE id != '$id' 
         AND category='$singleJob[category]' ORDER BY id DESC LIMIT 5")
         ->getResult();


        $numRelatedJobs = $this->db->table("jobs")->where('id!=',  $id)
         ->where('category', $singleJob['category'])->countAllResults();
         
         
       //categories

       $allCateories = $categories->findAll();


       if(isset(auth()->user()->id)) {
        
        $checkForSavedJobs = $this->db->table("savedjobs")
        ->where('user_id',  auth()->user()->id)
        ->where('job_id', $id)
        ->countAllResults();

        //checking for applyed jobs
        $checkForApplyedJobs = $this->db->table("applyedjobs")
        ->where('user_id',  auth()->user()->id)
        ->where('job_id', $id)
        ->countAllResults();

        return view('jobs/single-job', compact('singleJob', 'relatedJobs', 'numRelatedJobs', 'allCateories' ,'checkForSavedJobs', 'checkForApplyedJobs'));

       } else {
        return view('jobs/single-job', compact('singleJob', 'relatedJobs', 'numRelatedJobs', 'allCateories'));


       }
      



    }


    public function category($name) {


        $jobsByCategory = $this->db->query("SELECT * FROM jobs WHERE category = '$name' 
          ORDER BY id DESC")
         ->getResult();


        $numJobs = $this->db->table("jobs")->where('category',  $name)
         ->countAllResults();


        return view('jobs/jobs-cateogry', compact('jobsByCategory', 'numJobs', 'name'));


    }



    public function saveJobs($id) {


        $saveJobs = new SavedJob();

        $data = [

            "user_id" => auth()->user()->id, 
            "compay_image" => $this->request->getPost('company_image'), 
            "title" => $this->request->getPost('title'), 
            "company_name" => $this->request->getPost('company_name'), 
            "location" => $this->request->getPost('location'), 
            "job_type" => $this->request->getPost('job_type'), 
            "job_id" => $this->request->getPost('job_id'), 
        ];


        $saveJobs->save($data);


        if($saveJobs) {

            return redirect()->to(base_url('jobs/single-job/'.$id.''))->with('save', 'Job saved successfully');
        }


    }




    public function applayJobs($id) {


        $applyedJob = new ApplyedJob();

        $data = [

            "user_id" => auth()->user()->id, 
            "company_image" => $this->request->getPost('company_image'), 
            "title" => $this->request->getPost('title'), 
            "company_name" => $this->request->getPost('company_name'), 
            "location" => $this->request->getPost('location'), 
            "job_type" => $this->request->getPost('job_type'), 
            "job_id" => $this->request->getPost('job_id'), 
            "cv" => $this->request->getPost('cv'), 
            "job_title" => $this->request->getPost('job_title'), 
            "email" => auth()->user()->email

        ];


        


        if($this->request->getPost('job_title') == "No job title" OR $this->request->getPost('cv') == "CV not uploaded yet") {




            return redirect()->to(base_url('jobs/single-job/'.$id.''))->with('error', 'update your job title or CV');
        } else {

            $applyedJob->save($data);
            return redirect()->to(base_url('jobs/single-job/'.$id.''))->with('applyed', 'you applyed for this job successfully');

        }


    }



    public function searchingForJobs() {


        $jobs = new Job();

       

        $searches = new Search();

        $data = [

            "keyword" => $this->request->getPost('title'), 
            
        ];


        $searches->save($data);


        $title = $this->request->getPost('title');
        $location = $this->request->getPost('location');
        $job_type = $this->request->getPost('job_type');

        $searches = $jobs->like('title', $title)->like('location', $location)
         ->like('job_type', $job_type)
         ->findAll();

       

        return view('jobs/searches', compact('searches', 'title'));
    


    }
    
    

   



    



    
}
