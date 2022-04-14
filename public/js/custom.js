$(function() {

	$(document).ready(function() {
		$(".datatables").DataTable();

		$(function() {
			$('[data-toggle="tooltip"]').tooltip();
		});

		$(".modal").on('shown.bs.modal', function() {
			$(".modal form").find('input:eq(1)').focus()
		});
	})
})