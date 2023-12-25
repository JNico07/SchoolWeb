<!DOCTYPE html>
<html>
  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STI College CS501P</title>

    <link rel="stylesheet" href="Style/Index/grid_layout.css">
    <link rel="stylesheet" href="Style/Index/popup_login.css">
    <link rel="stylesheet" href="Style/Index/index.css">
   
  </head>
  <body>

    <div class="container">
        <!-- Header -->
        <div class="header">
          <h2 class="title">STI Education Group</h2>
          <button class="openButton" onclick="openForm()"><strong>Log in</strong></button>
        </div>
        <!-- Conternt Large -->
        <div class="content-large">
          <video autoplay loop muted width="100%" height="100%">
            <source src="res/STI comcvid.mp4" type="video/mp4">
            <source src="res/STI comcvid.ogg" type="video/ogg">
            Your browser does not support the video tag.
          </video>
        </div>
        <!-- Content Small side -->
        <div class="content-small">
          <img src="res/world-class-education-thumb.jpg" alt="STI image">
          <br>
          <h3>Online Registration</h3>
          <q>
            We warmly welcome high school graduates, college transferees, second coursers, foreign applicants, and graduate program applicants to our campuses.
          </q>
          <br>
          <button>Register now</button>
        </div>
        <!-- start Content xSmall bottom -->
        <div class="content-xsmall">
          <dl class="data_list">
            <dt class="data_term">Easy access to learning modules</dt>
              <dd class="desc_def">Students can study ahead, review past lessons, and watch instructional videos with a click or a tap of a button on any gadget.</dd>
          </dl>
        </div>

        <div class="content-xsmall">
        <dl class="data_list">
          <dt class="data_term">Interactive activities and assessments</dt>
            <dd class="desc_def">Students can test their knowledge and skills through interactive polls, quizzes, and debates, among others.</dd>
          </dl>
        </div>

        <div class="content-xsmall">
          <dl class="data_list">
            <dt class="data_term">Student attendance tracking</dt>
              <dd class="desc_def">Marking student attendance for an online class is more convenient whether the student logs in early, on time, late, or is offline.</dd>
            </dl>
        </div>

        <div class="content-xsmall">
          <dl class="data_list">
            <dt class="data_term">Collaborate with classmates</dt>
              <dd class="desc_def">The eLMS allows the students to chat with classmates, join forum discussions, write a blog, and facilitate a group work activity — all within the site.</dd>
          </dl>
        </div>
        <!-- end Content xSmall bottom -->
        <!-- Footer -->
        <div class="footer">@CS501P</div>

    </div>

    <!-- popup Log in Form -->
    <div class="loginPopup">
      <div class="formPopup" id="popupForm">
        <form action="login_process.php" method="post" class="formContainer">
          <h1>Log in</h1>
          <!-- change username to email -->
          <label for="username"> 
            <strong>username</strong>
          </label>
          <input type="text" id="username" placeholder="username" name="username" required>
          <!-- password -->
          <label for="password">
            <strong>Password</strong>
          </label>
          <input type="password" id="password" placeholder="Your Password" name="password" required>
          <button type="submit" class="btn">Log in</button>
          <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
      </div>
    </div>

    <script src="Script/popup_login.js"></script>

  </body>
</html>