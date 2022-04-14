<html>
<head>
<title>Page Title</title>
<meta name="description" content="Description">
<meta name="keywords" content="Keyword1, Keyword2">
</head>
<body>
	<form enctype="multipart/form-data" action="{{ route('materi.handleUpload') }}" method="POST">
		@csrf
		<input type="file" name="video">
		<button>Simpan</button>
	</form>
</body>
</html>