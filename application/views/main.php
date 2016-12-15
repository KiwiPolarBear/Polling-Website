
<div ng-show="showHome">
<h1>Polls</h1>
<p>Click on a poll name to toggle the poll options</p>

<!----------------------------------------------------------------------------->

<h2 ng-click="pollDisplay(1, showPollOne)">
  <span class="label label-default">{{pollOne.title}}</span>
</h2>
<br>
<div id="successMessageOne" class="alert alert-success" role="alert" ng-show="showVotesOne">
  <strong>Thank You!</strong> Your vote has been recorded.
</div>
<div ng-show="showPollOne">
<div class="well">{{pollOne.question}}</div>
  <ul class="list-group">
  <li class="list-group-item" ng-repeat="item in pollAnswers" ng-if="item.pollid == 1">
  <input type="radio" name="pollOne" value={{item.answernumber}} ng-if="item.pollid == 1" ng-click="radioSelected('pollOne')">
  <span ng-if="item.pollid == 1">{{item.answer}}</span>
  <span ng-repeat="vote in votes" ng-if="item.pollid == 1" ng-show="showVotesOne" style="float: right">
      Votes = {{vote[item.answernumber]}}
  </span>
  </li>
</input>
</ul>
<input type="button" value="Submit Vote" ng-click="submitVote('pollOne', 1)" ng-disabled="!pollOneSelected" class="btn btn-success">
<input type="button" value="Show Votes" ng-show="!showVotesOne" ng-click="showVotes(1)" class="btn btn-info">
<input type="button" value="Reset Votes" ng-show="showVotesOne" ng-click="resetVotes(1)" class="btn btn-warning">
</div>

<!----------------------------------------------------------------------------->

<h2 ng-click="pollDisplay(2, showPollTwo)">
  <span class="label label-default">{{pollTwo.title}}</span>
</h2>
<br>
<div id="successMessageTwo" class="alert alert-success" role="alert" ng-show="showVotesTwo">
  <strong>Thank You!</strong> Your vote has been recorded.
</div>
<div ng-show="showPollTwo">
<div class="well">{{pollTwo.question}}</div>
<ul class="list-group">
<li class="list-group-item" ng-repeat="item in pollAnswers" ng-if="item.pollid == 2">
  <input type="radio" name="pollTwo" value={{item.answernumber}} ng-if="item.pollid == 2" ng-click="radioSelected('pollTwo')">
  <span ng-if="item.pollid == 2">{{item.answer}}</span>
  <span ng-repeat="vote in votes" ng-if="item.pollid == 2" ng-show="showVotesTwo" style="float: right">
    Votes = {{vote[item.answernumber]}}
  </span>
  </li>
</input>
</ul>
<input type="button" value="Submit Vote" ng-click="submitVote('pollTwo', 2)" ng-disabled="!pollTwoSelected" class="btn btn-success">
<input type="button" value="Show Votes" ng-show="!showVotesTwo" ng-click="showVotes(2)" class="btn btn-info">
<input type="button" value="Reset Votes" ng-show="showVotesTwo" ng-click="resetVotes(2)" class="btn btn-warning">
</div>

<!----------------------------------------------------------------------------->

<h2 ng-click="pollDisplay(3, showPollThree)">
  <span class="label label-default">{{pollThree.title}}</span>
</h2>
<br>
<div id="successMessageThree" class="alert alert-success" role="alert" ng-show="showVotesThree">
  <strong>Thank You!</strong> Your vote has been recorded.
</div>
<div ng-show="showPollThree">
<div class="well">{{pollThree.question}}</div>
<ul class="list-group">
<li class="list-group-item" ng-repeat="item in pollAnswers" ng-if="item.pollid == 3">
  <input type="radio" name="pollThree" value={{item.answernumber}} ng-if="item.pollid == 3" ng-click="radioSelected('pollThree')">
  <span ng-if="item.pollid == 3">{{item.answer}}</span>
  <span ng-repeat="vote in votes" ng-if="item.pollid == 3" ng-show="showVotesThree" style="float: right">
    Votes = {{vote[item.answernumber]}}
  </span>
  </li>
</input>
</ul>
<input type="button" value="Submit Vote" ng-click="submitVote('pollThree', 3)" ng-disabled="!pollThreeSelected" class="btn btn-success">
<input type="button" value="Show Votes" ng-show="!showVotesThree" ng-click="showVotes(3)" class="btn btn-info">
<input type="button" value="Reset Votes" ng-show="showVotesThree" ng-click="resetVotes(3)" class="btn btn-warning">
</div>

<!----------------------------------------------------------------------------->

</div>
