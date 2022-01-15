		function check_name(a) {
			let name = document.getElementsByName("name")[0].value;
			let regex_name = /^[A-ZÀÁẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬẸẺẼÈÉÊỀẾỂỄỆÌÍỈỊĨÒÓỌỎÕÔỐỒỔỖỘƠỚỜỞỠỢÙÚŨỤỦĐƯỨỪỬỮỰỲỴÝỶỸ][a-zàáảãạăắằẳẵặâấầẩẫậẹẻẽèéêềếểễệìíỉịĩòóọỏõôốồổỗộơớờởỡợùúũụủđưứừửữựỳỵýỷỹ]{0,6}(?: [\w\(\)\-\[\]\.\,]{0,15}){0,10}$/;
			if (name.length === 0) {
				document.getElementsByClassName('name_error')[0].textContent = 'Họ tên không được để trống';
				a++;
			} else if(!regex_name.test(name)) {
				document.getElementsByClassName('name_error')[0].textContent = 'Họ tên không hợp lệ';
				a++
			} else if (regex_name.test(name)){
				document.getElementsByClassName('name_error')[0].innerHTML = '';
				
			}
			return a;
		}
		function check_price(a) {
			let price = document.getElementsByName("price")[0].value;
			if (price.length === 0) {
				document.getElementsByClassName('price_error')[0].textContent = 'Giá không được để trống';
				a++;
			} else if(price < 1) {
				document.getElementsByClassName('price_error')[0].textContent = 'Giá không hợp lý';
				a++
			} else if (price >= 1){
				document.getElementsByClassName('price_error')[0].innerHTML = '';
				
			}
			return a;
		}
		function check_quantity(a) {
			let quantity = document.getElementsByName("quantity")[0].value;
			if (quantity.length === 0) {
				document.getElementsByClassName('quantity_error')[0].textContent = 'Số lượng không được để trống';
				a++;
			} else if(quantity < 1) {
				document.getElementsByClassName('quantity_error')[0].textContent = 'Sô lượng không hợp lý';
				a++
			} else if (quantity >= 1){
				document.getElementsByClassName('quantity_error')[0].innerHTML = '';

			}
			return a;
		}
	const button = document.querySelector("button.submit_form");
		function submit(event) {
			let a = 0;
			a = check_name(a);
			a = check_price(a);
			a = check_quantity(a);
			if (a != 0){
				event.preventDefault();
			}
		}
	button.addEventListener('click',submit);