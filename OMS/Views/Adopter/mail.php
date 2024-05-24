<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .back-button {
            padding: 2px; 
            font-size: 14px; 
            background-color: #008CBA;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 10%;
            margin: 10px; 
        }

        form {
            width: 60%; 
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            margin: 10px; 
        }

        input[type=text],
        input[type=email] {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
        }
    </style>
</head>
<body>
    <button class="back-button" onclick="goBack()">Back</button>
    <form class="myForm" action="send.php" method="post" onsubmit="return validateForm()">
        <span class="error-message" id="emailError"></span>
        Email <input type="email" name="email" id="email" value=""> <br>
        
        <span class="error-message" id="subjectError"></span>
        Subject <input type="text" name="subject" id="subject" value=""> <br>
        
        <span class="error-message" id="messageError"></span>
        Message <input type="text" name="message" id="message" value=""> <br>
        
        <button type="submit" name="send">Send</button>
    </form>

    <script>
        function validateForm() {
            var email = document.getElementById("email").value;
            var subject = document.getElementById("subject").value;
            var message = document.getElementById("message").value;

            var emailError = document.getElementById("emailError");
            var subjectError = document.getElementById("subjectError");
            var messageError = document.getElementById("messageError");

            emailError.innerHTML = "";
            subjectError.innerHTML = "";
            messageError.innerHTML = "";

            if (email === "") {
                emailError.innerHTML = "Email field is empty";
                return false;
            }

            if (subject === "") {
                subjectError.innerHTML = "Subject field is empty";
                return false;
            }

            if (message === "") {
                messageError.innerHTML = "Message field is empty";
                return false;
            }

            return true;
        }

        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>