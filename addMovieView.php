<html>
    <head>

        <link href="movie.css" type="text/css" rel="stylesheet" />
       
        <title>Search the Database</title>

        <meta charset="UTF-8">
    </head>
 
    <body>


    <form action="addMovie.php" method="post" class="pure-form pure-form-aligned">

      <fieldset>
        
        <div class="pure-control-group">
            <label for="title">title</label>
            <input id="title" type="text" name="title">

            </input>
        </div>

        <div class="pure-control-group">
            <label for="director">director</label>
            <input id="director" type="text" name="director" />
        </div>

        <div class="pure-control-group">
            <label for="rating">rating</label>
            
            <select id="rating" name="rating">
					<option value="G">G</option>
					<option value="PG">PG</option>
					<option value="R">R</option>
				</select>
        </div>

         <div class="pure-control-group">
            <label for="year">year</label>
            <input id="year" type="text" name="year" />
        </div>

        <div class="pure-control-group">
            <label for="length">minutes</label>
            <input id="length" type="text" name="length" />
        </div>

        <div class="pure-control-group">
            <label for="boxOffice">boxOffice</label>
            <input id="boxOffice" type="text" name="boxOffice">
        </div>

        
        <div class="pure-controls">
          
            <button type="submit" class="pure-button pure-button-primary">Submit</button>
        </div>
    </fieldset>
 


     <!-- edition: <input type="text" name="number" /><br />


     title: <input type="text" name="english_title" /><br />
     director: <input type="text" name="english_director" /><br />
     year: <input type="text" name="year" /><br />
     country: <input type="text" name="english_country" /><br />
     

    <input type="submit" name="submit" value="Submit" /> -->
    </form>
 
    </body>
</html>