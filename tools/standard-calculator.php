<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Standard Calculator | Multi-Tool Utility</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../bootstrap.min.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                <i class="bi bi-tools me-2"></i>Multi-Tool Utility
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Tool Content -->
    <div class="tool-container my-5">
        <div class="tool-header">
            <h1><i class="bi bi-calculator-fill me-2"></i>Standard Calculator</h1>
            <p class="lead">Perform basic arithmetic operations like addition, subtraction, multiplication, and division.</p>
        </div>

        <div class="tool-form">
            <form id="calculatorForm">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="num1" class="form-label">First Number</label>
                        <input type="number" class="form-control" id="num1" step="any" required>
                    </div>
                    <div class="col-md-6">
                        <label for="operation" class="form-label">Operation</label>
                        <select class="form-select" id="operation" required>
                            <option value="add">Addition (+)</option>
                            <option value="subtract">Subtraction (-)</option>
                            <option value="multiply">Multiplication (×)</option>
                            <option value="divide">Division (÷)</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="num2" class="form-label">Second Number</label>
                    <input type="number" class="form-control" id="num2" step="any" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Calculate</button>
            </form>

            <div class="result-container" id="resultContainer">
                <h4>Result</h4>
                <div id="result"></div>
                <button class="btn btn-outline-secondary mt-3" onclick="resetCalculator()">Reset</button>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="../index.php" class="btn btn-outline-primary">
                <i class="bi bi-arrow-left me-1"></i> Back to Home
            </a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">&copy; <?php echo date("Y"); ?> Multi-Tool Utility. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Calculator Script -->
    <script>
        document.getElementById('calculatorForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get input values
            const num1 = parseFloat(document.getElementById('num1').value);
            const num2 = parseFloat(document.getElementById('num2').value);
            const operation = document.getElementById('operation').value;
            
            let result;
            let operationSymbol;
            
            // Perform calculation
            switch(operation) {
                case 'add':
                    result = num1 + num2;
                    operationSymbol = '+';
                    break;
                case 'subtract':
                    result = num1 - num2;
                    operationSymbol = '-';
                    break;
                case 'multiply':
                    result = num1 * num2;
                    operationSymbol = '×';
                    break;
                case 'divide':
                    if(num2 === 0) {
                        result = 'Error: Division by zero';
                    } else {
                        result = num1 / num2;
                        operationSymbol = '÷';
                    }
                    break;
                default:
                    result = 'Invalid operation';
            }
            
            // Display result
            const resultContainer = document.getElementById('resultContainer');
            const resultElement = document.getElementById('result');
            
            if(typeof result === 'number') {
                resultElement.innerHTML = `
                    <p>${num1} ${operationSymbol} ${num2} = <strong>${result}</strong></p>
                `;
            } else {
                resultElement.innerHTML = `<p class="text-danger">${result}</p>`;
            }
            
            resultContainer.style.display = 'block';
        });
        
        function resetCalculator() {
            document.getElementById('calculatorForm').reset();
            document.getElementById('resultContainer').style.display = 'none';
        }
    </script>
</body>
</html>