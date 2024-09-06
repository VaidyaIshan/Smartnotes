<html>
<head>
  
<link rel="stylesheet" href="css/pdf.css">
	</head>
<body>
	 <div class="mainbox">
	 	<h1 class="maintitle1">UPLOAD NOTES</h1>
	<form action="upload.php" method="post" enctype="multipart/form-data" class='woo'>
	 <label for="class" >GRADE:</label>
  <select name="grade" id="grade">
    <option value="11" class='blue'>11</option>
    <option value="12">12</option>
  </select>
  <br><br>
  <label for="class">Subject:</label>
  <select name="subject" id="subject">
    <option value="Physics">Physics</option>
    <option value="Chemistry">Chemistry</option>
    <option value="Mathematics">Mathematics</option>
  </select><br><br>
    <label for="pdf-file">Select PDF file:</label>
    <input type="file" class='oo' id="pdf-file" name="pdf-file" accept=".pdf" required><br><br>
    <label for="filename">File name:</label>
    <input type="text" class="filename" name="filename" pattern="[a-zA-Z0-9_-]+\.pdf" required><br><br>
     <input type="text" class="description" name="description" placeholder="DESCRIPTION" name='description' required><br><br>
    <input type="submit" name="submit" class='UPLOAD' value="Upload PDF" >
</form>
</div>
</body>
</html>
