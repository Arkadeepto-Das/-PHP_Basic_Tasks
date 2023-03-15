<?php

  /**
   * Connect to the database and send query to the database.
   * 
   * @method connect()
   *  Connect to the database.
   * @method add()
   *  Add data into the table.
   * @method select()
   *  Select column and fetch data from the database.
   * @method saveTask()
   *  Save the task number of the last task visted.
   * @method selectTask()
   *  Select the task number.
   * @method resetPassword()
   *  Reset the password.
   */

  class SendQuery {

    /**
     * Connect to the database.
     * 
     * @property string $serverName
     *  Store the server name.
     * @property string $userName
     *  Store username.
     * @property string $password
     *  Store the password.
     * @property string $dbName
     *  Store the name of the database.
     * 
     * @return mysqli object
     *  Return mysqli object after connecting to database.
     */

    public static function connect() {

      /**
       * Store the server name.
       * @var string $serverName
       */
      $serverName = "localhost";

      /**
       * Store the username.
       * @var string $userName
       */
      $userName = "root";

      /**
       * Store the password.
       * @var string $password
       */
      $password = "Arka270601das#";

      /**
       * Store the database name.
       * @var string $dbName
       */
      $dbName = "Account_Details";

      // Create connection.
      $conn = new mysqli($serverName, $userName, $password, $dbName);
      // Check connection.
      if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      else {
        return $conn;
      }

    }

    /**
     * Insert username, password and task number to the table.
     * 
     * @param string $userName
     *  Store the username.
     * 
     * @param string $password
     *  Store the password.
     * 
     * @return void
     */

    public static function add(string $userName, string $password) {
      
      $conn = self::connect();
      $data = "INSERT INTO Profiles (Username, Password, TaskNum)
      VALUES ('$userName', '$password', NULL)";

      if($conn->query($data) === FALSE) {
        echo "Error" . $data . "<br>" . $conn->error;
      }

      $conn->close();
      
    }

    /**
     * Select the data from the table.
     * 
     * @param string $userName
     *  Store the username if passed or else stores NULL by default.
     * @param string $password
     *  Store the password if passed or else stores NULL by default.
     * 
     * @property string $data
     *  Store the query.
     * 
     * @return mixed
     *  Return query result if exists or else returns NULL.
     */

    public function select(string $userName = NULL, string $password = NULL) {

      $conn = self::connect();
      $data = "";

      if($password === NULL) {
        $data = "SELECT Username FROM Profiles WHERE Username = '$userName'";
      }

      else {
        $data = "SELECT Username, Password FROM Profiles WHERE Username = '$userName' AND Password = '$password'";
      }

      $result = $conn->query($data);
      
      if($result) {

        if(mysqli_num_rows($result) > 0) {
          return $result;
        }

        else {
          return NULL;
        }

      }

      $conn->close();

    }

    /**
     * Save the task number.
     * 
     * @param string $userName
     *  Store the username.
     * @param int $tasknum
     *  Store the task number.
     * 
     * @return void
     */

    public static function saveTask(string $userName, int $tasknum) {

      $conn = self::connect();
      $data = "UPDATE Profiles SET TaskNum = '$tasknum' WHERE Username = '$userName'";

      if($conn->query($data) === FALSE) {
        echo "Error updating record: " . $conn->error;
      }

      $conn->close();

    }

    /**
     * Select task number from the table for that username.
     * 
     * @param string $userName
     *  Store the username.
     * 
     * @return mysqli object
     *  Return the result set if it exists.
     */

    public function selectTask(string $userName) {

      $conn = self::connect();
      $data = "SELECT TaskNum FROM Profiles WHERE Username = '$userName'";

      $result = $conn->query($data);

      if($result) {

        if(mysqli_num_rows($result) > 0) {
          return $result;
        }

      }

      $conn->close();

    }

    /**
     * Reset password of the user.
     * 
     * @param string $userName
     *  Store the username.
     * @param string $newPassword
     *  Store the new password given by the user.
     * 
     * @return void
     */

    public function resetPassword(string $userName, string $newPassword) {

      $conn = self::connect();
      $data = "UPDATE Profiles SET Password = '$newPassword' WHERE Username = '$userName'";

      if($conn->query($data) === FALSE) {
        echo "Error resetting password: " . $conn->error;
      }

      $conn->close();

    }

  }

?>