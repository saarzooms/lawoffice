$(document).ready(function(){
	
	$(document).on("submit","#loginform",function(e){
		e.preventDefault();
		var email=$("#username").val();
		var psw=$("#pass").val();
		//alert(email+psw);
		//alert(email+psw);
		$.ajax({
			type:"post",
			url:"ajax/validate_user.php",
			data:{'email':email,'psw':psw},
			success:function(data)
			{
				//alert(data);
				var arr=eval(data);
				
				if(arr[0]==0)
				{
					$("#email").val('');
					$("#password").val('');
					$("#msg").html("Invalid Email Id/Password");
				}
				else if(arr[0]=='admin')
				{
					$("#email").val('');
					$("#password").val('');
					window.location.href="\index.php";
				}
				else if(arr[0]=='active' && arr[1]=='call-center')
				{
					$("#email").val('');
					$("#password").val('');
					window.location.href="\callcenterreport.php";
				}
				else if(arr[0]=='active' && arr[1]=='levy')
				{
					$("#email").val('');
					$("#password").val('');
					window.location.href="report.php";
				}
				else if(arr[0]=='active' && arr[1]=='secreteriat')
				{
					$("#email").val('');
					$("#password").val('');
					window.location.href="report.php";
				}
				else if(arr[0]==2)
				{
					$("#msg").html("Your Account is Deactive");
				}	
			}
		});
		
	});
});