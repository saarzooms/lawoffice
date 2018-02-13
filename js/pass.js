$(document).ready(function() {
	
	$(document).on("click","#btn_sub",function(){	
	
		    var old_pass = document.getElementById('old').value;
		    var new_pass = document.getElementById('new').value;
			var con_pass = document.getElementById('con').value;
			
			var i=0;
				
				if(old_pass =='')
				{
					 i=1;
					$('#o').html("Please enter old password !!!");
				}
				if(new_pass =='')
				{
					 i=1;
					$('#n').html("Please enter new password !!!");
				}
				if(con_pass =='')
				{
					 i=1;
					$('#co').html("Please enter confirm password !!!");
				}
				
				if(i==0)
				   {
					$.ajax({ 
							type: "POST",
							url: "ajax/password.php?old_pass="+old_pass+"&new_pass="+new_pass,
							success: function(data)
							{
								
								$("#old").val('');	
								$("#new").val('');	
							    $("#con").val('');
								$('#msg').html(data);
							}
					});
				   }
	});

});

function checkoldpass()
		{
			
							var old = document.getElementById('old').value;
										
							$.ajax({ 
							type: "POST",
							url: "ajax/password.php?old="+old,
							success: function(data)
							{
								
								$('#o').html(data);
								$('#old').html(data);
												
							}
						});	
		}
		
		function checkpass()
		{
			
			var new_pass = document.getElementById('new').value;
			var con_pass = document.getElementById('con').value;
			
			if(new_pass == con_pass)
			{
				$('#co').html('');
			}
			else
			{
				$('#co').html('confirm password do not match !!!');
				$('#con').val('');
			}							
							
		}