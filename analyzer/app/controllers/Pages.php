<?php
  class Pages extends Controller {
    public function __construct(){

    }

    public function index(){
      if(isLoggedIn()){
        redirect('posts');
      }
      $data=[
          'title' => 'SharePosts',
          'description' => 'Simple social network built on the phpMVC PHP Framework'
      ];
     $this->view('pages/index',$data);
    }

    public function about(){
      $data=[
        'title' => 'About',
        'description' => 'App to share posts with other users'
      ];
      $this->view('pages/about',$data);
    }

    public function upload(){
      if(!isLoggedIn()){
        redirect('users/login');
      }
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $data = [
          'file_err' => '',
        ];

        if(!empty($_FILES['zip']['name'])){
          $zip = new ZipArchive();
          $temp = explode('.', $_FILES['zip']['name']);
          if(strtolower(end($temp)) !== 'zip'){
            $data['file_err'] = 'Please choose a zip file';
          }
          if($_FILES['zip']['size']> 41943040){
            //in bytes
            $data['file_err'] = 'The file is too large';
          }
          if($zip->open($_FILES['zip']['tmp_name']) === false){
            $data['file_err'] = 'The zip file is invalid';
          }
        } else {
          $data['file_err'] = 'No file was picked';
          $this->view('pages/upload',$data);
        }
        if(empty($data['file_err'])){
          //upload
          
        } else {
          $this->view('pages/upload',$data);
        }

      } else {
        $data = [
          'file_err' => '',
        ];
        $this->view('pages/upload',$data);
      }
    }
  }