<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;

class UsersController extends BaseController
{

    public function __construct() {

        $this->db = \Config\Database::connect();
    }



    public function publicProfile($id){



        
       

        $singleUser = $this->db->query("SELECT * FROM users WHERE id = '$id'")
        ->getFirstRow();

        //var_dump($singleUser);

        return view('users/public-profile', compact('singleUser'));
    }


    public function updateProfile() {
        
        if(!isset(auth()->user()->id)) {
            return redirect()->to(base_url());
        }

        $id= auth()->user()->id;

        $singleUser = $this->db->query("SELECT * FROM users WHERE id = '$id'")
        ->getFirstRow();

        //var_dump($singleUser);

        return view('users/update-profile', compact('singleUser'));
    }



    public function submitUpdateProfile() {
        
        if(!isset(auth()->user()->id)) {
            return redirect()->to(base_url());
        }

        $id= auth()->user()->id;

        $job_title = $this->request->getPost('job_title');
        $facebook = $this->request->getPost('facebook');
        $twitter = $this->request->getPost('twitter');
        $linkedin = $this->request->getPost('linkedin');
        $bio = $this->request->getPost('bio');

        $updateSingleUser = $this->db->query("UPDATE users SET
        job_title='$job_title', facebook='$facebook', twitter='$twitter', linkedin='$linkedin',
        bio='$bio' WHERE id = '$id'");

        //var_dump($updateSingleUser);

        if($updateSingleUser) {

            return redirect()->to(base_url('users/update-profile/'))->with('update', 'Profile updated successfully');
        }
    }



    public function updateCV() {

        if(!isset(auth()->user()->id)) {
            return redirect()->to(base_url());
        }
        
       
    

        return view('users/update-cv');
    }


    public function submitUpdateCV() {
        
        if(!isset(auth()->user()->id)) {
            return redirect()->to(base_url());
        }
        
        $id= auth()->user()->id;

        $singleUser = $this->db->query("SELECT * FROM users WHERE id = '$id'")
        ->getFirstRow();


        unlink('public/assets/cvs/'.$singleUser->cv.'');



        $file = $this->request->getFile('cv');
        $file->move('public/assets/cvs');

        $fileName = $file->getClientName();

      

        $updateCV = $this->db->query("UPDATE users SET cv='$fileName' WHERE id = '$id'");

        //var_dump($updateSingleUser);

        if($updateCV) {

            return redirect()->to(base_url('users/update-cv/'))->with('update', 'CV updated successfully');
        }
    }



    public function userSavedJobs() {

        if(!isset(auth()->user()->id)) {
            return redirect()->to(base_url());
        }
        
       
        $id= auth()->user()->id;

        $savedJobs = $this->db->query("SELECT * FROM savedjobs WHERE user_id = '$id'")
        ->getResult();

        //var_dump($singleUser);

        return view('users/saved-jobs', compact('savedJobs'));
    }


    public function userApplyedJobs() {

        if(!isset(auth()->user()->id)) {
            return redirect()->to(base_url());
        }
        
       
        $id= auth()->user()->id;

        $applyedJobs = $this->db->query("SELECT * FROM applyedjobs WHERE user_id = '$id'")
        ->getResult();

        //var_dump($singleUser);

        return view('users/applyed-jobs', compact('applyedJobs'));
    }

    
    
    
    

    
}
