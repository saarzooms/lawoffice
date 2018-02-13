$(document).ready(function(){
	$("#btn_insert").removeAttr('disabled');
	$("#btn_update").attr('disabled','disabled');
clear_form();
load_table();

	//insert into staff_master
	$(document).on("submit","#staff_form",function(e){
		e.preventDefault();
		var dept=document.getElementById('dept').value;
		var empname=document.getElementById('empname').value;
		var empsurname=document.getElementById('empsurname').value;
		var email=document.getElementById('email').value;
		var password=document.getElementById('password').value;
		var mobile=document.getElementById('mobile').value;
		var status=document.getElementById('status').value;
		var empdt=document.getElementById('empdt').value;
		var terdt=document.getElementById('terdt').value;
		var note=document.getElementById('note').value;
		
							
							
							//$("#update_party").val(party_edit_id);
		//alert(dept);
		$.ajax({
			
			type:"post",
			url:"ajax/staff_data.php",
			data:{'dept':dept,'empname':empname,'empsurname':empsurname,'email':email,'password':password,'mobile':mobile,'status':status,'empdt':empdt,'terdt':terdt,'note':note},
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
			}
		});
		
	});
	
	//update into staff_master
	$(document).on("click","#btn_update",function(e){
		e.preventDefault();
		
		var id=document.getElementById('btn_update').value;
			
		if(id!='0')
		{
			var dept=document.getElementById('dept').value;
			var empname=document.getElementById('empname').value;
			var empsurname=document.getElementById('empsurname').value;
			var email=document.getElementById('email').value;
			var password=document.getElementById('password').value;
			var mobile=document.getElementById('mobile').value;
			var status=document.getElementById('status').value;
			var empdt=document.getElementById('empdt').value;
			var terdt=document.getElementById('terdt').value;
			var note=document.getElementById('note').value;	
			//alert(dept);
			$.ajax({
			
			type:"post",
			url:"ajax/staff_data.php",
			data:{'update_id1':id,'dept1':dept,'empname1':empname,'empsurname1':empsurname,'email1':email,'password1':password,'mobile1':mobile,'status1':status,'empdt1':empdt,'terdt1':terdt,'note1':note},
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
				$("#btn_update").val('0');
				$("#btn_insert").removeAttr('disabled');
				$("#btn_update").attr('disabled','disabled');	
			}
		});	
		}			
							
							//$("#update_party").val(party_edit_id);
		
		
	});
	//edit staff data
	$(document).on("click","#btn_view",function(e){
		e.preventDefault();
		var edit_id=$(this).attr('value');
		$.ajax({
			
				type:"post",
				url:"ajax/staff_data.php",
				data:{'edit_id':edit_id},
				success:function(data)
				{
					//alert(data);
					var arr=eval(data);
					
						
					$("#dept").val(arr[0]);
					$("#empname").val(arr[1]);
					$("#empsurname").val(arr[2]);
					$("#email").val(arr[3]);
					$("#password").val(arr[4]);
					$("#mobile").val(arr[5]);
					$("#status").val(arr[6]);
					$("#empdt").val(arr[7]);
					$("#terdt").val(arr[8]);
					$("#note").val(arr[9]);		
					$("#btn_update").val(arr[10]);		
				
					$("#btn_update").removeAttr('disabled');
					$("#btn_insert").attr('disabled','disabled');
				}
			});
		
	});
	//delete data from staff_master
	$(document).on("click","#btn_delete",function(e){
		e.preventDefault();
		if(confirm('Are you sure to delete it?'))
		{
			var del_id = $(this).attr('value');
			//alert(del_id);
			$.ajax({
			
				type:"post",
				url:"ajax/staff_data.php",
				data:{'del_id':del_id},
				success:function(data)
				{
					load_table();
					$('#msg').fadeIn('slow',function(){
					$('#msg').html(data);
					$('#msg').delay(1000).fadeOut();
				})	
					//$().toastmessage('showSuccessToast',data);
				}
			});
		}
	});	
	
});

function clear_form()
{
	$('#dept').val(0);
	$('#empname').val('');
	$('#empsurname').val('');
	$('#email').val('');
	$('#password').val('');
	$('#mobile').val('');
	$('#status').val('');
	$('#empdt').val('');
	$('#terdt').val('');
	$('#note').val('');
}

function load_table()
{
	var dl='all';
		$.ajax({ 
				type: "POST",
				url:"ajax/staff_data.php",
				data:{'dl':dl},
				success: function(data)
				{
					//alert("gsdfgpjn");
					$("#t_body").html(data);	
					$('#example').DataTable({scrollX: true});
					
				}
		});
}