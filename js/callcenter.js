$(document).ready(function(){
	load_all_tables();
	$(document).on("change","#opt",function(e){
		$('#payment_table').hide();
		clear_payment_form();
		var id=document.getElementById('opt').value;
		//alert(id);
		if(id==0)
		{
			$('#payment_table').hide();
		}
		else if(id==1){
			$('#customer_called_form').show();
			$('#report_form').hide();
			$('#payment_form').hide();
		}
		else if(id==2){
			$('#report_form').show();
			$('#customer_called_form').hide();
			$('#payment_form').hide();
		}
		else if(id==3){
			$('#payment_form').show();
			$('#report_form').hide();
			$('#customer_called_form').hide();
			$('#payment_table').show();
			clear_payment_form();
			
		}
	});
	//
	$(document).on("blur","#ins_no",function(e){
		e.preventDefault();
		var ins_no1=document.getElementById('ins_no').value;
		
		load_payment_table(ins_no1);
		$('#search_no').html(ins_no1);
		
	});
	//insert into report_master
	$(document).on("submit","#report_form",function(e){
		e.preventDefault();
		var note=document.getElementById('note').value;
	
		$.ajax({
			
			type:"post",
			url:"ajax/report_data.php",
			data:{'note':note},
			success:function(data)
			{
					alert(data);
				$('#msg').fadeIn('slow',function(){
				$('#msg').html(data);
				$('#msg').delay(1000).fadeOut();
				})		
				//$().toastmessage('showSuccessToast',data);
				clear_form();
				$('#report_form').hide();
				$('#opt').val(0);
				load_all_tables();
			}
		});
		
	});
	
	//insert into how-many-customers-were-called
	$(document).on("submit","#customer_called_form",function(e){
		e.preventDefault();
		var custno=document.getElementById('custno').value;
		var note1=document.getElementById('note1').value;
	
		$.ajax({
			
			type:"post",
			url:"ajax/report_data.php",
			data:{'custno':custno,'note1':note1},
			success:function(data)
			{
					//alert(data);
				$('#msg').fadeIn('slow',function(){
				$('#msg').html(data);
				$('#msg').delay(1000).fadeOut();
				})		
				//$().toastmessage('showSuccessToast',data);
				clear_form();
				$('#customer_called_form').hide();
				$('#opt').val(0);
				load_all_tables();
			}
		});
		
	});
	
	//insert into payment master
	$(document).on("submit","#payment_form",function(e){
		e.preventDefault();
		var ins_no=document.getElementById('ins_no').value;
		var t_payment=document.getElementById('t_payment').value;
		var money_rec=document.getElementById('money_rec').value;
		var deadline=document.getElementById('deadline').value;
		var status=document.getElementById('status').value;
		//var date3=document.getElementById('date3').value;
		var note_pay=document.getElementById('note_pay').value;
		
	
		$.ajax({
			
			type:"post",
			url:"ajax/report_data.php",
			data:{'ins_no':ins_no,'t_payment':t_payment,'money_rec':money_rec,'deadline':deadline,'status':status,'note_pay':note_pay},
			success:function(data)
			{
					//alert(data);
				$('#msg').fadeIn('slow',function(){
				$('#msg').html(data);
				$('#msg').delay(1000).fadeOut();
				})		
				//$().toastmessage('showSuccessToast',data);
				clear_payment_form();
				//$('#payment_form').hide();
				$('#opt').val(0);
				load_payment_table(ins_no);
				load_all_tables();
			}
		});
		
	});
})
function clear_form()
{
	$('#note').val('');
	$('#custno').val('');
	$('#note1').val('');
	
}

function load_all_tables()
{
	var rep1='all';
	
	$.ajax({
			
			type:"post",
			url:"ajax/report_data.php",
			data:{'rep0':rep1},
			success:function(data)
			{
				$("#rep0_body").html(data);
				
			//alert(data);

			}
		});
	$.ajax({
			
			type:"post",
			url:"ajax/report_data.php",
			data:{'rep1':rep1},
			success:function(data)
			{
				$("#rep_body").html(data);
				
			//alert(data);
				// $('#msg').fadeIn('slow',function(){
				// $('#msg').html(data);
				// $('#msg').delay(1000).fadeOut();
				// })		
				//$().toastmessage('showSuccessToast',data);
				// clear_form();
				// $('#report_form').hide();
				// $('#opt').val(0);
			}
		});
		
	$.ajax({
			
			type:"post",
			url:"ajax/report_data.php",
			data:{'rep2':rep1},
			success:function(data)
			{
				$("#rep2_body").html(data);
				
			//alert(data);

			}
		});
		
		$.ajax({
			
			type:"post",
			url:"ajax/report_data.php",
			data:{'rep3':rep1},
			success:function(data)
			{
				$("#rep3_body").html(data);
				
			//alert(data);
			
			}
		});	
}
function load_payment_table(no)
{
	var ins_no1=no;
		$.ajax({
			
			type:"post",
			url:"ajax/report_data.php",
			data:{'ins_no1':ins_no1},
			success:function(data)
			{
				if(data==0)
				{
					$('#search_no').html('');
					$('#ins_name').val('');
					$('#msg_ins').html('Institution Number Does Not Exist !!!, Please Enter From Institution Master');
				}
				else
				{
					$('#search_no').html(ins_no1);
					$('#msg_ins').html('');
					$("#t_body").html(data);
					$("#payment_table").show();
					var inst_nm = $('#example').find("td").eq(2).html(); 
					$('#ins_name').val(inst_nm);	
				}					
								
					// alert(data);
				// $('#msg').fadeIn('slow',function(){
				// $('#msg').html(data);
				// $('#msg').delay(1000).fadeOut();
				// })		
				//$().toastmessage('showSuccessToast',data);
				// clear_form();
				// $('#report_form').hide();
				// $('#opt').val(0);
			}
		});
		
		
}

function clear_payment_form()
{
	$('#ins_no').val('');
	$('#t_payment').val('');
	$('#money_rec').val('');
	$('#deadline').val('');
	$('#status').val('');
	$('#status').val(0);
	$('#date3').val('');
	$('#note_pay').val('');
	$('#search_no').html('');
	$('#t_body').html('');
	
}
function validate()
{
	//var staff_id=document.getElementById('staff').value;
		var f_date=$("#frmdt").val();
		var t_date=$("#todt").val();
		if(f_date!='')
		{
			
		
			if(t_date!='')
			{
				
			return true;
				// if(staff_id!=0)
				// {
					// return true;
				// }
				// else
				// {
					// $('#s_nm').fadeIn('slow',function(){
					// $('#s_nm').html("please select staff name");
					// $('#s_nm').delay(1500).fadeOut();
					// })
					// return false;
				// }
			}
			else
			{
				$('#t_d').fadeIn('slow',function(){
				$('#t_d').html("please select Ending Date");
				$('#t_d').delay(1500).fadeOut();
				})
				
				return false;
			}
		}
		else
		{
				$('#f_d').fadeIn('slow',function(){
				$('#f_d').html("please select starting date");
				$('#f_d').delay(1500).fadeOut();
				})
			
			return false;
		}
		
}