<html>
    <head>

       <link href="mymovie.css" type="text/css" rel="stylesheet" />

        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">

        <script src="mymovie.js"></script>
       
        <title>Search the Database</title>

        <meta charset="UTF-8">
    </head>
 
    <body>


    <form id="addReviewForm" action="addReview.php" method="post" class="pure-form pure-form-aligned">

      <fieldset>
        
        <div class="pure-control-group">
            <label for="movieTitle">movie title</label>
            <input id="movieTitle" type="text" name="movieTitle" value="<?php echo $_GET['title'];?>"/>
        </div>

        <div class="pure-control-group">
            <label for="reviewerName">reviewer name</label>
            <input id="reviewerName" type="text" name="reviewerName" />
        </div>

        <div class="pure-control-group">
            <label for="review">review</label>
            <!-- <input id="review" type="textarea" name="review" /> -->
            <textarea id="review" class="pure-input-1-2" placeholder="add your review" name="review"></textarea>
        </div>

        <div class="pure-controls">
          
            <button type="submit" class="pure-button pure-button-primary" onclick="return checkReviewForm()">Submit</button>

             <button type="submit" class="pure-button pure-button-primary" onclick="return backHome()">Cancel</button>
        </div>

    </fieldset>
 

    </form>

    <p id="notice"></p>
 
    </body>
</html>