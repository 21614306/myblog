<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="create_cates" method="post" enctype="multipart/form-data">
	<input type="file" name="photo">
	英文名：
	<input type="text" name="to">
	中文名：
	<input type="text" name="catename">
	<input type="submit" value="提交">
	{{csrf_field()}}
</form>
</body>
</html>