<!DOCTYPE html>
<html>
<head>
	<title>Travel and Entertainment Search</title>
	<meta charset="utf-8"/>
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet"> 

	<style type="text/css">
		#container {
			width: 50%;
			position: relative;
			left: 24%;
			border: 3px solid;
			padding: 2px 10px 20px;
			font-weight: 700;
			border-color:rgb(196,196,196);
		}
		h1 {
			text-align: center;
			font-style: italic;
			margin-top: 2px;
			margin-bottom: 10px;
		}
		hr {
			border-width: 2px; 
		}

		#from2 {
			margin-left: 316px;
		}

		#submit {
			margin-left: 60px;
		}

		#result {
			width: 90%;
			position: relative;
			left: 5%;
		}

		table{
			width: 100%;
			border-collapse: collapse;
			margin-top: 20px;
		}

		th, tr, td{
			border: 2px solid;
			border-color:rgb(216,216,216);
			padding: 0;
		}

		#result table th {
			text-align: center;
		}

		#detail {
			width: 54%;
			position: relative;
			left: 23%;
			text-align: center;
		}

		#detail h3 {
			padding-bottom: 5px;
		}

		#detail p {
			margin-bottom: 6px;
		}

		#detail div img {
			width: 5%;
		}

		#detail #review_table img {
			width: 5%;
		}

		#detail #photo_table td img.high_resolution_image {
			width: 100%;
			cursor: pointer;
		}

		.hoverControl {
			cursor: pointer;
		}

		.googlemap {
	        height: 400px;
	        width: 30%;
	        
	        margin: auto;
	        position: absolute;
	    }



	    .mapClass {
	    	display: none;;
	    }

	    .route {
	    	position: absolute;
	    	z-index: 2;
	    }
	    .route_option {
	    	margin-top: 0;
	    	margin-bottom: 0;
	    	padding-top: 16px;
	    	padding-bottom: 16px;
	    	background-color: rgb(239,239,239);

	    }
	    .route_option:hover {
	    	background-color: rgb(217,217,217);
	    }

	    h4 {
	    	margin: 0;
	    	text-align: center;
	    }


	    .tutu {
	    	float: left;
	    	opacity: 0.5;
	    	color: rgb(180, 156, 105);
	    	font-family: 'Lobster', cursive;
	    }

	</style>
</head>
<body>
	<!---20180226TutuTest-->

	<div id="container">
		<h1>Travel and Entertainment Search</h1>
		<hr>
		<form id="form1" action="" method="POST">
			<label for="keyword">Keyword</label>
			<input id="keyword" type="text" name="keyword" required value=<?php if (isset($_POST["submits"])) echo "\"" . $_POST["keyword"] . "\"" ?>>
			<br>
			<label for="category">Category</label>
			<select id="category" name="category">
				<option class="category_value" id="default" value="default" <?php if (!isset($_POST["submits"]) || (isset($_POST["submits"]) && $_POST["category"] == "default")) echo "selected"?>>default</option> 
			  	<option class="category_value" value="cafe" <?php if (isset($_POST["submits"]) && $_POST["category"] == "cafe") echo "selected"?>>cafe</option>
			  	<option class="category_value" value="bakery" <?php if (isset($_POST["submits"]) && $_POST["category"] == "bakery") echo "selected"?>>bakery</option>
			  	<option class="category_value" value="restaurant" <?php if (isset($_POST["submits"]) && $_POST["category"] == "restaurant") echo "selected"?>>restaurant</option>
			  	<option class="category_value" value="beauty_salon" <?php if (isset($_POST["submits"]) && $_POST["category"] == "beauty_salon") echo "selected"?>>beauty salon</option>
			  	<option class="category_value" value="casino" <?php if (isset($_POST["submits"]) && $_POST["category"] == "casino") echo "selected"?>>casino</option>
			  	<option class="category_value" value="movie_theater" <?php if (isset($_POST["submits"]) && $_POST["category"] == "movie_theater") echo "selected"?>>movie theater</option>
			  	<option class="category_value" value="lodging" <?php if (isset($_POST["submits"]) && $_POST["category"] == "lodging") echo "selected"?>>lodging</option>
			  	<option class="category_value" value="airport" <?php if (isset($_POST["submits"]) && $_POST["category"] == "airport") echo "selected"?>>airport</option>
			  	<option class="category_value" value="train_station" <?php if (isset($_POST["submits"]) && $_POST["category"] == "train_station") echo "selected"?>>train station</option>
			  	<option class="category_value" value="subway_station" <?php if (isset($_POST["submits"]) && $_POST["category"] == "subway_station") echo "selected"?>>subway station</option>
			  	<option class="category_value" value="bus_station" <?php if (isset($_POST["submits"]) && $_POST["category"] == "bus_station") echo "selected"?>>bus station</option>
			</select>
			<br>
			<label for="distance">Distance (miles)</label>
			<input id="distance" type="text" name="distance" placeholder="10" value=<?php if (isset($_POST["submits"])) echo $_POST["distance"] ?>>
			<label for="from1">from</label>
			<input id="from1" type="radio" name="from" value="here" <?php if (!isset($_POST["submits"]) || (isset($_POST["submits"]) && $_POST["from"] == "here")) echo "checked"?>>
			<span>Here</span>
			<br>
			<input id="from2" type="radio" name="from" value="location" <?php if (isset($_POST["submits"]) && $_POST["from"] == "location") echo "checked"?>>

			<input id="location" type="text" name="location" placeholder="location" 
				   <?php if (!isset($_POST["submits"]) || $_POST["from"] != "location") echo "disabled"?> 
				   <?php if (isset($_POST["submits"]) && $_POST["from"] == "location") echo "value=" . "\"" . $_POST["location"] . "\"" ?>
			>

			<br>
			<input id="submits" type="submit" name="submits" value="Search">
			<!-- <input id="button" type="button" name="button" value="Search" disabled> -->
			<input id="clear" type="reset" value="Clear">
			<br>
			<input id="customer_latitude" type="hidden" name="customer_latitude">
			<input id="customer_longitude" type="hidden" name="customer_longitude">
			<input id="detail_info" type="hidden" name="detail">
		</form>
	</div>

	<div id="result"></div>

	<div id="detail"></div>

		<?php
			function googleMapText() {
				$output = "https://maps.googleapis.com/maps/api/geocode/json?address=";
				$key = "AIzaSyCw-gsG56wLuCJxF0vfack3yb_Kebfvky0";

				$keyowrds_array = explode(" ", $_POST["location"]);
				$keywords_text  = implode("+", $keyowrds_array);
				$output .= $keywords_text . "&key=" . $key;
				return $output;
			}

			function startingPoint() {
				if (isset($_POST["submits"])) {
					if ($_POST["from"] == "here") {
						$arr = array('lat' => floatval($_POST["customer_latitude"]), 'lng' => floatval($_POST["customer_longitude"]));

						return json_encode($arr);
					}
					else if ($_POST["from"] == "location") {
						$address_raw  = file_get_contents(googleMapText());
						$address_json = json_decode($address_raw, true);
						$arr = array('lat' => $address_json["results"][0]["geometry"]["location"]["lat"], 'lng' => $address_json["results"][0]["geometry"]["location"]["lng"]);
						return json_encode($arr);

					}
				}
			}

			function googlePlaceText() {
				$output = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?";
				$key = "AIzaSyCw-gsG56wLuCJxF0vfack3yb_Kebfvky0";

				if (isset($_POST["submits"])) {

					// append location
					if ($_POST["from"] == "here") {
						$output .= "location=" . $_POST["customer_latitude"] . "," . $_POST["customer_longitude"];
					}
					else if ($_POST["from"] == "location") {
						$address_raw  = file_get_contents(googleMapText());
						$address_json = json_decode($address_raw, true);
						$output .= "location=" . $address_json["results"][0]["geometry"]["location"]["lat"] . "," . $address_json["results"][0]["geometry"]["location"]["lng"];
						// echo $address_raw;
					}

					// append radius
					if ($_POST["distance"] != "") {
						$distanceInMeter = (int)$_POST["distance"] * 1609.34; // mile to meter
						$output .= "&radius=" . $distanceInMeter;
					}
					else {
						$distanceInMeter = 10.0 * 1609.34; // mile to meter
						$output .= "&radius=" . $distanceInMeter;
					}

					// append keywords
					$keyowrds_array = explode(" ", $_POST["keyword"]);
					$keywords_text  = implode("+", $keyowrds_array);
					$output .= "&keyword=" . $keywords_text;

					// append type
					if ($_POST["category"] != "default") {
						$output .= "&type=" . $_POST["category"];
					}

					// append key
					$output .= "&key=" . $key;

					$searchResult = file_get_contents($output);
					// $searchResult_json = json_decode($searchResult_raw, true);
					return $searchResult;
				}
			}

			function googlePlaceDetail() {
				$output = "https://maps.googleapis.com/maps/api/place/details/json?";
				$key = "AIzaSyCw-gsG56wLuCJxF0vfack3yb_Kebfvky0";

				if(isset($_POST["detail"])) {
					$output .= "placeid=" . $_POST["detail"];
					$output .= "&key=" . $key;
					$detailResult = file_get_contents($output);
					return $detailResult;
				}
			}
			
			function googlePlacePhoto($searchResult) {
				$template = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=1080";
				$key = "AIzaSyCw-gsG56wLuCJxF0vfack3yb_Kebfvky0";
				$result = json_decode($searchResult, true)["result"];
				if (isset($result["photos"])) {
					$photos = $result["photos"];
					$output = array();
					$i = 0;
					while ($i < sizeof($photos) && $i < 5) {

						$query = $template . "&photoreference=" . $photos[$i]["photo_reference"] . "&key=" . $key;
						$img = file_get_contents($query);
						$file = "../../nginx/html/image" . $i;
						file_put_contents($file, $img);
						$i++;
						ftp://name:password@ftp.example.com/welcome.html
					}
					return $i;
				}
				else {
					return 0;
				}
			}
		?>

	<script type="text/javascript"> 
		var searchResultJSON
		<?php
			if (isset($_POST["submits"]) && $_POST["submits"] != "" && $_POST["detail"] == "") {
				$searchResult = googlePlaceText();
				echo "=" . $searchResult;
			}
		?>
		;
		var searchDetailJSON
		<?php
			if (isset($_POST["detail"]) && $_POST["detail"] != "") {
				$searchResult = googlePlaceDetail();
				echo "=" . $searchResult;
			}
		?>
		;
		var searchPhotoJSON
		<?php
			if (isset($_POST["detail"]) && $_POST["detail"] != "") {
				$photoResult = googlePlacePhoto($searchResult);
				echo "=" . $photoResult;
			}
		?>
		;

		var start
		<?php
			if (isset($_POST["submits"]) && $_POST["submits"] != "" && $_POST["detail"] == "") {
				// print_r(startingPoint());
				echo "=" . startingPoint();
			}
		?>
		;
	</script>
			

<script type="text/javascript">
	function clear() {
		//clear keyword value
		var keyword = document.getElementById("keyword");
		if (keyword.hasAttribute("value")) {
			keyword.removeAttribute("value");
		}

		//clear category value
		var categories = document.querySelectorAll(".category_value");
		categories.forEach(function(element) {
			if (element.hasAttribute("selected")) {
				element.removeAttribute("selected");
			}
		});

		var defau = document.getElementById("default"); // default selected
		if (!defau.hasAttribute("selected")) {
			defau.setAttribute("selected", "");
		}

		//clear distance value
		var distance = document.getElementById("distance");
		if (distance.hasAttribute("value")) {
			distance.removeAttribute("value");
		}

		//clear from value
		var from2 = document.getElementById("from2");
		if (from2.hasAttribute("checked")) {
			from2.removeAttribute("checked");
		}
		var from1 = document.getElementById("from1");
		if (!from1.hasAttribute("checked")) {
			from1.setAttribute("checked", "");
		}
		var local = document.getElementById("location");
		if (!local.hasAttribute("disabled")) {
			local.setAttribute("disabled", "");
		}
		if (local.hasAttribute("required")) {
			local.removeAttribute("required");
		}
		if (local.hasAttribute("value")) {
			local.removeAttribute("value");
		}

		var div_result = document.getElementById("result");
		var div_detail = document.getElementById("detail");
		if (div_result) {
			div_result.innerHTML = "";
		}
		if (div_detail) {
			div_detail.innerHTML = "";
		}

		
	}


	var ip_request;
	if (window.XMLHttpRequest) {
		ip_request=new XMLHttpRequest();
	} else {
		ip_request=new ActiveXObject("Microsoft.XMLHTTP");
	}

	ip_request.open('GET', 'http://ip-api.com/json');
	ip_request.onreadystatechange = function() {
		if ((ip_request.status === 200) &&
			(ip_request.readyState === 4)) {

				info = JSON.parse(ip_request.responseText);

				if (info) {
					document.getElementById("submits").removeAttribute("disabled");
					document.getElementById("customer_latitude").setAttribute("value", info["lat"]);
					document.getElementById("customer_longitude").setAttribute("value", info["lon"]);
				}
		} //ready
	} //event
	ip_request.send();

	document.getElementById("from2").addEventListener("click", function() {
		var local = document.getElementById("location");
		if (local.hasAttribute("disabled")) {
			local.removeAttribute("disabled");
		}
		if (!local.hasAttribute("required")) {
			local.setAttribute("required", "");
		}
	});
	document.getElementById("from1").addEventListener("click", function() {
		var local = document.getElementById("location");
		if (!local.hasAttribute("disabled")) {
			local.setAttribute("disabled", "");
		}
		if (local.hasAttribute("required")) {
			local.removeAttribute("required");
		}
	});
	document.getElementById("clear").addEventListener("click", clear);


	if (searchResultJSON != null) { // if searchResultJSON exist and not undefined and not null
		// outputing results...
		var result_array = searchResultJSON["results"];
		var output_string = "<table>";
		if (result_array.length != 0) {
			output_string += "<tr>" + "<th>Category</th>" + "<th>Name</th>" + "<th>Address</th>" + "</tr>";
			for (var i = 0; i < result_array.length; i++) {
				output_string += "<tr>";
				output_string += "<td>" + "<img src=\"" + result_array[i]["icon"] + "\"" + "></td>";
				output_string += "<td>" + "<div id=\"detail " + i  + "\" class=\"detail_submit\" >" + "<span class=\"hoverControl\" >" + result_array[i]["name"] + "</span>" + "</div>" + "</td>";
				output_string += "<td>" + "<span class=\"hoverControl classControl mapControl_" + i + "\" >" + result_array[i]["vicinity"] 
				+ "<div class= \"map mapClass\">" + "<div class=\"route\">" 
				+ "<p class=\"walk_" + i + " route_option\">Walk there</p>" + "<p class=\"bike_" + i + " route_option\">Bike there</p>" + "<p class=\"drive_" + i + " route_option\">Drive there</p>" + "</div>" 
				+ "<div id=\"map" + i + "\" class=\"googlemap\">" + "</div>" + "</div>" + "</span>" + "</td>";
			}
		}
		else {
			output_string += "<tr><td><h4>" + "No Records Has Been Found" + "</h4></td></tr>";
		}
		output_string += "</table>";
		document.getElementById("result").innerHTML = output_string;

		var detail_submits = document.querySelectorAll(".detail_submit");
		for (var j = 0; j < detail_submits.length; j++) {
			var detail_info = result_array[j]["place_id"];
			detail_submits[j].addEventListener("click", function(){
				var id = this.getAttribute("id");
				var index = id.split(" ")[1];
				var submit_button = document.getElementById("submits");
				document.getElementById("detail_info").setAttribute("value", result_array[index]["place_id"]);
				// document.getElementById("submits").setAttribute("value", "Search");
				submit_button.click();
			});
		}

		if (result_array.length != 0) {
			var maps = document.querySelectorAll(".classControl");
			function mapOn(ev) {
				if (ev.originalTarget === this) {
					this.removeEventListener("click", mapOn);
					var index = this.classList[2].split("_")[1];
					if (googlemaps[index]) {
						directionsDisplay[index] = new google.maps.DirectionsRenderer;
						directionsDisplay[index].setMap(googlemaps[index]);
					}
					this.getElementsByClassName("map")[0].classList.toggle("mapClass");
					this.addEventListener("click", mapOff);
				}
			}

			function mapOff(ev) {
				if (ev.originalTarget === this) {
					this.removeEventListener("click", mapOff);
					this.getElementsByClassName("map")[0].classList.toggle("mapClass");
					var index = this.classList[2].split("_")[1];
					if (directionsDisplay[index]) {
						directionsDisplay[index].setMap(null);
						directionsDisplay[index] = null;
					}
					if (googlemaps[index] && markers[index]) {
						googlemaps[index].setCenter(markers[index].getPosition());
						googlemaps[index].setZoom(13);
					}
					this.addEventListener("click", mapOn);
				}
			}


			for (var i = 0; i < maps.length; i++) {
				maps[i].addEventListener("click", mapOn);
			}
		}

	}


	var reviewClickOn = function() {
		var output_string = "";
		output_string += "<div id=\"arrow_reviews\">" + "<img src=\"http://cs-server.usc.edu:45678/hw/hw6/images/arrow_up.png\">" + "</div>";
		output_string += "<table id=\"review_table\">";
		if (reviews != null) {
			for (var i = 0; i < reviews.length && i < 5; i++) {
				output_string += "<tr>" + "<td>" + "<img src=\"" + reviews[i]["profile_photo_url"] + "\"" + ">"; 
				output_string += "<b>" + reviews[i]["author_name"] + "</b>" + "</td>";
				output_string += "<tr>" + "<td>" + "<p>" + reviews[i]["text"] + "</p>" + "</td>";
			}
			document.getElementById("arrow_reviews").outerHTML = output_string;
		}
		else {
			output_string += "<tr>" + "<td>";
			output_string += "<h4>No Reviews Found</h4>"; 
			output_string += "</td>";
			document.getElementById("arrow_reviews").outerHTML = output_string;
		}
		document.getElementById("arrow_reviews").addEventListener("click", reviewClickOff);

		var output_string_photo = "";
		output_string_photo += "<div id=\"arrow_photos\">" + "<img src=\"http://cs-server.usc.edu:45678/hw/hw6/images/arrow_down.png\">" + "</div>";
		document.getElementById("arrow_photos").outerHTML = output_string_photo;
		if(document.getElementById("photo_table")) document.getElementById("photo_table").outerHTML = "";
		document.getElementById("arrow_photos").addEventListener("click", photoClickOn);
	}

	var reviewClickOff = function() {
		var output_string = "";
		output_string += "<div id=\"arrow_reviews\">" + "<img src=\"http://cs-server.usc.edu:45678/hw/hw6/images/arrow_down.png\">" + "</div>";
		document.getElementById("arrow_reviews").outerHTML = output_string;
		document.getElementById("review_table").outerHTML = "";
		document.getElementById("arrow_reviews").addEventListener("click", reviewClickOn);
	}

	var photoClickOff = function() {
		var output_string = "";
		output_string += "<div id=\"arrow_photos\">" + "<img src=\"http://cs-server.usc.edu:45678/hw/hw6/images/arrow_down.png\">" + "</div>";
		document.getElementById("arrow_photos").outerHTML = output_string;
		document.getElementById("photo_table").outerHTML = "";
		document.getElementById("arrow_photos").addEventListener("click", photoClickOn);
	}


	var photoClickOn = function() {
		var output_string = "";
		output_string += "<div id=\"arrow_photos\">" + "<img src=\"http://cs-server.usc.edu:45678/hw/hw6/images/arrow_up.png\">" + "</div>";
		output_string += "<table id=\"photo_table\">";
		if (searchPhotoJSON != 0) {
			
			for (var i = 0; i < searchPhotoJSON && i < 5; i++) {
				output_string += "<tr>" + "<td>";
				output_string += "<img id=\"high_resolution_image" + i + "\" class=\"high_resolution_image\" src=\"\">"; 
				output_string += "</td>";
			}
			document.getElementById("arrow_photos").outerHTML = output_string;

			for (var i = 0; i < searchPhotoJSON && i < 5; i++) {
				var search_id = "high_resolution_image" + i;
				var item = document.getElementById(search_id);
				item.setAttribute("src", "http://cs-server.usc.edu:34502/image" + i);
				// item.innerHTML = "<img src=\"" + searchPhotoJSON[i] + "\" target=\"_blank\"></a>"
				item.addEventListener("click", function(){
					var texthtml = writeHTML();
					var newwindow = window.open();
					newwindow.document.write(texthtml);
					newwindow.document.getElementById("high_resolution_image").setAttribute("src", this.getAttribute("src"));
					newwindow.document.close(); 
					
				});
			}
		}
		else {
			output_string += "<tr>" + "<td>";
			output_string += "<h4>No Photos Found</h4>"; 
			output_string += "</td>";
			document.getElementById("arrow_photos").outerHTML = output_string;
		}
		document.getElementById("arrow_photos").addEventListener("click", photoClickOff);

		var output_string_review = "";
		output_string_review += "<div id=\"arrow_reviews\">" + "<img src=\"http://cs-server.usc.edu:45678/hw/hw6/images/arrow_down.png\">" + "</div>";
		document.getElementById("arrow_reviews").outerHTML = output_string_review;
		if(document.getElementById("review_table")) document.getElementById("review_table").outerHTML = "";
		document.getElementById("arrow_reviews").addEventListener("click", reviewClickOn);

		// document.getElementById("arrow_photos").addEventListener("click", reviewClickOff);
	}

	function writeHTML() {
		var textHTML = "";
		textHTML +="<!DOCTYPE html><html><head><meta charset=\"UTF-8\"></head><style type=\"text/css\">body {background-color: black;} img {margin-left: auto;margin-right: auto;display: block;};</style><body><img id=\"high_resolution_image\" src=\"\"></body></html>";
		return textHTML;
	}


	if (searchDetailJSON != null) { // if searchDetailJSON exist and not undefined and not null
		// outputing results...
		// var result = searchDetailJSON["result"];
		var photo = searchDetailJSON["result"]["photos"];
		var reviews = searchDetailJSON["result"]["reviews"];
		var output_string = "";
		output_string += "<h3>" + searchDetailJSON["result"]["name"] + "</h3>";
		output_string += "<p>" + "click to show reviews" + "</p>";
		output_string += "<div id=\"arrow_reviews\">" + "<img src=\"http://cs-server.usc.edu:45678/hw/hw6/images/arrow_down.png\">" + "</div>";
		output_string += "<p>" + "click to show photos" + "</p>";
		output_string += "<div id=\"arrow_photos\">" + "<img src=\"http://cs-server.usc.edu:45678/hw/hw6/images/arrow_down.png\">" + "</div>";
		document.getElementById("detail").innerHTML = output_string;

		document.getElementById("arrow_reviews").addEventListener("click", reviewClickOn);
		document.getElementById("arrow_photos").addEventListener("click", photoClickOn);

	}


	function initMap() {
		
		if (searchResultJSON != null && searchResultJSON["results"].length != 0) {

			googlemaps = [];
			markers = [];

			for (var i = 0 ; i < searchResultJSON["results"].length; i++) {

				var location = searchResultJSON["results"][i]["geometry"]["location"];

				var local = {lat: location["lat"], lng: location["lng"]};
				var id = "map" + i;

				googlemaps[i] = new google.maps.Map(document.getElementById(id), {
		        	zoom: 13,
		        	center: local
		        });
		        markers[i] = new google.maps.Marker({
		        	position: local,
		        	map: googlemaps[i]
		        });
			}

			var routes = document.querySelectorAll(".route");
			var end = [];
			directionsService = [];
			directionsDisplay = [];
			for (var i = 0 ; i < routes.length; i++) {
				directionsService[i] = new google.maps.DirectionsService;
        		directionsDisplay[i] = new google.maps.DirectionsRenderer;

				end[i] = searchResultJSON["results"][i]["geometry"]["location"];
				
				var walks  = routes[i].getElementsByClassName("walk_" + i);
				var bikes  = routes[i].getElementsByClassName("bike_" + i);
				var drives = routes[i].getElementsByClassName("drive_" + i);

				function calculateAndDisplayRoute(directionsService, directionsDisplay, start, end, type) {
			        directionsService.route({
			          	origin: start,
			          	destination: end,
			          	travelMode: type
			        }, function(response, status) {
				       	if (status === 'OK') {
				    		directionsDisplay.setDirections(response);
				        } else {
				        	window.alert('Directions request failed due to ' + status);
				        }
			        });
			    }


				function onChangeHandler(ev) {
					var target_info = ev.target.classList[0].split("_");
					var index = target_info[1];
					var target_type = target_info[0];
					var type;
					
					if (target_type === "walk") {
						type = "WALKING";
					}
					else if (target_type === "bike") {
						type = "BICYCLING";
					}
					else if (target_type === "drive") {
						type = "DRIVING";
					}

		          	calculateAndDisplayRoute(directionsService[index], directionsDisplay[index], start, end[index], type);
		        };


				walks[0].addEventListener("click", onChangeHandler);
				bikes[0].addEventListener("click", onChangeHandler);
				drives[0].addEventListener("click", onChangeHandler);

			}


		}
    }

   
</script>

<script async defer 
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCw-gsG56wLuCJxF0vfack3yb_Kebfvky0&callback=initMap">
</script>


</body>
</html>