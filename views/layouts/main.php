<?php /* views/layouts/main.php */ ?>

<!doctype html>
<html lang="en">
  <head>
    <base href="<?= $_ENV['HOST'] ?>">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/sidebar.css" rel="stylesheet">

    <link href="css/bootstrap-msp.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Mailing Service Panel</title>
  </head>
  <body>

  <div class="container">
    <div class="row">
      <div class="col-3">
          <div class="flex-shrink-0 p-3 bg-white">
          <div class="d-flex align-items-center pb-3 mb-3 link-dark border-bottom">
            <img src="images/logo.png" class="bi me-2" width="30" height="30" />
            <span class="fs-5 fw-semibold">MSP 4</span>
          </div>
          <ul class="list-unstyled ps-0">
            <li class="mb-1">
              <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                Actions
              </button>
              <div class="collapsec" id="home-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                  <li><a href="/" class="link-dark rounded">Dashboard</a></li>
                  <li><a href="newmailing" class="link-dark rounded">Mailing</a></li>
                  <li><a href="newnewsletter" class="link-dark rounded">HTML Newsletter</a></li>
                </ul>
              </div>
            </li>
            <li class="mb-1">
              <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                Reciepient
              </button>
              <div class="collapse show" id="dashboard-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                  <li><a href="newgroup" class="link-dark rounded">Import</a></li>
                  <li><a href="groupslist" class="link-dark rounded">Groups</a></li>
                </ul>
              </div>
            </li>
            <li class="mb-1">
              <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                Sender
              </button>
              <div class="collapse show" id="orders-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                  <li><a href="newsender" class="link-dark rounded">New</a></li>
                  <li><a href="senderslist" class="link-dark rounded">List</a></li>
                </ul>
              </div>
            </li>
            <li class="border-top my-3"></li>
            <li class="mb-1">
              <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                Account
              </button>
              <div class="collapse show" id="account-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                  <li><a href="profile" class="link-dark rounded">Profile</a></li>
                  <li><a href="settings" class="link-dark rounded">Settings</a></li>
                  <li><a href="logout" class="link-dark rounded">Sign out</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-9">
        {{content}}
      </div>
    </div>
  </div>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  </body>
</html>