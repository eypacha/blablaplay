var recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition || window.mozSpeechRecognition || window.msSpeechRecognition)();
var audio = [];
var target;
var escuchando = false;

$(document).ready(function() {

$(".btn-play").on("click",function(){
	var track = $(this).data("target");
	document.getElementById("audio-"+track).play(); 
	
});
	
$(".btn-stop").on("click",function(){
	var track = $(this).data("target");
	document.getElementById("audio-"+track).pause(); 
	document.getElementById("audio-"+track).currentTime = 0;
	
});
	
	
for(var i=0;i<tracks;i++){
	audio[i] = $('#audio-'+i);
} 

$('.file').on('change', function(e) {
  var target = e.currentTarget;
  var file = target.files[0];
  var reader = new FileReader();
  var track = $(this).data("track");
  console.log("cambio en: " + track);
   if (target.files && file) {
        var reader = new FileReader();
	   $("#file-name-"+track).html(document.getElementById("file-"+track).files[0].name);
        reader.onload = function (e) {
            $('#audio-'+track).attr('src', e.target.result);
        }
        reader.readAsDataURL(file);
    }
});
	
$(".btn-file").on("click",function(){
	var track = $(this).data("track");
	console.log("click en: " + track);
	elegirAudio(track);
})

	
function elegirAudio(cual){
	$("#file-"+cual).click();
}
	
$(".btn-rec").on("click",function(){
	target = $(this).data("target");
	$(this).css("color","red");
	$("#frase-" + target).html("escuchando...");
	recognition.start();
	
})
	
recognition.lang = 'es-ES';
recognition.interimResults = false;
recognition.maxAlternatives = 5;

$("#escuchar").on("click",function(){
	target = "escuchar";
	escuchando = true;
	$("#escuchar").css("display","none");
	$("#terminar").css("display","");
	$(".btn-file").css("display","none");
	$(".btn-rec").css("display","none");
	recognition.start();
	$("#estado").html("<i class='fa fa-commenting'></i> ");
	
})

$("#terminar").on("click",function(){
	target = "escuchar";
	escuchando = false;
	$("#terminar").css("display","none");
	$("#escuchar").css("display","");
	$(".btn-file").css("display","");
	$(".btn-rec").css("display","");
	recognition.stop();
	$("#estado").html("");
})
	
recognition.onresult = function(event) {
	
	var dicho = event.results[0][0].transcript;
	
	if(escuchando){
		$("#estado").html("<i class='fa fa-comment'></i> " + dicho);
		
		for(var i=0;i<tracks;i++){
			
			if(dicho == $("#frase-"+i+"-play").html()){
			  document.getElementById("audio-"+i).play(); 
			}

			if(dicho == $("#frase"+i+"-stop").html()){
			  document.getElementById("audio-"+i).pause();
			  document.getElementById("audio-"+i).currentTime = 0;
			}
		}
		
	} else {
		if (target != "escuchar"){
			$("#frase-"+target).html(dicho);
		}
	}

};
	
recognition.onend = function(event) {
	if(escuchando){
		recognition.start();
	} else {
		if (target != "escuchar"){
			$("#btn-"+target).css("color","black");
		}
	}

};

function playMusic(){
	document.getElementById("musica").play(); 
}
function stopMusic(){
	document.getElementById("musica").pause(); 
}	
});