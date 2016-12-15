<!DOCTYPE html>

<html ng-app="pollsApp" ng-controller="pollsController">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?php echo base_url('scripts/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('scripts/app.js'); ?>"></script>
    <script src="<?php echo base_url('scripts/controllers.js'); ?>"></script>
    <link href="https://bootswatch.com/sandstone/bootstrap.min.css" rel="stylesheet">
    <title><?php echo $title; ?></title>

</head>
<body>

  <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" >New Zealand Polls</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li><a href="#" ng-click="changeToHome()">Polls</a></li>
        <li><a href="#" ng-click="changeToAbout()">About</a></li>
      </ul>
    </div>
  </div>
</nav>

  <div class="container" style="margin-top: 60px"><?php echo $main; ?><div>
  <div><?php echo $about; ?><div>
  <hr>
  <p style="font-weight:bold">&copy; Adam Hunt 2016</p>

</body>
</html>
