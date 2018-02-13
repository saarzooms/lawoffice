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
				if(data==0)
				{
					$("#email").val('');
					$("#password").val('');
					$("#msg").html("Invalid Email Id/Password");
				}
				else if(data==1)
				{
					$("#email").val('');
					$("#password").val('');
					window.location.href="\index.php";
				}
				else if(data=='2')
				{
					$("#msg").html("Your Account is Deactive");
				}	
			}
		});
		
	});
});