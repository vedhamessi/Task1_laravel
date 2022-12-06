<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<title></title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&display=swap" rel="stylesheet"> 
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('css/intlTelInput.css') }}">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
@include('../common/header')
@yield('content')
@include('../common/footer')
<script src="{{ asset('js/bootstrap.bundle.min.js') }}" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
	<script src="{{ asset('js/intlTelInput.js') }}"></script>
	<script>
		$("#register_form").validate({
			rules: {
				first_name: {
					required: true,
					minlength: 2
				},
				middle_name: {
					required: true,
				},
				last_name: {
					required: true,
				},
				course: {
					required: true
				},
				gender: {
					required: true
				},
				mobile: {
					required: true,
					number: true,
					minlength:8,
			        maxlength:12,
				},
				address: {
					required: true
				},
				email: {
					required: true,
					email: true,
				},
				password: {
					required: true,
					minlength: 5
				},
				password2: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				},
			},
			messages: {
				first_name: {
					required: "Please enter first name",
					minlength: "Your first name must consist of at least 2 characters"
				},
				middle_name: {
					required: "Please enter middle name",
				},
				last_name: {
					required: "Please enter last name",
				},
				course: {
					required: "Please select course"
				},
				gender: {
					required: "Please choose gender"
				},
				mobile: {
					required: "Please enter mobile no",
					number: "Value must be in numbers",
					minlength:"Your last name must consist of at least 8 numbers",
			        maxlength:"maximum 12 numbers",
				},
				address: {
					required: "Please enter address",
				},
				email: {
					required: "Please enter email",
					email: "Invalid email",
				},
				password: {
					required: "Please enter password",
					minlength: "Your last name must consist of at least 5 characters",
				},
				password2: {
					required: "Please enter password again",
					minlength: "Your last name must consist of at least 5 characters",
					equalTo: "Please enter the same password as above"
				},
			},
			submitHandler: function(form) {
			    form.submit();
			}
		});
	</script>	
	<script>
	    var input = document.querySelector("#mobile");
	    window.intlTelInput(input, {
	    	initialCountry: "auto",
	      // allowDropdown: false,
	      // autoHideDialCode: false,
	      // autoPlaceholder: "off",
	      // dropdownContainer: document.body,
	      // excludeCountries: ["us"],
	      // formatOnDisplay: false,
	      geoIpLookup: function(callback) {
	        $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
	          var countryCode = (resp && resp.country) ? resp.country : "";
	          callback(countryCode);
	        });
	      },
	      hiddenInput: "full_number",
	      // initialCountry: "auto",
	      // localizedCountries: { 'de': 'Deutschland' },
	      // nationalMode: false,
	      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
	      placeholderNumberType: "MOBILE",
	      // preferredCountries: ['cn', 'jp'],
	      separateDialCode: true,
	      utilsScript: "{{ asset('js/utils.js') }}",
	    });
	</script>
	<script>
		$(".iti__flag-container").focusout(function(){
			if(document.querySelector('.iti__selected-dial-code') != ''){
				var call_code = document.querySelector('.iti__selected-dial-code').innerHTML;
				document.querySelector('input[name=call_code]').value = call_code;
			}
		});
	</script>
	<script>
		$("#email").focusout(function(){
		  var getEmail = $('#email').val();
		  $('.ac_email_res').css('display', 'none');
		  $('.ac_email_res-main').css('display', 'none');
		  // console.log('hg', getEmail);
		  if (getEmail) {
		    $.ajax({
		      url: '{{ url('emailCheck') }}',
		      method: 'POST',
              headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
		      data: {
		        email: getEmail
		      },
		      dataType: 'json',
		      success: function(response) {
		      	console.log('res', response);
		        if (response['code'] == 0) {

		        } else {
		          $('#email').val('');
		          $('.ac_email_res-main').css('display', 'flex');
		          $('.ac_email_res').css('display', 'block');
		          $('.ac_email_res').css('color', 'red');
		          $('.ac_email_res').html(response['msg']);
		        }
		      }
		    });
		  }
		});
	</script>
	<script>
		$("#login_form").validate({
			rules: {
				email: {
					required: true,
					email: true,
				},
				password: {
					required: true,
				}
			},
			messages: {
				email: {
					required: "Please enter email",
					email: "Invalid email",
				},
				password: {
					required: "Please enter password",
				}
			},
			submitHandler: function(form) {
			    form.submit();
			}
		});
	</script>
	<script>
		$("#up_form").validate({
			rules: {
				first_name: {
					required: true,
					minlength: 2
				},
				middle_name: {
					required: true,
				},
				last_name: {
					required: true,
				},
				course: {
					required: true
				},
				gender: {
					required: true
				},
				mobile: {
					required: true,
					number: true,
					minlength:8,
			        maxlength:12,
				},
				address: {
					required: true
				},
				email: {
					required: true,
					email: true,
				}
			},
			messages: {
				first_name: {
					required: "Please enter first name",
					minlength: "Your first name must consist of at least 2 characters"
				},
				middle_name: {
					required: "Please enter middle name",
				},
				last_name: {
					required: "Please enter last name",
				},
				course: {
					required: "Please select course"
				},
				gender: {
					required: "Please choose gender"
				},
				mobile: {
					required: "Please enter mobile no",
					number: "Value must be in numbers",
					minlength:"minimum 8 numbers",
			        maxlength:"maximum 12 numbers",
				},
				address: {
					required: "Please enter address",
				},
				email: {
					required: "Please enter email",
					email: "Invalid email",
				},
			},
			submitHandler: function(form) {
			    form.submit();
			}
		});
	</script>
</body>
</html>