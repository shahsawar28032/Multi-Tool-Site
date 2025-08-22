<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date Difference Calculator | Multi-Tool Utility</title>
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
            <h1><i class="bi bi-calendar-range me-2"></i>Date Difference Calculator</h1>
            <p class="lead">Calculate the duration between two dates in years, months, and days.</p>
        </div>

        <div class="tool-form">
            <form id="dateDiffForm">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="startDate" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="startDate" required>
                    </div>
                    <div class="col-md-6">
                        <label for="endDate" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="endDate" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Calculate Difference</button>
            </form>

            <div class="result-container mt-4" id="resultContainer" style="display: none;">
                <h4>Date Difference Result</h4>
                <div id="result"></div>
                <button class="btn btn-outline-secondary mt-3" onclick="resetDateDiffCalculator()">Calculate Another</button>
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
        document.getElementById('dateDiffForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const startDate = new Date(document.getElementById('startDate').value);
            const endDate = new Date(document.getElementById('endDate').value);
            
            if (startDate > endDate) {
                document.getElementById('result').innerHTML = `
                    <div class="alert alert-danger">Start date must be before end date!</div>
                `;
                document.getElementById('resultContainer').style.display = 'block';
                return;
            }
            
            const diff = calculateDateDifference(startDate, endDate);
            
            document.getElementById('result').innerHTML = `
                <p><strong>Total Difference:</strong></p>
                <p>${diff.years} years, ${diff.months} months, ${diff.days} days</p>
                <p><strong>In Months:</strong> ${diff.totalMonths} months</p>
                <p><strong>In Weeks:</strong> ${diff.totalWeeks} weeks</p>
                <p><strong>In Days:</strong> ${diff.totalDays} days</p>
            `;
            document.getElementById('resultContainer').style.display = 'block';
        });
        
        function calculateDateDifference(startDate, endDate) {
            // Calculate total difference in milliseconds
            const diff = endDate - startDate;
            
            // Calculate total days
            const totalDays = Math.floor(diff / (1000 * 60 * 60 * 24));
            const totalWeeks = Math.floor(totalDays / 7);
            const totalMonths = Math.floor(totalDays / 30.44); // Average month length
            
            // Calculate years, months, days
            let years = endDate.getFullYear() - startDate.getFullYear();
            let months = endDate.getMonth() - startDate.getMonth();
            let days = endDate.getDate() - startDate.getDate();
            
            // Adjust for negative months or days
            if (days < 0) {
                months--;
                // Get days in previous month
                const prevMonthLastDay = new Date(
                    endDate.getFullYear(),
                    endDate.getMonth(),
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
        
        function resetDateDiffCalculator() {
            document.getElementById('dateDiffForm').reset();
            document.getElementById('resultContainer').style.display = 'none';
        }
        
        // Set default dates
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('endDate').value = today;
            
            // Set start date to 1 year before today
            const oneYearAgo = new Date();
            oneYearAgo.setFullYear(oneYearAgo.getFullYear() - 1);
            document.getElementById('startDate').value = oneYearAgo.toISOString().split('T')[0];
        });
    </script>
</body>
</html>