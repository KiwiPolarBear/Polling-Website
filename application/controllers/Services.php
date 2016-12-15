<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*A controller for the RESTful web services*/
class Services extends CI_Controller {

  public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

  //Returns a JSON list of polls. Each poll is a JSON object.
  public function getPolls() {
    $response = array();
    $this->load->model('polls');
    $pollsArray = $this->polls->getAllPollsArray();
    foreach ($pollsArray as $poll) {
      $currentPoll = array();
      $currentPoll["id"] = $poll->id;
      $currentPoll["title"] = $poll->title;
      $currentPoll["question"] = $poll->question;
      $response[] = $currentPoll;
    }
    echo json_encode($response);
  }

  //Returns a specific poll as a JSON object including a list of answers.
  public function getPollsID($id) {
    //Makes sure the $id exists.
    if ($id > 3 || $id < 1) {
      show_404();
    }

    //Gets the required data.
    $response = array();
    $answersArray = array();
    $this->load->model('polls');
    $poll = $this->polls->getPoll($id);
    $answers = $this->polls->getAnswersList($id);
    foreach ($answers as $answer) {
      $answersArray[] = $answer->answer;
    }

    //Creates the JSON object ans echoes it.
    $response["id"] = $poll->id;
    $response["title"] = $poll->title;
    $response["question"] = $poll->question;
    $response["answers"] = $answersArray;
    echo json_encode($response);
  }

  //Adds a vote to the database. Returns 200 OK.
  public function postPollVote($pollid, $answernumber) {
    if ($pollid > 3 || $pollid < 1 || $answernumber < 1 || $answernumber > 6) {
      show_404();
    }
    $ip = $_SERVER['REMOTE_ADDR'];
    $this->load->model('polls');
    $this->polls->addVote($ip, $pollid, $answernumber);
    header('HTTP/1.1 200 OK');
  }

  //Gets the votes for a given pollid.
  public function getVotes($pollid) {
    if ($pollid > 3 || $pollid < 1) {
      show_404();
    }
    $this->load->model('polls');
    $response["votes"] = $this->polls->getVotes($pollid);
    echo json_encode($response);
  }

  //Deletes all the votes relating to a given id.
  public function deleteVotes($pollid) {
    if ($pollid > 3 || $pollid < 1) {
      show_404();
    }
    $this->load->model('polls');
    $this->polls->deleteVotes($pollid);
    header('HTTP/1.1 200 OK');
  }

}
