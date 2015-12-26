<!DOCTYPE html>
<html>
<head>
<!--src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"-->
<script  src="../js/jquery-2.1.1.js"></script>
<script>
$(document).ready(function(){
  $("#btn1").click(function(){
    $("p").append(" <b>Appended text</b>.");
  });
$("#btn3").click(function(){
    $("#selector").append(" <option>Appended text</option>.");
  });
  $("#btn2").click(function(){
    $("ol").append("<li>Appended item</li>");
  });
});
</script>
</head>
<body>

<p>This is a paragraph.</p>
<p>This is another paragraph.</p>
<ol>
<li>List item 1</li>
<li>List item 2</li>
<li>List item 3</li>
</ol>
<form>
<select id="selector">

</select>

<button id="btn1">Append text</button>
<button id="btn2">Append list item</button>
<button id="btn3">Append select</button>
</form>
</body>
</html>