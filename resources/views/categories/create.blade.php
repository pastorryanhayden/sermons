<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add A Category</title>
</head>
<body>
	<form action="/requestcategories" method="POST">
		@csrf 
		<input type="text" name="title">
		<button type="submit">Add The Category</button>
	</form>
</body>
</html>