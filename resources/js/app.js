$(function(){
	 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

	$('.todo-check').on('change', function(){
		var todo_id = $(this).attr('data-id');
		$.ajax({
            type:'POST',
            url:'/switch',
            data:{id: todo_id},
            success: function(data) {
            	alert(data.message);
            }
        });
	});
});