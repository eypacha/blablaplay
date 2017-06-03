<?php 
// Constantes y variables globales
$title = "BlaBlaPlay";
$v = "0.1";
$listen = "Escuchar";
$finish = "Terminar";
$tracks = 5;
$description = "SpeechRecognition Music Player"

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo description ?>">
    <meta name="author" content="Ey Pacha!">

    <title><?php echo $title . ' v' . $v ?></title>
	
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	
	<meta property="og:locale" content="en_ES" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?php echo $title . ' v' . $v ?>"/>
	<meta property="og:description" content="<?php echo description ?>" />
	<meta property="og:url" content="https://eypacha.com.ar/blablaplay/" />
	<meta property="og:site_name" content="<?php echo $title . ' v' . $v ?>" />
	<meta property="og:image" content="https://eypacha.github.io/bbx-tracker/img/ogg_preview.jpg" />
	
</head>

<body>
<div class="container">
<div class="row">
	<div class="col-md-12 barras">
		<span class="title"><?php echo $title ?> <small>v<?php echo $v ?></small></span>
		<a id="escuchar" href="#" class="btn btn-primary"><?php echo $listen ?></a>
		<a id="terminar" href="#" class="btn btn-primary" style="display:none"><?php echo $finish ?></a>
		<span id="estado"></span>
	</div>
</div>
<br>
<?php for($i=0;$i<$tracks;$i++){ ?>
<div class="alert alert-warning" role="alert">
<div id="track-<?php echo $i ?>" class="row tracks">
	<div class="col-md-6">
		<div class="track-selection input-group">
		  <span class="input-group-addon"><i class="fa fa-music fa-fw"></i></span>
		  <a class="input-group-addon btn btn-file" data-track="<?php echo $i ?>"><i class="fa fa-paperclip fa-fw"></i></a>
		  <div id="file-name-<?php echo $i ?>" type="text" class="form-control">...</div>
		  <input type="file" id="file-<?php echo $i ?>" class="file" data-track="<?php echo $i ?>"> 
		</div>
	</div>
	<div class="col-md-6">
		<audio id="audio-<?php echo $i ?>" src="" controls></audio>
	</div>
	<div class="col-md-6">
		<div class="track-selection input-group">
		  <a class="btn btn-play input-group-addon" data-target="<?php echo $i ?>"><i class="fa fa-play fa-fw"></i></a>
		  <a id="btn-<?php echo $i ?>-play" class="input-group-addon btn btn-rec" data-option="play" data-target="<?php echo $i ?>-play"><i class="fa fa-microphone fa-fw"></i></a>
		  <div id="frase-<?php echo $i ?>-play" type="text" class="form-control">...</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="track-selection input-group">
		  <a class="btn btn-stop input-group-addon" data-target="<?php echo $i ?>"><i class="fa fa-stop fa-fw"></i></a>
		  <a id="btn-<?php echo $i ?>-stop" class="input-group-addon btn btn-rec" data-option="stop" data-target="<?php echo $i ?>-stop"><i class="fa fa-microphone fa-fw"></i></a>
		  <div id="frase-<?php echo $i ?>-stop" type="text" class="form-control">...</div>
		</div>
	</div>
</div>
</div>
<?php } ?>

</div>

<div class="hints"></div>
<div class="output"></div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/howler.min.js"></script>
<script>
var tracks = <?php echo $tracks ?>;
</script>
<script src="js/main.js"></script>
</body>
</html>