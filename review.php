<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>User Sign Up</title>
  <link rel="stylesheet" href="review.css">
</head>
<body>
      <h1>Review</h1>
	  <form method="post" action=".html" name="Form">
	  Review:
	  <p><textarea id="address" rows="10" cols="70" name="review" value="" ></textarea></p>
	  <div class="rating">
    <span><input type="radio" name="rating" id="str5" value="5"><label for="str5"></label></span>
    <span><input type="radio" name="rating" id="str4" value="4"><label for="str4"></label></span>
    <span><input type="radio" name="rating" id="str3" value="3"><label for="str3"></label></span>
    <span><input type="radio" name="rating" id="str2" value="2"><label for="str2"></label></span>
    <span><input type="radio" name="rating" id="str1" value="1"><label for="str1"></label></span>
</div>
<script type="text/javascript">
$(document).ready(function(){
//  Check Radio-box
    $(".rating input:radio").attr("checked", false);
    $('.rating input').click(function () {
        $(".rating span").removeClass('checked');
        $(this).parent().addClass('checked');
    });

    $('input:radio').change(
    function(){
        var userRating = this.value;
        alert(userRating);
    }); 
});
</script><br><br>
<p class="submit"><input type="submit" name="commit" value="Submit"></p>
</body>
</html>
