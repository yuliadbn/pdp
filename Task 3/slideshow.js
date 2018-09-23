var ImgSlideshow = {
	init: function () {
		$(window).bind("load", loadListener);

		function loadListener()//nested
		{
			var myPix = ["images/robot1.jpg", "images/robot2.jpg", "images/robot3.jpg"];
			var thisPic = 0;
			var trackerUrlTemplate = "http://www.google-analytics.com/__utm.gif?utmwv=4&utmn=769876874&utmhn=example.com&utmcs=ISO-8859-1&utmsr=1280x1024&utmsc=32-bit&utmul=en-us&utmje=1&utmfl=9.0%20%20r115&utmcn=1&utmdt=GATC012%20setting%20variables&utmhid=2059107202&utmr=0&utmp=/auto/GATC012.html?utm_source=www.gatc012.org&utm_campaign=campaign+gatc012&utm_term=keywords+gatc012&utm_content=content+gatc012&utm_medium=medium+gatc012&utmac=UA-30138-1&utmcc=__utma%3D97315849.1774621898.1207701397.1207701397.1207701397.1%3B&img="
			

			function previousLink() {
				if (thisPic == 0) {
					thisPic = myPix.length;
				}
				thisPic--;
				document.getElementById("myPicture").src = myPix[thisPic];
				// Change src on tracker image
				document.getElementById("trackerImage").src = trackerUrlTemplate+myPix[thisPic].split("/")[1];
				
				event.preventDefault();

				
				

			}// end of previous function

			function forwardLink() {
				thisPic++;
				if (thisPic == myPix.length) {
					thisPic = 0;
				}
				document.getElementById("myPicture").src = myPix[thisPic];
				document.getElementById("trackerImage").src = trackerUrlTemplate+myPix[thisPic].split("/")[1];
				event.preventDefault();
			}// end of forwardlink function

			function newLocation() {
				var myUrl = ["yandex.ru", "google.com", "amazon.co.uk"];
				//alert("Image: "+myPix[thisPic]+" URL: "+myUrl[thisPic]);
				document.location.href = "http://www." + myUrl[thisPic];
				event.preventDefault();
			}

			//click on previous/forward arrows
			var previous = document.getElementById("prevLink");
			$(previous).bind("click", previousLink);
			var next = document.getElementById("nextLink");
			$(next).bind("click", forwardLink);

			//click on image
			if (document.getElementById("myPicture").parentNode.tagName == "A") {
				var imageClick = document.getElementById("myPicture").parentNode;
				$(imageClick).bind("click", newLocation);
			}//end of if



		}//end of loadListener Function
	} //end of init function		
}; //end of object

ImgSlideshow.init();