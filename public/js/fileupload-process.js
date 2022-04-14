// AJAX Video Upload
$('#video-upload').fileupload({
	dataType: 'json',
	add: function (e, data) {
		$("#upload-video-label").text(data.files[0].name)
		$("#container-upload-btn").html('')
		data.context = $('<a href="javascript:void(0)" style="z-index: 99999" class="btn btn-warning" id="upload-video-btn"><i class="fas fa-upload mr-2"></i>Upload</a>').appendTo($('#container-upload-btn')).click(function() {
			const acceptedFileTypes = /h264|mp4|mpv|mpeg|ogg|quicktime|webm|avi/i;
			var fileType = data.files[0].type
			console.log(fileType)
			if (!fileType.match(acceptedFileTypes)) {
				alert('Format file salah, file yang didukung: .h264, .mp4, .mpv, .mpeg, .ogg, .mov, .webm, .avi.')
			} else if (data.files[0].size > 7864320) {
				alert('File terlalu besar, ukuran maksimum 7.5 MB')
			} else {
				if (confirm('Anda yakin ingin mengupload file ini?')) {
					let judul = $("input[name='judul_materi']").val()
					if (judul) {
						data.submit()
						$(".progress").removeClass('d-none')
					} else {
						alert('Harap isi judul terlebih dahulu')
						$("input[name='judul_materi']").focus()
					}
				}
			}
		})
	},
	progressall: function (e, data) {
		var progress = parseInt(data.loaded / data.total * 100, 10)
		$(".progress-bar").css('width', progress + '%')
	},
	done: function (e, data) {
		if (data.result.status == 'success') {
			$(".progress").addClass('d-none')
			$(".alert-success").removeClass('d-none')

			let filename = data.result.filename
			$("input[name='filename']").val(filename)
			$("#upload-form").submit()
		} else {
			$(".progress").addClass('d-none')
			$(".alert-danger").removeClass('d-none')
		}
	},
	fail: function (e, data) {
		console.log(data.errorThrown)
	}
});