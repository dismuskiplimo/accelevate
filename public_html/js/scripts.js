$(document).ready(function(){
	$('.profile-picture').on('click', function(e){
		$('.image-file').click();
	});	

	$('.image-file').on('change', function(){
		$('.image-form').submit();
	});


	$('.cover-picture').on('click', function(e){
		$('.cover-file').click();
	});	

	$('.cover-file').on('change', function(){
		$('.cover-form').submit();
	});


	$('.buttons').on('click', '.browse-file-button' , function(e){
		e.preventDefault();
		
		var that = $(this);

		that.siblings('input[type=file]')[0].click();
	});

	$('.buttons').on('click', '.add-file-button' , function(){
		var button = 
			'<div class="button-wrapper file-button">' +
                '<div class="row">' +
                    '<div class="col-xs-4">' +
                        '<button class="btn btn-info browse-file-button" type="button"><i class = "fa fa-folder"></i> Browse</button>' +

                        '<input type="file" name="images[]" class="file-input hidden" accept="image/*">' +
                    '</div>' +
                    '<div class="col-xs-7">' +
                        '<p class="file-label">No File Selected</p>' +
                    '</div>' +
                    '<div class="col-xs-1 text-right"><i class="fa fa-times remove-file"></i></div>' +
                '</div>' +
            '</div>';
		$('.file-button:last').after(button);
	});

	$('.buttons').on('click','.remove-file', function(){
		$(this).closest('.button-wrapper').remove();
	});

	$('.buttons').on('change','.file-input', function(){
		var that = $(this);

		var file = that.val();

		that.closest('.row').find('.file-label').text(file.match(/[-_\w]+[.][\w]+$/i)[0]);

	});

	$('.datepicker').datepicker({
		format: 'yyyy-mm-dd',
	});
});