$(document).ready(function(){
     $(".submitProduct").submit(function(e){
		 e.preventDefault();
		 var url = $(this).attr("action");
		 var data = $(this).serialize();
		 console.log(data);
         $.ajax({
            url: url,
            type: 'POST',
            data: data,
            dataType: 'JSON',
            success: function (data) { 
				swal({
				  type: 'success',
				  text: data.message,
				  timer: 3000
				})
				setTimeout(function(){
					location.reload();
				},3000);
			},
			error : function(xhr) {
				var data = $.parseJSON(xhr.responseText);
				var errors = data.errors; 
				var html = "<ul>";
				$.each(errors, function(key, val) {
					$("."+key+"").addClass("error");
					$.each(this, function(key, val) {
						
						html = html + "<li>"+val+"</li>"
					});
				});				
				html = html + "</ul>";
				swal({
				  type: 'error',
				  html: html,
				  timer: 3000
				})			
			} 
         }); 
     }); 
}); 