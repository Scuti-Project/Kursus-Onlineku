<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>jQuery File Upload Example</title>
</head>
<body>
	<form action="{{ route('materi.handleUpload') }}" method="post" enctype="multipart/form-data">
		@csrf
		Product name:
		<br>
		<input type="text" name="name">
		<br><br>
		Product photos (can add more than one):
		<br>
		<input type="file" id="fileupload" name="video" data-url="{{ route('materi.handleUpload') }}">
		<br>
		<div id="files_list"></div>
		<p id="loading"></p>
		<input type="hidden" name="file_ids" id="file_ids" value="">
		<input type="submit" value="Upload">
	</form>
	@error('video')
		{{ $message }}
	@enderror
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="{{ asset('vendor/jquery-file-upload/vendor/jquery.ui.widget.js') }}"></script>
<script src="{{ asset('vendor/jquery-file-upload/jquery.iframe-transport.js') }}"></script>
<script src="{{ asset('vendor/jquery-file-upload/jquery.fileupload.js') }}"></script>
<script>
$(function () {
    // $("#btn").click(function() {
    	$('#fileupload').fileupload({
    		dataType: 'json',
    		add: function (e, data) {
    			$('#loading').text('Uploading...');
    			data.submit();
    		},
    		done: function (e, data) {
    			if (data.result.status == 'success') {
    				$('#loading').text('');
    			}
    		}
    	});
    // })
});
</script>
</body> 
</html>