<?php include "connection.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        /* CSS Reset */
        html, body, div, span, h1, h2, h3, h4, h5, h6, p, a, img, ol, ul, li, form, label, input, button {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        h1 {
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            border: 2px solid #ccc;
            padding: 20px;
            border-radius: 8px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group select {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group .country-code {
            display: inline-block;
            width: 20%;
            font-size: 12px;
            font-family: sans-serif;
            font-weight: bold;
            text-align:left;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-repeat: no-repeat;
            background-position: 5px left;
           
        }

        .form-group .country-code option {
            padding-left: 30px;
            background-repeat: no-repeat;
            background-position: 5px center;
        }

        .form-group button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #45a049;
        }

        .result {
            margin-top: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 10px;
        }

        @media (max-width: 600px) {
            .container {
                max-width: 100%;
            }
        }

        /* Flag Images */
        .flag-us {
            background-image: url("https://example.com/us-flag.png");
        }

        .flag-pk {
            width: 5px;
            height: 10px;
            align: left;
            background-image: url("https://pixabay.com/vectors/pakistan-flag-national-nation-26804");
        }

        .flag-uk {
            background-image: url("https://example.com/uk-flag.png");
        }

        /* Add more flag classes and corresponding flag image URLs as needed */
    </style>
</head>
<body>
    <div class="container">
        <h1>Form Page</h1>

        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Process the form data
            $name = $_POST["name"];
            $program = $_POST["program"];
            $roll = $_POST["roll"];
            $batch = $_POST["batch"];
            $contact = $_POST["contact"];
            $DOB = $_POST["DOB"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            // Prepare and execute the SQL query
            $stmt = $conn->prepare("INSERT INTO message (name, program, roll, batch, contact, DOB, email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssiiisss", $name, $program, $roll, $batch, $contact, $DOB, $email, $password);
            $stmt->execute();

            // Display a success message
            echo "<p>Thank you, $name! Your roll has been received and stored in the database.</p>";

            // Close the statement
            $stmt->close();
        }
        ?>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="program">Program:</label>
                <input type="text" id="program" name="program" required>
            </div>

            <div class="form-group">
                <label for="roll">Roll:</label>
                <input type="number" id="roll" name="roll" required>
            </div>

            <div class="form-group">
                <label for="batch">Batch:</label>
                <input type="number" id="batch" name="batch" required>
            </div>

            <div class="form-group">
                <label for="contact">Contact:</label>
                <select id="countryCode" name="countryCode" class="country-code">
                <option value="+92" class="flag-pk">+92 (PK)</option>
                    <option value="+1" class="flag-us">+1 (US)</option>
                    <option value="+44" class="flag-uk">+44 (UK)</option>
                    <!-- Add more country codes and flag classes as needed -->
                </select>
                <input type="text" id="contact" name="contact" required>
            </div>

            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="text" id="dob" name="DOB" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
