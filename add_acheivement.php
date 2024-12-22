<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Achievement</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Add New Achievement</h1>
    </header>

    <main>
        <form action="upload_image.php" method="post" enctype="multipart/form-data">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
            <label for="description">Description:</label>
            <textarea id="description" name="description"></textarea>
            <label for="image">Upload Image:</label>
            <input type="file" id="image" name="image">
            <button type="submit" name="submit">Add Achievement</button>
        </form>
    </main>
</body>
</html>
