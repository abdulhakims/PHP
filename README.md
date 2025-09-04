#CALCULATOR.PHP
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
</head>
<body>
    <form action="gg.php" method="post">
        <label for="">Enter First Number:</label> <br>
        <input type="number" name="num1" id=""> <br>
        <label for="">Enter Second Number:</label> <br>
        <input type="number" name="num2" id=""> <br>
        <label for="">Enter Third Number:</label> <br>
        <input type="number" name="num3" id=""> <br> 
        <label for="">Enter Fourth Number:</label> <br>
        <input type="number" name="num4" id=""> <br> <br>
        <input type="Submit" name="Compute" id=""> 

    </form>    
</body>
</html>

#gg.php
<?php

$n1 = $_POST['num1'];
$n2 = $_POST['num2'];
$n3 = $_POST['num3'];
$n4 = $_POST['num4'];

$sum = $n1 + $n2;
$diff = $n4 - $n3;
$prod = $n1 * $n3;
$quo = $n2 / $n3;
$ave = ($n1 + $n2 + $n3 + $n4) / 4;


echo "the sum of $n1 and $n2 is $sum <br>";
echo "the difference of $n4 and $n3 is $diff <br>";
echo "the product of $n1 and $n3 is $prod <br>";
echo "the quotient of $n2 and $n3 is ".round($quo);
echo "the average of $n1, $n2, $n3 and $n4 is $ave <br>";

?>

#index.php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Student Registration</h4>
        </div>
        <div class="card-body">
            <form action="process_registration.php" method="POST">
                <!-- Full Name -->
                <div class="mb-3">
                    <label for="fullname" class="form-label">Full Name</label>
                    <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Enter your full name" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
                </div>

                <!-- Address -->
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" id="address" class="form-control" rows="2" placeholder="Enter your address" required></textarea>
                </div>

                <!-- Birthdate -->
                <div class="mb-3">
                    <label for="birthdate" class="form-label">Birthdate</label>
                    <input type="date" name="birthdate" id="birthdate" class="form-control" required>
                </div>

                <!-- Course -->
                <div class="mb-3">
                    <label for="course" class="form-label">Course</label>
                    <select name="course" id="course" class="form-select" required>
                        <option value="">-- Select Course --</option>
                        <option value="ACT">ACT - Associate in Computer Technology</option>
                        <option value="CT">CT - Computer Technology</option>
                        <option value="BSOA">BSOA - Bachelor of Science in Office Administration</option>
                    </select>
                </div>

                <!-- Gender -->
                <div class="mb-3">
                    <label class="form-label">Gender</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="Male" required>
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-end">
                    <button type="submit" class="btn btn-success">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>


#process_registration.php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Registration Successful</h4>
        </div>
        <div class="card-body">
                <?php
                if ($_SERVER["REQUEST_METHOD"] =="POST") {
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $birthdate = $_POST['birthdate'];
                $course = $_POST['course'];
                $gender = $_POST['gender'];

                } else {
                    echo "<div class= ''alert alert-danger'> No Data received. </div>";
                    exit;
                }
                

               
                ?>
            <p class="lead">Here are the details you submitted:</p>
           
            <ul class="list-group">
                <li class="list-group-item"><strong>Full Name:</strong> <?php echo $fullname; ?> </li>
                <li class="list-group-item"><strong>Email:</strong> <?=$email; ?> </li>
                <li class="list-group-item"><strong>Address:</strong> <?=$address; ?> </li>
                <li class="list-group-item"><strong>Birthdate:</strong> <?=$birthdate; ?> </li>
                <li class="list-group-item"><strong>Course:</strong> <?php echo $course; ?> </li>
                <li class="list-group-item"><strong>Gender:</strong> <?php echo $gender; ?> </li>
            </ul>

            <div class="mt-4">
                <a href="index.php" class="btn btn-primary">Register Another Student</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>



<!DOCTYPE html>
<html>
<head>
    <title>Payroll Calculator</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background: #f4f4f4; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            margin: 0;
        }
        .container { 
            background: #fff; 
            border-radius: 10px; 
            width: 380px; 
            box-shadow: 0 0 12px rgba(0,0,0,0.2); 
            overflow: hidden;
        }
        .header { 
            background: #007BFF; 
            color: white; 
            text-align: center; 
            padding: 12px; 
            font-size: 20px; 
            font-weight: bold; 
        }
        form { 
            padding: 20px; 
        }
        label { 
            display: block; 
            margin: 10px 0 5px; 
            font-weight: bold; 
        }
        input { 
            width: 100%; 
            padding: 10px; 
            border: 1px solid #ccc; 
            border-radius: 5px; 
            margin-bottom: 10px; 
            font-size: 14px; 
        }
        button { 
            width: 100%; 
            padding: 12px; 
            background: #007BFF; 
            color: #fff; 
            border: none; 
            border-radius: 5px; 
            font-size: 16px; 
            cursor: pointer; 
        }
        button:hover { 
            background: #0056b3; 
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">Payroll Calculator</div>
    <form method="POST" action="payslip.php">
        <label>Employee Name</label>
        <input type="text" name="name" placeholder="Enter employee name" required>

        <label>Total Days of Work</label>
        <input type="number" name="days" placeholder="Enter days worked" required>

        <label>Daily Rate</label>
        <input type="number" name="rate" placeholder="Enter daily rate" required>

        <label>Cash Advance</label>
        <input type="number" name="advance" placeholder="Enter cash advance" value="0">

        <button type="submit">Generate Payslip</button>
    </form>
</div>
</body>
</html>


<!DOCTYPE html>
<html>
<head>
    <title>Employee Payslip</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background: #f4f4f4; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            margin: 0;
        }
        .container { 
            background: #fff; 
            border-radius: 8px; 
            width: 420px; 
            box-shadow: 0 0 12px rgba(0,0,0,0.2); 
            overflow: hidden;
        }
        .header { 
            background: #2e7d32; 
            color: white; 
            padding: 12px; 
            text-align: center; 
            font-size: 20px; 
            font-weight: bold; 
        }
        .details { 
            padding: 15px 20px; 
            font-size: 15px; 
        }
        .details p { 
            margin: 6px 0; 
        }
        .details p b { 
            display: inline-block; 
            width: 160px; 
        }
        .netpay { 
            font-size: 18px; 
            font-weight: bold; 
            color: green; 
            margin-top: 10px; 
        }
        .buttons { 
            display: flex; 
            justify-content: center; 
            gap: 10px; 
            padding: 12px; 
            border-top: 1px solid #ddd; 
        }
        button { 
            background: #f8f9fa; 
            border: 1px solid #ccc; 
            padding: 8px 16px; 
            border-radius: 5px; 
            cursor: pointer; 
        }
        button:hover { 
            background: #e0e0e0; 
        }
        /* 🔹 Back button specific style */
        .back-btn {
            background: gray;
            color: white;
            border: none;
        }
        .back-btn:hover {
            background: #555; /* darker gray on hover */
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">Employee Payslip</div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $days = $_POST['days'];
        $rate = $_POST['rate'];
        $advance = $_POST['advance'];

        $gross = $days * $rate;

        $tax = $gross * 0.02;
        $sss = $gross * 0.015;
        $pagibig = 50;
        $total_deductions = $tax + $sss + $pagibig + $advance;

        $net = $gross - $total_deductions;

        echo "<div class='details'>";
        echo "<p><b>Employee Name:</b> $name</p>";
        echo "<p><b>Total Days Worked:</b> $days</p>";
        echo "<p><b>Daily Rate:</b> ₱".number_format($rate,2)."</p>";
        echo "<hr>";
        echo "<p><b>Gross Pay:</b> ₱".number_format($gross,2)."</p>";
        echo "<p><b>Tax (2%):</b> ₱".number_format($tax,2)."</p>";
        echo "<p><b>SSS (1.5%):</b> ₱".number_format($sss,2)."</p>";
        echo "<p><b>Pag-IBIG:</b> ₱".number_format($pagibig,2)."</p>";
        echo "<p><b>Cash Advance:</b> ₱".number_format($advance,2)."</p>";
        echo "<hr>";
        echo "<p><b>Total Deductions:</b> ₱".number_format($total_deductions,2)."</p>";
        echo "<p class='netpay'>Net Pay: ₱".number_format($net,2)."</p>";
        echo "</div>";
    }
    ?>
    <div class="buttons">
        <form action="ps.php">
            <button type="submit" class="back-btn">Back</button>
        </form>
        <button onclick="window.print()">Print Payslip</button>
    </div>
</div>
</body>
</html>
