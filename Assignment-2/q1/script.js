document.getElementById("registrationForm").addEventListener("submit", function(event) {

    event.preventDefault();

    let name = document.getElementById("name").value.trim();
    let rollno = document.getElementById("rollno").value.trim();
    let email = document.getElementById("email").value.trim();
    let course = document.getElementById("course").value;
    let password = document.getElementById("password").value;

    let valid = true;

    // Clear previous error messages
    document.getElementById("nameError").innerHTML = "";
    document.getElementById("rollnoError").innerHTML = "";
    document.getElementById("emailError").innerHTML = "";
    document.getElementById("courseError").innerHTML = "";
    document.getElementById("passwordError").innerHTML = "";

    // Required field validation
    if (name === "") {
        document.getElementById("nameError").innerHTML = "Name is required";
        valid = false;
    }

    if (rollno === "") {
        document.getElementById("rollnoError").innerHTML = "Roll number is required";
        valid = false;
    }

    if (email === "") {
        document.getElementById("emailError").innerHTML = "Email is required";
        valid = false;
    }

    if (course === "") {
        document.getElementById("courseError").innerHTML = "Please select a course";
        valid = false;
    }

    if (password === "") {
        document.getElementById("passwordError").innerHTML = "Password is required";
        valid = false;
    }

    // Email format validation
    let emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

    if (email !== "" && !emailPattern.test(email)) {
        document.getElementById("emailError").innerHTML = "Enter a valid email";
        valid = false;
    }

    // Password strength validation
    if (password !== "" && password.length < 8) {
        document.getElementById("passwordError").innerHTML =
            "Password must contain at least 8 characters";
        valid = false;
    }

    // Successful submission
    if (valid) {
        alert("Registration successful!");
    }
});