	function check_name(a) {
			let name = document.getElementsByName("name")[0].value;
			let regex_name = /^[A-ZÀÁẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬẸẺẼÈÉÊỀẾỂỄỆÌÍỈỊĨÒÓỌỎÕÔỐỒỔỖỘƠỚỜỞỠỢÙÚŨỤỦĐƯỨỪỬỮỰỲỴÝỶỸ][a-zàáảãạăắằẳẵặâấầẩẫậẹẻẽèéêềếểễệìíỉịĩòóọỏõôốồổỗộơớờởỡợùúũụủđưứừửữựỳỵýỷỹ]{0,6}(?: [A-ZÀÁẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬẸẺẼÈÉÊỀẾỂỄỆÌÍỈỊĨÒÓỌỎÕÔỐỒỔỖỘƠỚỜỞỠỢÙÚŨỤỦĐƯỨỪỬỮỰỲỴÝỶỸ][a-zàáảãạăắằẳẵặâấầẩẫậẹẻẽèéêềếểễệìíỉịĩòóọỏõôốồổỗộơớờởỡợùúũụủđưứừửữựỳỵýỷỹ]{0,6}){0,8}$/;
			if (name.length === 0) {
				document.getElementsByClassName('name_error')[0].textContent = 'Họ tên không được để trống';
				a++;
			} else if(!regex_name.test(name)) {
				document.getElementsByClassName('name_error')[0].textContent = 'Họ tên không hợp lệ';
				a++
			} else if (regex_name.test(name)){
				document.getElementsByClassName('name_error')[0].innerHTML = '';
				a = 0;
			}
			return a;
		}
	function check_phone(b) {
			let phone = document.getElementsByName("phone")[0].value;
			let regex_phone = /(84|0[3|5|7|8|9])+([0-9]{8})\b/;
			if (phone.length === 0) {
				document.getElementsByClassName('phone_error')[0].textContent = 'Số điện thoại không được để trống';
				b++;
			} else if(!regex_phone.test(phone)) {
				document.getElementsByClassName('phone_error')[0].textContent = 'Số điện thoại không hợp lệ';
				b++
			} else if (regex_phone.test(phone)){
				document.getElementsByClassName('phone_error')[0].innerHTML = '';
				b = 0;
			}
			return b;
		}

	function check_address(c) {
			let address = document.getElementsByName("address")[0].value;
			let regex_address = /^(?:Tỉnh|Thành phố) [A-ZÀÁẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬẸẺẼÈÉÊỀẾỂỄỆÌÍỈỊĨÒÓỌỎÕÔỐỒỔỖỘƠỚỜỞỠỢÙÚŨỤỦĐƯỨỪỬỮỰỲỴÝỶỸ][a-zyàáảãạăắằẳẵặâấầẩẫậẹẻẽèéêềếểễệìíỉịĩòóọỏõôốồổỗộơớờởỡợùúũụủđưứừửữựỳỵýỷỹ]{0,6}(?: [A-ZÀÁẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬẸẺẼÈÉÊỀẾỂỄỆÌÍỈỊĨÒÓỌỎÕÔỐỒỔỖỘƠỚỜỞỠỢÙÚŨỤỦĐƯỨỪỬỮỰỲỴÝỶỸ][a-zàáảãạăắằẳẵặâấầẩẫậẹẻẽèéêềếểễệìíỉịĩòóọỏõôốồổỗộơớờởỡợùúũụủđưứừửữựỳỵýỷỹ]{0,6}){0,3}$/;
			if (address.length === 0) {
				document.getElementsByClassName('address_error')[0].textContent = 'Tỉnh thành không được để trống';
				c++;
			} else if(!regex_address.test(address)) {
				document.getElementsByClassName('address_error')[0].textContent = 'Tỉnh thành không hợp lệ';
				c++
			} else if (regex_address.test(address)){
				document.getElementsByClassName('address_error')[0].innerHTML = '';
				c = 0;
			}
			return c;
		}
	const button = document.querySelector("button.submit_form");
	const form_submit = document.querySelector("form.manu_c");
	button.addEventListener('click',check_submit);
		function check_submit(event) {
			event.preventDefault();
			let a = 0;
			let b = 0;
			let c = 0;
			a = check_name(a);
			b = check_phone(b);
			c = check_address(c);
			if (a == 0 && b == 0 && c == 0){
				form_submit.submit();
			}

		}
		