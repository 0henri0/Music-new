<!DOCTYPE html>
<html>
<head>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

<audio controls id='audio'>

  <source src='pages/media/Dung-Nhu-Thoi-Quen-JayKii-Sara-Luu.mp3' type="audio/mpeg">
  Your browser does not support the audio element.
</audio>

<p><strong>Note:</strong> The audio tag is not supported in Internet Explorer 8 and earlier versions.</p>
<input type="range" id="seek" value="0" max=""/>
<script>
    var element = document.getElementById('audio');
     $("#seek").bind("change", function() {
            element.currentTime = $(this).val();
        });
element.addEventListener('timeupdate',function (){

    $("#seek").attr("max", element.duration);
    $('#seek').val(element.currentTime);
    });
</script>
</body>
</html>
