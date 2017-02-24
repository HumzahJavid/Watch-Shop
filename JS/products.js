	//method1
	function swapImages(x) {
		switch (x) {
			case 1: 
			document.getElementById("image1").src = "images/info/1.png";
			break;
			
			case 2:
			document.getElementById("image2").src = "images/info/2.png"
			break;
			
			case 3:
			document.getElementById("image3").src = "images/info/3.png"
			break;
			
			case 4:
			document.getElementById("image4").src = "images/info/4.png"
			break;
			
			case 5:
			document.getElementById("image5").src = "images/info/5.png"
			break;
			
			case 6:
			document.getElementById("image6").src = "images/info/6.png"
			break;
			
			case 7:
			document.getElementById("image7").src = "images/info/7.png"
			break;
			
			case 8:
			document.getElementById("image8").src = "images/info/8.png"
			break;
			
			case 9:
			document.getElementById("image9").src = "images/info/9.png"
			break;
			
			case 10:
			document.getElementById("image10").src = "images/info/10.png"
			break;
			
			case 11:
			document.getElementById("image11").src = "images/info/11.png"
			break;
			
			case 12:
			document.getElementById("image12").src = "images/info/12.png"
			break;
			
		}
	}
	
	function restoreImages(x) {
			switch (x) {
			case 1: 
			document.getElementById("image1").src = "images/product/1.png";
			break;
			
			case 2:
			document.getElementById("image2").src = "images/product/2.png"
			break;
			
			case 3:
			document.getElementById("image3").src = "images/product/3.png"
			break;
			
			case 4:
			document.getElementById("image4").src = "images/product/4.png"
			break;
			
			case 5:
			document.getElementById("image5").src = "images/product/5.png"
			break;
			
			case 6:
			document.getElementById("image6").src = "images/product/6.png"
			break;
			
			case 7:
			document.getElementById("image7").src = "images/product/7.png"
			break;
			
			case 8:
			document.getElementById("image8").src = "images/product/8.png"
			break;
			
			case 9:
			document.getElementById("image9").src = "images/product/9.png"
			break;
			
			case 10:
			document.getElementById("image10").src = "images/product/10.png"
			break;
			
			case 11:
			document.getElementById("image11").src = "images/product/11.png"
			break;
			
			case 12:
			document.getElementById("image12").src = "images/product/12.png"
			break;
		}
	}
	/*method 2
	Is currently not in use, but if the two functions below are combined it will hopefully half the number of lines 
required in method 1	
	*/
	function swapImages2(ID) {
        document.getElementById(ID).src = document.getElementById(ID).src.replace("product", "info");
     //   alert(document.getElementById(ID).src);
		};
		

    function restoreImages2(ID) {
		  document.getElementById(ID).src = document.getElementById(ID).src.replace('info', 'product');
       // alert(document.getElementById(ID).src);
}