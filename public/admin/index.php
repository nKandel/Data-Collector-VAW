<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SMS Based VAW Data Collection</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php require_once('../../includes/incomin_logs.php'); ?>
    <?php require_once('../../includes/moderatedLogs.php'); ?>
    <?php require_once('../../includes/zone.php'); ?>
    <?php require_once('../../includes/district.php'); ?>
    <?php require_once('../../includes/violenceType.php'); ?>

    <!-- Le styles -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }

      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
    </style>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>

  <body>
    <?php 
      $logs = IncomingLogs::find_by_sql('Select *from incominglogs where isModerated=0');

    ?>

    </script>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">SMS Based VAW Data Collection - Moderator Area</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Logged in as <a href="#" class="navbar-link">Bibek Subedi</a>
            </p>
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Unmoderated Messages</li>
              <li>You have <a href="#"><?php echo count($logs); ?> Message(s)</a>waiting moderation</li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
          <div class="hero-unit">
            <h1></h1>
            <table class="table">
              <caption>Unmoderated Messages</caption>
              <thead>
                <tr>
                  <th>Sender</th>
                  <th>Unique Key</th>
                  <th>Messages</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($logs as $log): ?>
                <tr>
                  <td><?php echo $log->sender ?></td>
                  <td><?php echo $log->uniqueKey ?></td>
                  <td><?php echo $log->message ?></td>
                  <td><a href="index.php?id=<?php echo $log->id; ?>">Moderate</a></td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          
          <?php if(isset($_GET['id'])): ?>
          <div class="row-fluid">
            <?php 
              $id = $_GET['id'];
              $idLog = IncomingLogs::find_by_id($id);
              $zones = Zone::find_all();
              $districts = District::find_all();
              $types = ViolenceType::find_all();
            ?>
            <h3><?php echo $idLog->message; ?></h3>
            <form class="form-horizontal" action="moderate.php?id=<?php echo $id; ?>" method="post">
              <div class="control-group">
                <label class="control-label" for="inputZone">Zone</label>

                <div class="controls">
                  <select name="zone" onchange="getComboA(this)" id="comboA">
                    <?php foreach($zones as $zone): ?>
                      <option value="<?php echo $zone->id; ?>"><?php echo $zone->name; ?></option>
                    <?php endforeach; ?>
                </select>

                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="inputDistrict">District</label>
                <div class="controls">
                  <select name="district">
                    <?php foreach($districts as $district): ?>
                      <option value="<?php echo $district->id; ?>"><?php echo $district->name; ?></option>
                    <?php endforeach; ?>
                </select>

                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="inputLocation">Location</label>
                <div class="controls">
                  <input type="text" id="inputLoation" placeholder="Location" name="location">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="inputDistrict">Violence Type</label>
                <div class="controls">
                  <select name="vtype">
                    <?php foreach($types as $type): ?>
                      <option value="<?php echo $type->id; ?>"><?php echo $type->type; ?></option>
                    <?php endforeach; ?>
                </select>

                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="inputMessage">Message</label>
                <div class="controls">
                 <textarea rows="10" name="msg"><?php echo $idLog->message; ?></textarea>
                 
               </div>
               <label><button type="submit" class="btn btn-primary" name="moderate">Moderate</button></label>
              </div>
          </form>
          </div>
        <?php elseif(isset($_GET['sucess'])): ?>
        <div class="row-fluid">
            <span>Record Added Sucessfully</span>
        </div>
        <?php endif; ?>
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; VAW Data Collection <?php echo date('Y'); ?></p>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>
