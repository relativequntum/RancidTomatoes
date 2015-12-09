

function addMovieClick () {
	window.location = "addMovieView.php";
}



function checkReviewForm()
{
   

   var review = document.getElementById("review");

   if(!review.value.trim())
   {

   	  document.getElementById("notice").innerHTML = "review can't be empty";
   	  return false;
   }else{

   	  var reviewForm = document.getElementById("addReviewForm");
   	  reviewForm.submit();
   }

}

function backHome()
{
	window.location = "index.html";

	return false;
}



function ajax_get(){
   
    var request = new XMLHttpRequest();
    
    var url = "showSearchResults.php";
    var title = document.getElementById("title").value;
    var parameters = "title="+title;
    request.open("GET", url+"?"+parameters, true);
  
    request.onreadystatechange = function() {
	    if(request.readyState == 4 && request.status == 200) {
		    var return_data = request.responseText;


			document.getElementById("results").innerHTML = return_data;
	    }
    }
   
    request.send(parameters); 

    return false;
}



















