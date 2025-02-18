<!DOCTYPE html>
<html>
<style>
    div {
  width: 300px;
  margin: auto;
  background-color: #FFF4A3;
}
</style>
<body>
 
<h2>Enrollment Form</h2>
<div>
<form action="b.php" method="POST">
  <label for="name">Name:</label>
  <input type="text" id="name" name="name" value=""><br>
  
  <label for="Gender">Gender:</label>
  <input type="radio" id="Female" name="Gender" value="Female">
  <label for="Female">Female</label>
  <input type="radio" id="Male" name="Gender" value="Male">
  <label for="Male">Male</label><br>
  
  <label for="Organization">Organization(s):</label>
  <input type="checkbox" id="org1" name="org[]" value="CCS">
  <label for="org1"> CCS</label>
  <input type="checkbox" id="org2" name="org[]" value="SSC">
  <label for="org2"> SSC</label>
  <input type="checkbox" id="org3" name="org[]" value="English">
  <label for="org3"> English</label><br>
  
  <label for="Course">Course:</label>
  <select name="Course" id="Course">
    <option value="BWSIT">BWSIT</option>
    <option value="BAC">BAC</option>
    <option value="CRIM">CRIM</option>
    <option value="CRIMINAL">CRIMINAL</option>
  </select><br>
  
  <label for="Comment">Comment:</label> <br>
  <textarea id="Comment" name="Comment" rows="4" cols="20">
   comment here
  </textarea>
  <br>
  
  <input type="submit">
</form> 
</div>

</body>
</html>