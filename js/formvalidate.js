function formValidation()
{

	// Make quick references to our fields
	var email =  document.getElementById('email');
	var fname =  document.getElementById('fname');
	var lname =  document.getElementById('lname');
	var uname =  document.getElementById('uname');
	var pass =  document.getElementById('pass');
	var cpass =  document.getElementById('cpass');



	//  to check empty form fields.

	if(fname.value.length == 0 || lname.value.length == 0 || uname.value.length == 0 || email.value.length == 0 || pass.value.length == 0 || cpass.value.length == 0 )
	{
		$("#head").show().delay(1000).fadeOut();
		// document.getElementById('head').innerText = "All fields are mandatory"; //this segment displays the validation rule for all fields
		email.focus();
		return false;
	}
	if(emailValidation(email)){

		if(inputAlphabetu(uname)){

			if(lengthDefineu(uname, 6, 12)){

				if(inputAlphabetf(fname)){

					if(lengthDefinef(fname, 3, 12)){

						if(lengthDefinel(lname, 3, 12)){

							if(inputAlphabetl(lname)){

								if(validatePassword(pass.value, cpass.value)){

									return true;
								}
							}
						}
					}
				}
			}
		}
	}
	return false;
}



//function that checks whether input text is an alphabetic character or not.

function inputAlphabetf(inputtext){
	var alphaExp = /^[a-zA-Z]+$/;
	if(inputtext.value.match(alphaExp)){
		document.getElementById('p1').innerText = "";

		return true;
	}else{
		// document.getElementById('p1').innerText = "Enter valid name";  //this segment displays the validation rule for name
		$("#p1").html("<p>Enter valid name</p>").fadeIn().delay('1000').fadeOut();
		fname.fvalue = '';
		return false;
	}
}

function inputAlphabetu(inputtext){
	var alphaExp = /^[a-zA-Z0-9]+$/;
	if(inputtext.value.match(alphaExp)){
		document.getElementById('p4').innerText = "";
		return true;
	}else{
		document.getElementById('p4').innerText = "Enter valid Username";  //this segment displays the validation rule for name
		$("#p4").html("<p>Enter valid Username</p>").fadeIn().delay('1000').fadeOut();
		uname.value = '';
		return false;
	}
}

function inputAlphabetl(inputtext){
	var alphaExp = /^[a-zA-Z]+$/;
	if(inputtext.value.match(alphaExp)){
		document.getElementById('p2').innerText = "";

		return true;
	}else{
		// document.getElementById('p2').innerText = "Enter valid name";  //this segment displays the validation rule for name
		$("#p2").html("<p>Enter valid name</p>").fadeIn().delay('1000').fadeOut();
		lname.value = '';
		return false;
	}
}


// Function that checks whether the input characters are restricted according to defined by user.

function lengthDefineu(inputtext, min, max){
	var uInput = inputtext.value;
	if(uInput.length >= min && uInput.length <= max){
		document.getElementById('p4').innerText = "";

		return true;
	}else{

		// document.getElementById('p4').innerText = "Enter name between " +min+ " and " +max+ " characters *"; //this segment displays the validation rule for username
		$("#p4").html("<p>Enter name between " +min+ " and " +max+ " characters</p>").fadeIn().delay('1000').fadeOut();
		inputtext.value = '';
		return false;
	}
}

function lengthDefinel(inputtext, min, max){
	var uInput = inputtext.value;
	if(uInput.length >= min && uInput.length <= max){
		document.getElementById('p2').innerText = "";

		return true;
	}else{

		// document.getElementById('p2').innerText = "Enter name between " +min+ " and " +max+ " characters *"; //this segment displays the validation rule for username
		$("#p2").html("<p>Enter name between " +min+ " and " +max+ " characters</p>").fadeIn().delay('1000').fadeOut();
		inputtext.value = '';
		return false;
	}
}

function lengthDefinef(inputtext, min, max){
	var uInput = inputtext.value;
	if(uInput.length >= min && uInput.length <= max){
		document.getElementById('p1').innerText = "";

		return true;
	}else{

		// document.getElementById('p1').innerText = "Enter name between " +min+ " and " +max+ " characters *"; //this segment displays the validation rule for username
		$("#p1").html("<p>Enter name between " +min+ " and " +max+ " characters</p>").fadeIn().delay('1000').fadeOut();
		inputtext.value = '';
		return false;
	}
}



// Function that checks whether an user entered valid email address or not and displays alert message on wrong email address format.

function emailValidation(inputtext){
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	if(inputtext.value.match(emailExp)){
		document.getElementById('p3').innerText = "";
		return true;
	}else{
		// document.getElementById('p3').innerText = "Enter a vaild email"; //this segment displays the validation rule for email
		$("#p3").html("<p>Enter a vaild email</p>").fadeIn().delay('1000').fadeOut();
		email.value = '';
		return false; } }

		function validatePassword(pass,cpass){ if(pass == cpass) {
			document.getElementById('p5').innerText = ""; return true; } else {
				// document.getElementById('p5').innerText = "Check your password";
				$("#p5").html("<p>Check your password</p>").fadeIn().delay('1000').fadeOut();
				document.form.pass.value = ''; return false; } }


				function emailDoesExist(){
					var email = $("#email").val();
					$('#submit1').addClass('disabled');
					if(email != ''){
						$.ajax({
							url: 'check.php',
							type: 'post',
							data: {'email':email},
							success: function(response){
								// console.log(response);
								if(response > 0){
									$("#email").val('');
									$('#submit1').removeClass('disabled');
									$("#eval").html("<p>Email Already taken</p>").fadeIn().delay('1000').fadeOut();
								}

							}
						});

					}else{
						$("#eval").hide();
					}
				}

				function usernameDoesExist(){
					var uname = $("#uname").val();
					$('#submit1').addClass('disabled');
					if(uname != ''){
						$.ajax({
							url: 'check.php',
							type: 'post',
							data: {'uname':uname},
							success: function(response){

								if(response > 0){
									$("#uname").val('');
									$("#uval").html("<p>Username Already taken</p>").fadeIn().delay('1000').fadeOut();
								}

							}
						});
					}else{
						$("#uval").hide();
						$('#submit1').removeClass('disabled');

					}
				}

				$(document).ready(function(){
					$(".validate").on('blur', function(){
						$type = $(this).data("type");

						switch($type)
						{
							case 'email':
							if(emailValidation(this))
							{
								emailDoesExist();
							}
							break;
							case 'fname':
							if(lengthDefinef(this,3,12))
							{
								inputAlphabetf(this);
							}
							break;
							case 'lname':
							if(lengthDefinel(this,3,12))
							{
								inputAlphabetl(this);
							}
							break;
							case 'uname':
							if(inputAlphabetu(this))
							{
								if(lengthDefineu(this,6,12)){
									usernameDoesExist();
								}

							}
							break;
							case 'cpass':
							validatePassword($("#pass").val(),$("#cpass").val());
							break;
						}

					})

				});
