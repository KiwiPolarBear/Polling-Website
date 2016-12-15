<div ng-show="showAbout">
<h1>About</h1>

<h2>
  <span class="label label-default">Author Details</span>
</h2>
<br>
<div class="well">
  <p>
  <strong>Name: </strong>
    Adam Hunt
  </p>
  <p>
  <strong>Date: </strong>
    30/05/2016
  </p>
  <p>
  <strong>Student ID: </strong>
    99273354
  </p>
</div>

<h2>
  <span class="label label-default">Functionality</span>
</h2>
<br>
<div class="well">
  <p>
  The design of this website has been kept simple, in order to reduce confusion.
  The main page is the polls page. It lists all the current polls. You can
  select a poll by clicking it's title. This will open up the poll options
  underneath. You can select one of the options for each poll. You can either
  submit the answer, or view the current votes. When you have
  submited an answer, you will be informed that it has been added to the
  database. The tally of all the current votes will then be displayed next to
  each option. You can press the reset votes option to reset the database for
  that poll. If you click the poll title again, the options will disappear.
  </p>
</div>

<h2>
  <span class="label label-default">Bugs</span>
</h2>
<br>
<div class="well">
  <p>
  No known bugs at this stage.
  </p>
</div>

<h2>
  <span class="label label-default">Code and Data Design</span>
</h2>
<br>
<div class="well">
  <p>
  The website was constructed in two parts. The front end and the back end.
  Codeigniter was used for the back end, which was quite useful. When coding
  the RESTful services, you could specify an http verb in the routes file,
  which means it will only route to the right service if the request type
  matches the verb. The database setup was also made easy with codeigniter, as
  i just needed to set up a model and link it to my controller functions. This
  formed the basis of my back end. It was a lot easier to build the front end
  with the back end done. i created scripts and made an angular app and
  controller. I then created scope variables of all the database data needed,
  which used my urls i created in the back end. Once this was done, the rest
  was just using making controller functions to deal with my angular directives.
  </p>
</div>

<h2>
  <span class="label label-default">Key Design Descisions</span>
</h2>
<br>
<div class="well">
  <p>
  There were a few key descisions i had to make with this website. The first
  descision is to do with the RESTful web services. The services work, but i
  decided not to use two of them in the actual implementeation of my front end.
  To get the answers for my polls, i had to create a seperate function to send
  an array of answers mapped to answer numbers. I didnt want to use the RESTful
  service becauese it returned the answers without the answer numbers and i
  didnt want to change the service because it wouldnt meet the specifications.
  I also had to use a seperate function to add a poll vote to the database. The
  RESTful service worked, but when i tried to send a post request with angular,
  it was always recieved as a get request. I spent too long trying to get it to
  work, but in the end, had to route to another function. Another decision was
  to keep the views in one document. Instead of loading a different view each
  time, the views were hidden and shown, in order to create less requests. This
  also means that anything you have done on one page, will still be there when
  you switch.
  </p>
</div>

<h2>
  <span class="label label-default">Acknowledgements</span>
</h2>
<br>
<div class="well">
  <p>
    <strong>COSC 365 Labs and Lecture Material</strong>
  </p>
  <p>
    <strong>W3Schools Tutorials</strong>
    http://www.w3schools.com/angular/
  </p>
  <p>
    <strong>Bootsrap</strong>
    http://getbootstrap.com/examples/theme/
  </p>
  <p>
    <strong>Bootswap</strong>
    https://bootswatch.com/sandstone/
  </p>
  <p>
    <strong>Codeigniter</strong>
    https://www.codeigniter.com/userguide3/general/
  </p>
</div>

</div>
