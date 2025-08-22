<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan EMI Calculator | Multi-Tool Utility</title>
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
            <h1><i class="bi bi-cash-coin me-2"></i>Loan EMI Calculator</h1>
            <p class="lead">Calculate your Equated Monthly Installment for loans with different interest rates.</p>
        </div>

        <div class="tool-form">
            <form id="emiForm">
                <div class="mb-3">
                    <label for="loanAmount" class="form-label">Loan Amount</label>
                    <div class="input-group">
                        <span class="input-group-text">$</span>
                        <input type="number" class="form-control" id="loanAmount" min="100" max="10000000" step="100" required>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="interestRate" class="form-label">Interest Rate (% per annum)</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="interestRate" min="0.1" max="50" step="0.01" required>
                        <span class="input-group-text">%</span>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="loanTerm" class="form-label">Loan Term</label>
                    <div class="row">
                        <div class="col-6">
                            <input type="number" class="form-control" id="loanTerm" min="1" max="50" required>
                        </div>
                        <div class="col-6">
                            <select class="form-select" id="termUnit">
                                <option value="years">Years</option>
                                <option value="months">Months</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary w-100">Calculate EMI</button>
            </form>

            <div class="result-container mt-4" id="resultContainer" style="display: none;">
                <h4>Loan EMI Details</h4>
                <div id="result"></div>
                <button class="btn btn-outline-secondary mt-3" onclick="resetEmiCalculator()">Calculate Another</button>
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
        document.getElementById('emiForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const loanAmount = parseFloat(document.getElementById('loanAmount').value);
            const interestRate = parseFloat(document.getElementById('interestRate').value);
            let loanTerm = parseFloat(document.getElementById('loanTerm').value);
            const termUnit = document.getElementById('termUnit').value;
            
            // Convert loan term to months if in years
            if (termUnit === 'years') {
                loanTerm *= 12;
            }
            
            // Calculate monthly interest rate
            const monthlyRate = interestRate / 12 / 100;
            
            // Calculate EMI using the formula: P * r * (1 + r)^n / ((1 + r)^n - 1)
            const emi = loanAmount * monthlyRate * Math.pow(1 + monthlyRate, loanTerm) / 
                        (Math.pow(1 + monthlyRate, loanTerm) - 1);
            
            // Calculate total payment and total interest
            const totalPayment = emi * loanTerm;
            const totalInterest = totalPayment - loanAmount;
            
            // Display results
            document.getElementById('result').innerHTML = `
                <p><strong>Monthly EMI:</strong> $${emi.toFixed(2)}</p>
                <p><strong>Total Payment:</strong> $${totalPayment.toFixed(2)}</p>
                <p><strong>Total Interest:</strong> $${totalInterest.toFixed(2)}</p>
                <p><strong>Loan Term:</strong> ${loanTerm} months (${(loanTerm/12).toFixed(1)} years)</p>
            `;
            
            document.getElementById('resultContainer').style.display = 'block';
        });
        
        function resetEmiCalculator() {
            document.getElementById('emiForm').reset();
            document.getElementById('resultContainer').style.display = 'none';
        }
    </script>
</body>
</html>