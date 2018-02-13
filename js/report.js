$(document).ready(function(){
load_table();
load_SECRETEERIAT();
load_LEVY();
	//insert into staff_master
	$(document).on("submit","#report_form",function(e){
		e.preventDefault();
		var note=document.getElementById('note').value;
	
		$.ajax({
			
			type:"post",
			url:"ajax/report_data.php",
			data:{'note':note},
			success:function(data)
			{
					//alert(data);
				$('#msg').fadeIn('slow',function(){
				$('#msg').html(data);
				$('#msg').delay(1000).fadeOut();
				})		
				//$().toastmessage('showSuccessToast',data);
				clear_form();
				load_table();
				load_SECRETEERIAT();
				load_LEVY();
			}
		});
		
	});
})
function clear_form()
{
	$('#note').val('');
	
}
function load_table()
{
	var dl='all';
		$.ajax({ 
				type: "POST",
				url:"ajax/report_data.php",
				data:{'dl':dl},
				success: function(data)
				{
					//alert("gsdfgpjn");
					$("#t_body").html(data);	
					 
				}
		});
}
function load_SECRETEERIAT()
{
	var sec='all';
		$.ajax({ 
				type: "POST",
				url:"ajax/report_data.php",
				data:{'sec':sec},
				success: function(data)
				{
					
					$("#t_body1").html(data);	
					
				}
		});
}
function load_LEVY()
{
	var levy='all';
		$.ajax({ 
				type: "POST",
				url:"ajax/report_data.php",
				data:{'levy':levy},
				success: function(data)
				{
					
					$("#t_body2").html(data);	
					
				}
		});
}