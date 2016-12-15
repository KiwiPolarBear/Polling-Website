<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
The controller class for showing the page, and two services
that do not belong in the services controller
*/
class Pollcontroller extends CI_Controller {

    public function __construct()
      {
          parent::__construct();
          $this->load->helper('url');
      }

    /*The Main function of the controller*/
    public function showPage() {
      $data = array();
      $data['title'] = "Polling Website";
      $data['main'] = $this->load->view('main', $data, TRUE);
      $data['about'] = $this->load->view('about', $data, TRUE);
      $this->load->view('templates/master', $data);
    }

    /*Sends a JSON object with answers and answernumbers*/
    public function getAllPollAnswers() {
      $this->load->model('polls');
      $pollAnswersArray = $this->polls->getAllPollAnswersArray();
      echo $_GET['callback'] . "(" . json_encode($pollAnswersArray) . ")";
    }

    /*Used to add a vote to the database*/
    public function addVote($pollid, $answernumber) {
      if ($pollid > 3 || $pollid < 1 || $answernumber < 1 || $answernumber > 6) {
        show_404();
      }
      $this->load->model('polls');
      $ip = $_SERVER['REMOTE_ADDR'];
      $this->polls->addVote($ip, $pollid, $answernumber);
    }
  }
