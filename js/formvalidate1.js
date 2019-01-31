function update()
{

	// Make quick references to our fields
	var fname =  document.getElementById('first_name');
	var lname =  document.getElementById('last_name');
	var mobile =  document.getElementById('mobile');
	// var email =  document.getElementById('email');
	// var uname =  document.getElementById('uname');

	if(fname.value.length == 0 || lname.value.length == 0 )
	{
		$("#head").show().delay(1000).fadeOut();
		// document.getElementById('head').innerText = "All fields are mandatory"; //this segment displays the validation rule for all fields
		fname.focus();
		return false;
	}


				if(inputAlphabetf(fname)){

					if(lengthDefinef(fname, 3, 12)){

						if(lengthDefinel(lname, 3, 12)){

							if(inputAlphabetl(lname)){


									return true;
							}
						}
					}
				}

	return false;
}

// function update()
// {
// 	var curpass =  document.getElementById('curpass');
// 	var npass =  document.getElementById('npass');
// 	var cpass =  document.getElementById('cpass');
//
// 	if(curpass.value.length == 0 || npass.value.length == 0 || cpass.value.length == 0 )
// 	{
// 		$("#head1").show().delay(1000).fadeOut();
// 		// document.getElementById('head').innerText = "All fields are mandatory"; //this segment displays the validation rule for all fields
// 		curpass.focus();
// 		return false;
// 	}
// }







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
