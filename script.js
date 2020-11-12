function login() {
	var xhr = new XMLHttpRequest();
	var data = new FormData(document.querySelector("form"));
	xhr.open("POST", "php/login.php", true);
	xhr.addEventListener("readystatechange", function() {
		if(xhr.readyState === 4 && xhr.status === 200) {
			if(xhr.responseText === "true") {
				window.location = "index.php";
			}
			else {
				alert("Incorrect username or password");
			}
		}
	});
	xhr.send(data);
}

function logout() {
	var xhr = new XMLHttpRequest();
	xhr.open("POST", "php/logout.php", true);
	xhr.addEventListener("readystatechange", function() {
		if(xhr.readyState === 4 && xhr.status === 200) {
			window.location = "login.php";
		}
	});
	xhr.send();
}
