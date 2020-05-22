<?php 
echo
'<script>
 var coordinateX;
 
 if (event == null) {
 coordinateX = 0;
 } else {
 coordinateX = event.pageX;
 }
 
 return coordinateX;
}

function() {
 
 var coordinateY;
 
 if (event == null) {
 coordinateY = 0;
 } else {
 coordinateY = event.pageY;
 }
 
 return coordinateY;
}

function () {
 
 var body = document.body;
 var html = document.documentElement;
 var width = Math.max(body.scrollWidth, body.offsetWidth, html.clientWidth, html.scrollWidth, html.offsetWidth);
 
 return width;
 
}

function () {
 
 var body = document.body;
 var html = document.documentElement;
 var height = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight);
 
 return height;
 
}

function () {
 
 var body = document.body;
 var html = document.documentElement;
 var height = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight);
 
 return height;
 
}

function() {
 
 var clickCoordinateX = {{JS — Click X Coordinate}};
 var screenCoordinateX = {{JS — Screen X Coordinate}};
 var relativeX;
relativeX = (clickCoordinateX / screenCoordinateX).toFixed(2);
return relativeX;
 
}

function() {
 
 var clickCoordinateY = {{JS — Click Y Coordinate}};
 var screenCoordinateY = {{JS — Screen Y Coordinate}};
 var relativeY;
relativeY = (clickCoordinateY / screenCoordinateY).toFixed(2);
return relativeY;
 
}

</script>'
?>
