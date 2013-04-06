<?php
$wampConfFile = '../wampmanager.conf';
if (!is_file($wampConfFile))
    die ('Unable to open WampServer\'s config file, please change path in index.php file');
//require $wampConfFile;
$fp = fopen($wampConfFile,'r');
$wampConfFileContents = fread ($fp, filesize ($wampConfFile));
fclose ($fp);

// Versões
// PHP
preg_match('|phpVersion = (.*)\n|',$wampConfFileContents,$result);
$phpVersion = str_replace('"','',$result[1]);
// Apache
preg_match('|apacheVersion = (.*)\n|',$wampConfFileContents,$result);
$apacheVersion = str_replace('"','',$result[1]);
// MySQL
preg_match('|mysqlVersion = (.*)\n|',$wampConfFileContents,$result);
$mysqlVersion = str_replace('"','',$result[1]);
// Wamp
preg_match('|wampserverVersion = (.*)\n|',$wampConfFileContents,$result);
$wampserverVersion = str_replace('"','',$result[1]);



// Projects
$projectsListIgnore = array ('.','..','css','js','img');


if (isset($_GET['phpinfo']))
{
	phpinfo();
	exit();
}


// Aliases
$aliasDir = '../alias/';
$aliasContents = '';

if (is_dir($aliasDir))
{
    $handle=opendir($aliasDir);
    while ($file = readdir($handle)) 
    {
	    if (is_file($aliasDir.$file) && strstr($file, '.conf'))
	    {
		    $msg = '';
		    $aliasContents .= '<li><a href="'.str_replace('.conf','',$file).'/">'.ucwords(str_replace('.conf','',$file)).'</a></li>';
	    }
    }
    closedir($handle);
}
if (!isset($aliasContents))
	$aliasContents = 'Nenhum Alias encontrado';


$handle = opendir(".");
$projectContents = '';
while ($file = readdir($handle)) 
{
	if (is_dir($file) && !in_array($file,$projectsListIgnore)) 
	{		
		$projectContents .= '<li><a href="'.$file.'">'.ucwords($file).'</a></li>';
	}
}
closedir($handle);
if (!isset($projectContents))
	$projectContents = 'Nenhum Projeto encontrado';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>LOCALHOST</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="/favicon.ico" type="image/x-icon" rel="icon" />
	<link href="/favicon.ico" type="image/x-icon" rel="shortcut icon" />
	
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/css/bootstrap-responsive.min.css" />
	<link rel="stylesheet" type="text/css" href="/css/base.css" />
</head>
<body id="default" class="">

	<div id="container" class="container">

		<!-- #content -->
		<div id="content" class="row">
			<div id="content-container" class="span12">

        <div>
					<h2>Projetos</h2>
					<ul class="projects">
						<?php echo $projectContents ?>
					</ul>
					
					<h2>Aliases</h2>
					<ul class="aliases">
						<?php echo $aliasContents ?>			
					</ul>

					<h2>Úteis</h2>
					<ul class="tools">
						<li><a href="?phpinfo=1">phpinfo()</a></li>
						<li><a href="phpmyadmin/">phpmyadmin</a></li>
					</ul>
        </div>

			</div><!-- /#content-container -->
		</div><!-- /#content -->

		<!-- #footer -->
		<div id="footer" class="row">
			<div class="footer-copy span12">
			</div>
		</div><!-- /#footer -->

		<div class="footer-spacer"></div>

	</div><!-- /end/ #container -->

<script type="text/javascript" src="/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="/js/base.js"></script>

</body>
</html>
