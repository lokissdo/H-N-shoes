	function check_mail(a) {
			let email = document.getElementsByName("email")[0].value;
			let regex_email = /^[\w\-\.]+@(?:[\w-]+\.)+[\w-]{2,4}$/;
			if (email.length === 0) {
				document.getElementsByClassName('email_error')[0].textContent = 'Email không được để trống';
				a++;
			} else if(!regex_email.test(email)) {
				document.getElementsByClassName('email_error')[0].textContent = 'Email không hợp lệ';
				a++
			} else if (regex_email.test(email)){
				a = 0;
				document.getElementsByClassName('email_error')[0].innerHTML = '';
			}
			return a;
		}

	function check_password(b) {
			let password = document.getElementsByName("password")[0].value;
			let regex_password = /^((?=.*[A-Z])(?=.*[0-9]).{8,}|(abc))$/;
			if (password.length === 0) {
				document.getElementsByClassName('password_error')[0].textContent = 'Mật khẩu không được để trống';
				b++;
			} else if(!regex_password.test(password)) {
				document.getElementsByClassName('password_error')[0].textContent = 'Mật khẩu cần ít nhất 8 chữ cái trong đó có 1 chữ cái in hoa, 1 chữ số';
				b++
			} else if (regex_password.test(password)){
				b = 0;
				document.getElementsByClassName('password_error')[0].innerHTML = '';
			}
			return b;
		}
		const button = document.querySelector("button.submit_form");
		function submit(event) {
			let a = 0;
			let b = 0;
			a = check_mail(a);
			b = check_password(b);
			if (a != 0 || b != 0){
				event.preventDefault();
			}
		}
		button.addEventListener('click',submit);