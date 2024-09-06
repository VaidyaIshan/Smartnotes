<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell Your Books</title>
    <link rel="stylesheet" href="css/sell.css">
</head>
<body>
    <section class="mainbox">
        <h1 class="maintitle">Sell Your Books</h1>
        <form action="uploadbooks.php" method="post" enctype="multipart/form-data">
            <label for="bookname">Book Name:</label>
            <input type="text" id="bookname" name="bookname" required class='name'>
            <br><br>
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" required class='name'>
            <br><br>
            <label for="contact">Contact:</label>
            <input type="text" id="contact" name="contact" required class='name'>
            <br><br>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>
            
            <br><br>
            <input type="submit" name="submit" value="POST FOR SALE" class='sell'>
        </form>
    </section>
</body>
</html>