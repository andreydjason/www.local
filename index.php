<?php
// Work Projects
$projectsListIgnore = array ('.','..','assets');
$handle = opendir(".");
$workProjectContents = '';
while ($file = readdir($handle)) 
{
  if (is_dir($file) && !in_array($file,$projectsListIgnore) && strpos($file, 'work_')) 
  {
    $workProjectContents .= '<li><a href="'.$file.'">'.ucwords(str_replace('work_', '', $file)).'</a></li>';
  }
}
closedir($handle);
if ($workProjectContents == '') {
  $workProjectContents = 'Nenhum Projeto de Trabalho encontrado';
}
// end Work Projects

// Lab Projects
$projectsListIgnore = array ('.','..','assets');
$handle = opendir(".");
$labProjectContents = '';
while ($file = readdir($handle)) 
{
  if (is_dir($file) && !in_array($file,$projectsListIgnore) && strpos($file, 'lab_')) 
  {
    $labProjectContents .= '<li><a href="'.$file.'">'.ucwords(str_replace('lab_', '', $file)).'</a></li>';
  }
}
closedir($handle);
if ($labProjectContents == '') {
  $labProjectContents = 'Nenhum Projeto do Laboratório encontrado';
}
// end Lab Projects

// Personal Projects
$projectsListIgnore = array ('.','..','assets');
$handle = opendir(".");
$personalProjectContents = '';
while ($file = readdir($handle)) 
{
  if (is_dir($file) && !in_array($file,$projectsListIgnore) && strpos($file, 'personal_')) 
  {
    $personalProjectContents .= '<li><a href="'.$file.'">'.ucwords(str_replace('personal_', '', $file)).'</a></li>';
  }
}
closedir($handle);
if ($personalProjectContents == '') {
  $personalProjectContents = 'Nenhum Projeto Pessoal encontrado';
}
// end Personal Projects
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>WWW.LOCAL</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="WWW.LOCAL">
    <meta name="author" content="Andrey D. Viana">

    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="/assets/css/website-base.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="/assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="/assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="/assets/ico/favicon.png">
  </head>

  <body>

    <div class="container">

      <div class="masthead">
        <h3 class="muted">WWW.LOCAL</h3>
        <div class="navbar">
          <div class="navbar-inner">
            <div class="container">
              <ul class="nav">
                <li class="active"><a href="#">Projetos</a></li>
              </ul>
            </div>
          </div>
        </div><!-- /.navbar -->
      </div>

      <div class="row">
        <div class="span4">
          <h3>Trabalho</h3>
          <ul class="unstyled">
            <?php echo $workProjectContents ?>
          </ul>
        </div>

        <div class="span4">
          <h3>Laboratório</h3>
          <ul class="unstyled">
            <?php echo $labProjectContents ?>
          </ul>
        </div>

        <div class="span4">
          <h3>Pessoal</h3>
          <ul class="unstyled">
            <?php echo $personalProjectContents ?>
          </ul>
        </div>
      </div>

      <hr>

      <!-- <div class="row-fluid">
        <div class="span4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
        <div class="span4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
       </div>
        <div class="span4">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
      </div> -->

      <hr>

      <div class="footer">
        <p>&copy; WWW.LOCAL <?php echo date("Y") ?></p>
      </div>

    </div><!-- /container -->

    <script src="/assets/js/jquery-1.9.1.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/consolelog.js"></script>
    <script src="/assets/js/consolelog.detailprint.js"></script>
    <script src="/assets/js/website-plugins.js"></script>
    <script src="/assets/js/website-base.js"></script>

  </body>
</html>