<?php

/*
The model class for getting all data from the polls,
pollAnswrrs and votes tables
*/
class Polls extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    //Returns an array with all the polls.
    public function getAllPollsArray() {
      $this->db->select('id, title, question');
      $rows = $this->db->get('polls')->result();
      return $rows;
    }

    //Returns an array with all the poll answers.
    public function getAllPollAnswersArray() {
      $this->db->select('id, pollid, answernumber, answer');
      $this->db->order_by('pollid');
      $rows = $this->db->get('pollanswers')->result();
      return $rows;
    }

    //Returns an array with all the votes.
    public function getAllVotesArray() {
      $this->db->select('id, ipaddress, pollid, answernumber');
      $rows = $this->db->get('votes')->result();
      return $rows;
    }

    //Returns a poll object with the appropriate fields.
    public function getPoll($id) {
      $this->db->select('id, title, question');
      $row = $this->db->get_where('polls', array('id' => $id))->result();
      return $row[0];
    }

    //Gets a list of answers relating to a given poll id.
    public function getAnswersList($id) {
      $this->db->select('answer');
      $row = $this->db->get_where('pollanswers', array('pollid' => $id))->result();
      return $row;
    }

    //Adds a vote to the database.
    public function addVote($ipaddress, $pollid, $answernumber) {
      $id = 0;
      $vote = array('id' => $id,
                    'ipaddress' => $ipaddress,
                    'pollid' => $pollid,
                    'answernumber' => $answernumber);
      $this->db->insert('votes', $vote);
    }

    //Gets all the votes relating to a pollid.
    public function getVotes($pollid) {
      $response = array();
      $this->db->select('answernumber, COUNT(*) as count');
      $this->db->where('pollid', $pollid);
      $this->db->group_by('answernumber');
      $this->db->order_by('answernumber');
      $result = $this->db->get('votes')->result();
      $votesArray = array();
      foreach ($result as $votes) {
        $votesArray[$votes->answernumber] = $votes->count;
      }

      for ($val = 1; $val < 7; $val++) {
        if (!array_key_exists(strval($val), $votesArray)) {
          $votesArray[strval($val)] = 0;
        }
      }
      return $votesArray;
    }

    //Deletes all votes from the database.
    public function deleteVotes($pollid) {
      $this->db->select('id');
      $this->db->where('pollid', $pollid);
      $allVotes = $this->db->get('votes')->result();
      foreach ($allVotes as $row) {
        $this->db->where('id', $row->id);
        $this->db->delete('votes');
      }
    }

  };
