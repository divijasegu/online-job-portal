<?php
    if(isset($_SESSION['username'])) { 
     include("include\config.php");
     }else{
     require_once("include\config.php");  
     }
     //include_once("include\session.php"); 
     require_once("include\session.php");
     
    $baseurl = "http://".$_SERVER['SERVER_NAME']."/admin/asset/image/";
?>
<!DOCTYPE html>
<html>
<head>
<title>OnlineJobPortal - Home</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="asset\css\homestyle.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <script src="asset\js\jquery-3.5.1.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <script src="asset\js\jssor.slider-28.0.0.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        window.jssor_1_slider_init = function() {

            var jssor_1_options = {
              $AutoPlay: 1,
              $Idle: 0,
              $SlideDuration: 2000,
              $SlideEasing: $Jease$.$Linear,
              $PauseOnHover: 4,
              $SlideWidth: 200,
              $Align: 0
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 1280;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
   <!--  // <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
</head>
<body>

<div class="hompagecontainer">
	<?php include("header.php"); ?>
	

    <!-- Left and right controls -->
  
  </div>

	<div class="searchDiv">
		<input class="titlesearch" type="text" name="titlesearch" id="titlesearch" placeholder="Search by Job title">
	<input class="location" type="text"  name="location" id="location" placeholder="Location">
		<button class="btnSearch" name="btnSearch" id="btnSearch" >Find Job</button>
	</div>

	<!-- This div will contain a list of all jobs that match our search term -->
    <div id="search_results" style="padding:5px;"></div>
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:100px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="asset\image\spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:100px;overflow:hidden;">
            

           
            </div>
    </div>
    <script type="text/javascript">jssor_1_slider_init();
    </script>
	<div class="bottomBorder"><img src="<?php echo "asset\image\bottombn.jpg"; ?>"></div>
	<?php include("footer.php"); ?>
</div>

<script type="text/javascript">
$(document).ready(function() {
    //Add a JQuery click listener to our search button.
    $('#btnSearch').click(function(){
     
        //get the titlesearch that is being search for
        //from the search_box.
        var titlesearch = $('#titlesearch').val().trim();

        //get the location that is being search for
        //from the search_box.
        var location = $('#location').val().trim();
        //Carry out a GET Ajax request using JQuery
        $.ajax({
            //The URL of the PHP file that searches MySQL.
            url: 'getjobs.php',
            data: {
                titlesearch: titlesearch,
                location: location
            },
            success: function(returnData){
                //Set the inner HTML of our search_results div to blank to
                //remove any previous search results.
                $('#search_results').html('');
                //Parse the JSON that we got back from search.php
                var results = JSON.parse(returnData);
                //Loop through our employee array and append their
                //names to our search results div.
                $.each(results, function(key, value){
                    $('#search_results').append("<div class='divtitle'><span><a href='myaccount.php'>Apply</a></span></div>");
                    $('#search_results').append("<div class='divtitle'><span> Title: </span>"+value.title+"</div>");
                    $('#search_results').append("<div class='divtitle'><span> Company: </span>"+value.company+"</div>");
                    $('#search_results').append("<div class='divtitle'><span> Experience: </span>"+value.experience+"</div>");
                    $('#search_results').append("<div class='divtitle'><span> Description: </span>"+value.description+"</div>");
                    $('#search_results').append("<div class='divtitle'><span> Opening: </span>"+value.opening+"</div>");
                    $('#search_results').append("<div class='divtitle'><span> Location: </span>"+value.location+"</div></br>");
                    
                });
                //If no employees match the name that was searched for, display a
                //message saying that no results were found.
                if(results.length == 0){
                    $('#search_results').html("<div class='divtitle'>No Jobs with that name were found!</div></br>");
                }
            }
        });
     });
});
</script>
</body>
</html>