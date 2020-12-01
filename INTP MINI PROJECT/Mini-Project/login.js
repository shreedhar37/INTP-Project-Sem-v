		function register() {
			document.getElementById("login").style.left = "-400px";
			document.getElementById("register").style.left = "50px";
			document.getElementById("btn").style.left = "110px";

		}

		function login() {
			document.getElementById("login").style.left = "50px";
			document.getElementById("register").style.left = "450px";
			document.getElementById("btn").style.left = "0px";
		}

		function validateForm() {
			var name = document.signin.uid.value;
			var password = document.signin.paswd.value;

			if (name === null || name === "" || name === " ") {
				alert("UserId can't be blank");
				return false;
			} else if (password === null || password === "" || password === " ") {
				alert("Password can't be blank");
				return false;
			}
		}

		function validateReg() {

			var x = document.reg.uname.value;
			var y = document.reg.email.value;
			var atposition = y.indexOf("@");
			var dotposition = y.lastIndexOf(".");
			var paswd = document.reg.pswd.value;
			var cpaswd = document.reg.cpswd.value;

			if (x === "" || x === null || x === " ") {
				alert("Name must be filled out");
				return false;
			} else if (atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= y.length) {
				alert("Please enter a valid e-mail address");
				return false;
			} else if (paswd == cpaswd) {
				return true;
			} else {
				alert(" Password must be same!");
				return false;
			}

		}

		function tmscon() {
			var c = confirm("We collect your data to track your browsing behaviour and we don't share your data with anyone");
		}