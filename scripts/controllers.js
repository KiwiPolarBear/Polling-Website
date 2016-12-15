
(function () {
  'use strict';

  var pollsURL = window.location.origin + "/index.php/services/polls";

  var pollAnswersURL = window.location.origin +
  "/index.php/pollcontroller/getallpollanswers?callback=JSON_CALLBACK";

  var votesURL = window.location.origin + "/index.php/services/votes/";

  var submitVoteURL = window.location.origin +
  "/index.php/pollcontroller/addVote/"

  var appControllers = angular.module('appControllers', []);

  appControllers.controller('pollsController', ['$scope', '$http',
      function ($scope, $http) {

        //Array of polls.
        $http.get(pollsURL)
            .success(function(response) {
                $scope.polls = response;
                $scope.pollOne = response[0];
                $scope.pollTwo = response[1];
                $scope.pollThree = response[2];
            });

        //Array of poll answers.
        $http.jsonp(pollAnswersURL)
            .success(function(response) {
                $scope.pollAnswers = response;
            });

        //Boolean Values.
        $scope.showPollOne = false;
        $scope.showPollTwo = false;
        $scope.showPollThree = false;

        $scope.pollOneSelected = false;
        $scope.pollTwoSelected = false;
        $scope.pollThreeSelected = false;

        $scope.showVotesOne = false;
        $scope.showVotesTwo = false;
        $scope.showVotesThree = false;

        $scope.showHome = true;
        $scope.showAbout = false;

        //Function used to hide and show polls.
        $scope.pollDisplay = function(pollid, value) {
          $scope.showVotesOne = false;
          $scope.showVotesTwo = false;
          $scope.showVotesThree = false;

          $scope.showPollOne = false;
          $scope.showPollTwo = false;
          $scope.showPollThree = false;

          if (pollid == 1) {
            $scope.showPollOne = !value;
          } else if (pollid == 2) {;
            $scope.showPollTwo = !value;
          } else {
            $scope.showPollThree = !value;
          }
        };

        //Function used to submit a vote.
        $scope.submitVote = function(name, pollid) {
          $('#successMessageOne').html("<strong>Thank You!</strong> Your vote has been recorded.")
          $('#successMessageTwo').html("<strong>Thank You!</strong> Your vote has been recorded.")
          $('#successMessageThree').html("<strong>Thank You!</strong> Your vote has been recorded.")
          if (name == "pollOne") {
            var answernumber= $('input[name="pollOne"]:checked').val();
            $('input[name="pollOne"]').attr("checked", false);
            $scope.pollOneSelected = false;
            $scope.showVotesOne = true;
          } else if (name == "pollTwo") {
            var answernumber= $('input[name="pollTwo"]:checked').val();
            $('input[name="pollTwo"]').attr("checked", false);
            $scope.pollTwoSelected = false;
            $scope.showVotesTwo = true;
          } else {
            var answernumber= $('input[name="pollThree"]:checked').val();
            $('input[name="pollThree"]').attr("checked", false);
            $scope.pollThreeSelected = false;
            $scope.showVotesThree = true;
          }
          $http.get(submitVoteURL + pollid + "/" + answernumber);

          /*Because the database is a little slow,
          this needs to be called after a certain amount of time.*/
          setTimeout(function() {
            $scope.getPollVotes(pollid);
          }, 500);
        };

        //Function used to set boolean values if a radio button is selected.
        $scope.radioSelected = function(name) {
          if (name == "pollOne") {
            $scope.pollOneSelected = true;
          } else if (name == "pollTwo") {
            $scope.pollTwoSelected = true;
          } else {
            $scope.pollThreeSelected = true;
          }
        };

        //Function used to get an array of poll votes for the given poll.
        $scope.getPollVotes = function(pollid) {
          $http.get(votesURL + pollid)
              .success(function(response) {
                  $scope.votes = response;
              });
        }

        //Function used to reset the votes in the database for a given poll.
        $scope.resetVotes = function(pollid) {
          $('#successMessageOne').html("<strong>Votes have been reset.</strong>")
          $('#successMessageTwo').html("<strong>Votes have been reset.</strong>")
          $('#successMessageThree').html("<strong>Votes have been reset.</strong>")
          $http.delete(votesURL + pollid);

          /*Because the database is a little slow,
          this needs to be called after a certain amount of time.*/
          setTimeout(function() {
            $scope.getPollVotes(pollid);
          }, 500);
        }

        //Function used to display the votes without voting.
        $scope.showVotes = function(pollid) {
          $scope.getPollVotes(pollid);

          if (pollid == 1) {
            $('#successMessageOne').html("<strong>Total votes are displayed on the right.</strong>")
            $scope.showVotesOne = true;
          } else if (pollid == 2) {
            $('#successMessageTwo').html("<strong>Total votes are displayed on the right.</strong>")
            $scope.showVotesTwo = true;
          } else {
            $('#successMessageThree').html("<strong>Total votes are displayed on the right.</strong>")
            $scope.showVotesThree = true;
          }
        }

        //Function used to show the home view.
        $scope.changeToHome = function() {
          $scope.showHome = true;
          $scope.showAbout = false;
        }

        //Function used to show the about view.
        $scope.changeToAbout = function() {
          $scope.showHome = false;
          $scope.showAbout = true;
        }

      }]);
}())
