 <?php
	// Quotes Enhanced: a Dynamic Website on the same order of magnitude
	// as a final project, except there is no Ajax in this example.
	//
	// Author: Rick Mercer and Hassanain Jamal
	//
	class DatabaseAdaptor {
		// The instance variable used in every one of the functions in class DatbaseAdaptor
		private $DB;
		// Make a connection to an existing data based named 'quotes' that has
		// table quote. In this assignment you will also need a new table named 'users'
		public function __construct() {
			$db = 'mysql:dbname=movie;host=localhost';
			$user = 'root';
			$password = '';
			
			try {
				$this->DB = new PDO ( $db, $user, $password );
				$this->DB->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			} catch ( PDOException $e ) {
				echo ('Error establishing Connection');
				exit ();
			}
		}
		
		// Return all quote records as an associative array.
		// Example code to show id and flagged columns of all records:
		// $myDatabaseFunctions = new DatabaseAdaptor();
		// $array = $myDatabaseFunctions->getQuotesAsArray();
		// foreach($array as $record) {
		// echo $record['id'] . ' ' . $record['flagged'] . PHP_EOL;
		// }
		//
		public function getQuotesAsArray() {
			// possible values of flagged are 't', 'f';
			$stmt = $this->DB->prepare ( "SELECT * FROM quote WHERE flagged='f' ORDER BY rating DESC, added" );
			$stmt->execute ();
			return $stmt->fetchAll ( PDO::FETCH_ASSOC );
		}
		
		// Insert a new quote into the database
		public function addNewQuote($quote, $author) {
			$stmt = $this->DB->prepare ( "INSERT INTO quote (added, quote, author, rating, flagged ) values(now(), :quote, :author, 0, 'f')" );
			$stmt->bindParam ( 'quote', $quote );
			$stmt->bindParam ( 'author', $author );
			$stmt->execute ();
		}
		

		


		
		
		// Used for testing only so far on 9-Nov-2015
		public function removeAllDuckTypedRecords() {
			$stmt = $this->DB->prepare ( "DELETE FROM users WHERE username LIKE '%duckTyped%'" );
			$stmt->execute ();
		}

		
		// Add a new user with the given $username and the plain text $password, that will be used in the
		// PHP function password_hash. Before you register new users, you will need this table added to your
		// data base. Run this in mysql (MariaDB) from the command line after the sql command USE quotes:
		//
		// CREATE TABLE users (
		// id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		// username varchar(64) NOT NULL default '',
		// hash varchar(255) NOT NULL default ''
		// );
		//
		// precondition: $username is unique. Change this for the final project, but not now
		public function register($username, $password) {
			$hash = password_hash ( $password, PASSWORD_DEFAULT );
			$sth = $this->DB->prepare ( "INSERT INTO users (username, hash) VALUES ( :username, :hash);" );
			$sth->bindParam ( ':username', $username );
			$sth->bindParam ( ':hash', $hash );
			$sth->execute ();
		}
		
		// Return TRUE if the given $username has a plain text $password that works with
		// the hash value stored for that user. You need the PHP function password_verify
		// to do this.
		public function verified($username, $password) {
			$stmt = $this->DB->prepare ( 'SELECT hash FROM users WHERE username = :username' );
			$stmt->bindParam ( ':username', $username );
			$stmt->execute ();
			$user = $stmt->fetch ();
			
			// Hashing the password with its hash as the salt returns the same hash
			if (password_verify ( $password, $user ['hash'] ))
				return TRUE;
			else
				return FALSE;
			
			$currentRecord = $stmt->fetch ();
			return $currentRecord ['flagged'] === 't';
		}
		
		// Return TRUE if the given $username has mot been taken in the database
		public function canRegister($username) {
			$stmt = $this->DB->prepare ( 'SELECT * FROM users WHERE username = :username' );
			$stmt->bindParam ( ':username', $username );
			$stmt->execute ();
			$stmt->fetch ();
			
			// Hashing the password with its hash as the salt returns the same hash
			if ($stmt->rowCount () === 0)
				return TRUE;
			else
				return FALSE;
		}
	} // end class DatabaseAdaptor
	
	$myDatabaseFunctions = new DatabaseAdaptor ();
	
	// Test code can only be used temporaily here. If kept, deleting account 'fourth' from anywhere would 
	// cause these asserts to generate error messages. And when did you find out 'fourth' is registered?
	// assert ( $myDatabaseFunctions->verified ( 'fourth', '4444' ) );
	// assert ( ! $myDatabaseFunctions->canRegister ( 'fourth' ) );
	?>