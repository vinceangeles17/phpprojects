<html>

<body>
<style>
   div {
  width: 300px;
  margin: auto;
  background-color: #FFF4A3;
}
</style>
<div>
Name: <?php echo $_POST["name"]; ?><br>
Gender: <?php echo $_POST["Gender"]; ?><br>
Course: <?php echo $_POST["Course"]; ?><br>
Color: Yellow <br>
Organizations: 
<?php 
if (isset($_POST["org"])) {
    echo (implode(", ", $_POST["org"]));
} else {
    echo "None selected.";
}
?><br>
Comments: <?php echo $_POST["Comment"]; ?><br>
Tuition Fee: 20,000 <br>
Org fee: 300 <br>
Total 20,300 <br>
</div>
</body>
</html>