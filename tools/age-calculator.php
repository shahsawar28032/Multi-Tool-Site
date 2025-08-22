<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Age Calculator | Multi-Tool Utility</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
     <link rel="stylesheet" href="../bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                <i class="bi bi-tools me-2"></i>Multi-Tool Utility
            </a>
        </div>
    </nav>

    <div class="tool-container my-5">
        <div class="tool-header">
            <h1><i class="bi bi-calendar-event-fill me-2"></i>Age Calculator</h1>
            <p class="lead">Calculate your exact age in years, months, and days from your birth date.</p>
        </div>

        <div class="text-center mt-4">
    <a href="download.php?tool=standard-calculator" class="btn btn-outline-success me-2">
        <i class="bi bi-download me-1"></i> Download Offline Version
    </a>
    <a href="../index.php" class="btn btn-outline-primary">
        <i class="bi bi-arrow-left me-1"></i> Back to Home
    </a>
</div>

        <div class="tool-form">
            <form id="ageForm">
                <div class="mb-3">
                    <label for="birthdate" class="form-label">Birth Date</label>
                    <input type="date" class="form-control" id="birthdate" required>
                </div>
                <div class="mb-3">
                    <label for="asOfDate" class="form-label">As of Date</label>
                    <input type="date" class="form-control" id="asOfDate">
                    <div class="form-text">Leave blank to calculate age as of today</div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Calculate Age</button>
            </form>

            <div class="result-container mt-4" id="resultContainer" style="display: none;">
                <h4>Age Calculation Result</h4>
                <div id="result"></div>
                <button class="btn btn-outline-secondary mt-3" onclick="resetAgeCalculator()">Calculate Another</button>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="../index.php" class="btn btn-outline-primary">
                <i class="bi bi-arrow-left me-1"></i> Back to Home
            </a>
        </div>
    </div>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">&copy; <?php echo date("Y"); ?> Multi-Tool Utility. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('ageForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const birthdate = new Date(document.getElementById('birthdate').value);
            let asOfDate = document.getElementById('asOfDate').value;
            
            if (!asOfDate) {
                asOfDate = new Date();
            } else {
                asOfDate = new Date(asOfDate);
            }
            
            if (birthdate > asOfDate) {
                document.getElementById('result').innerHTML = `
                    <div class="alert alert-danger">Birth date cannot be in the future!</div>
                `;
                document.getElementById('resultContainer').style.display = 'block';
                return;
            }
            
            const age = calculateAge(birthdate, asOfDate);
            
            document.getElementById('result').innerHTML = `
                <p><strong>Age:</strong> ${age.years} years, ${age.months} months, ${age.days} days</p>
                <p><strong>Total Months:</strong> ${age.totalMonths}</p>
                <p><strong>Total Weeks:</strong> ${age.totalWeeks}</p>
                <p><strong>Total Days:</strong> ${age.totalDays}</p>
            `;
            document.getElementById('resultContainer').style.display = 'block';
        });
        
        function calculateAge(birthdate, asOfDate) {
            // Calculate total difference in milliseconds
            const diff = asOfDate - birthdate;
            
            // Calculate total days
            const totalDays = Math.floor(diff / (1000 * 60 * 60 * 24));
            const totalWeeks = Math.floor(totalDays / 7);
            const totalMonths = Math.floor(totalDays / 30.44); // Average month length
            
            // Calculate years, months, days
            let years = asOfDate.getFullYear() - birthdate.getFullYear();
            let months = asOfDate.getMonth() - birthdate.getMonth();
            let days = asOfDate.getDate() - birthdate.getDate();
            
            // Adjust for negative months or days
            if (days < 0) {
                months--;
                // Get days in previous month
                const prevMonthLastDay = new Date(
                    asOfDate.getFullYear(),
                    asOfDate.getMonth(),
                    0
                ).getDate();
                days += prevMonthLastDay;
            }
            
            if (months < 0) {
                years--;
                months += 12;
            }
            
            return {
                years,
                months,
                days,
                totalDays,
                totalWeeks,
                totalMonths
            };
        }
        
        function resetAgeCalculator() {
            document.getElementById('ageForm').reset();
            document.getElementById('resultContainer').style.display = 'none';
        }
        
        // Set default date to today
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('birthdate').setAttribute('max', today);
            document.getElementById('asOfDate').setAttribute('max', today);
        });
    </script>
</body>
</html>