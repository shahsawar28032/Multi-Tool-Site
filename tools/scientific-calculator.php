<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scientific Calculator | Multi-Tool Utility</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../bootstrap.min.css">
    <style>
        .calc-btn {
            height: 60px;
            font-size: 1.2rem;
        }
        .calc-display {
            height: 80px; 
            font-size: 2rem;
            text-align: right;
        }
    </style>
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
            <h1><i class="bi bi-calculator me-2"></i>Scientific Calculator</h1>
            <p class="lead">Advanced mathematical functions including trigonometry, logarithms, and exponents.</p>
        </div>

        <div class="tool-form">
            <div class="calculator">
                <div class="row mb-3">
                    <div class="col-12">
                        <input type="text" class="form-control calc-display mb-2" id="display" readonly>
                        <input type="text" class="form-control calc-display" id="history" readonly>
                    </div>
                </div>
                
                <div class="row g-2 mb-2">
                    <div class="col-3"><button class="btn btn-secondary w-100 calc-btn" onclick="clearDisplay()">C</button></div>
                    <div class="col-3"><button class="btn btn-secondary w-100 calc-btn" onclick="backspace()">⌫</button></div>
                    <div class="col-3"><button class="btn btn-secondary w-100 calc-btn" onclick="addToDisplay('%')">%</button></div>
                    <div class="col-3"><button class="btn btn-warning w-100 calc-btn" onclick="addToDisplay('/')">÷</button></div>
                </div>
                
                <div class="row g-2 mb-2">
                    <div class="col-3"><button class="btn btn-info w-100 calc-btn" onclick="addFunction('Math.sin(')">sin</button></div>
                    <div class="col-3"><button class="btn btn-info w-100 calc-btn" onclick="addFunction('Math.cos(')">cos</button></div>
                    <div class="col-3"><button class="btn btn-info w-100 calc-btn" onclick="addFunction('Math.tan(')">tan</button></div>
                    <div class="col-3"><button class="btn btn-warning w-100 calc-btn" onclick="addToDisplay('*')">×</button></div>
                </div>
                
                <div class="row g-2 mb-2">
                    <div class="col-3"><button class="btn btn-info w-100 calc-btn" onclick="addFunction('Math.log(')">log</button></div>
                    <div class="col-3"><button class="btn btn-info w-100 calc-btn" onclick="addFunction('Math.log10(')">log10</button></div>
                    <div class="col-3"><button class="btn btn-info w-100 calc-btn" onclick="addFunction('Math.sqrt(')">√</button></div>
                    <div class="col-3"><button class="btn btn-warning w-100 calc-btn" onclick="addToDisplay('-')">-</button></div>
                </div>
                
                <div class="row g-2 mb-2">
                    <div class="col-3"><button class="btn btn-info w-100 calc-btn" onclick="addToDisplay('Math.PI')">π</button></div>
                    <div class="col-3"><button class="btn btn-info w-100 calc-btn" onclick="addToDisplay('Math.E')">e</button></div>
                    <div class="col-3"><button class="btn btn-info w-100 calc-btn" onclick="addToDisplay('**')">^</button></div>
                    <div class="col-3"><button class="btn btn-warning w-100 calc-btn" onclick="addToDisplay('+')">+</button></div>
                </div>
                
                <div class="row g-2 mb-2">
                    <div class="col-6"><button class="btn btn-light w-100 calc-btn" onclick="addToDisplay('(')">(</button></div>
                    <div class="col-6"><button class="btn btn-light w-100 calc-btn" onclick="addToDisplay(')')">)</button></div>
                </div>
                
                <div class="row g-2">
                    <div class="col-9">
                        <div class="row g-2">
                            <div class="col-4"><button class="btn btn-light w-100 calc-btn" onclick="addToDisplay('7')">7</button></div>
                            <div class="col-4"><button class="btn btn-light w-100 calc-btn" onclick="addToDisplay('8')">8</button></div>
                            <div class="col-4"><button class="btn btn-light w-100 calc-btn" onclick="addToDisplay('9')">9</button></div>
                        </div>
                        <div class="row g-2 mt-2">
                            <div class="col-4"><button class="btn btn-light w-100 calc-btn" onclick="addToDisplay('4')">4</button></div>
                            <div class="col-4"><button class="btn btn-light w-100 calc-btn" onclick="addToDisplay('5')">5</button></div>
                            <div class="col-4"><button class="btn btn-light w-100 calc-btn" onclick="addToDisplay('6')">6</button></div>
                        </div>
                        <div class="row g-2 mt-2">
                            <div class="col-4"><button class="btn btn-light w-100 calc-btn" onclick="addToDisplay('1')">1</button></div>
                            <div class="col-4"><button class="btn btn-light w-100 calc-btn" onclick="addToDisplay('2')">2</button></div>
                            <div class="col-4"><button class="btn btn-light w-100 calc-btn" onclick="addToDisplay('3')">3</button></div>
                        </div>
                        <div class="row g-2 mt-2">
                            <div class="col-4"><button class="btn btn-light w-100 calc-btn" onclick="addToDisplay('0')">0</button></div>
                            <div class="col-4"><button class="btn btn-light w-100 calc-btn" onclick="addToDisplay('.')">.</button></div>
                            <div class="col-4"><button class="btn btn-light w-100 calc-btn" onclick="addToDisplay('00')">00</button></div>
                        </div>
                    </div>
                    <div class="col-3">
                        <button class="btn btn-success w-100 h-100 calc-btn" onclick="calculate()">=</button>
                    </div>
                </div>
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
        let currentInput = '';
        let historyInput = '';
        
        function addToDisplay(value) {
            currentInput += value;
            document.getElementById('display').value = currentInput;
        }
        
        function addFunction(func) {
            currentInput += func;
            document.getElementById('display').value = currentInput + ')';
        }
        
        function clearDisplay() {
            currentInput = '';
            historyInput = '';
            document.getElementById('display').value = '';
            document.getElementById('history').value = '';
        }
        
        function backspace() {
            currentInput = currentInput.slice(0, -1);
            document.getElementById('display').value = currentInput;
        }
        
        function calculate() {
            try {
                historyInput = currentInput;
                document.getElementById('history').value = historyInput;
                
                // Replace ^ with ** for exponentiation
                currentInput = currentInput.replace(/\^/g, '**');
                
                // Handle percentage
                currentInput = currentInput.replace(/(\d+)%/g, '($1/100)');
                
                // Evaluate the expression
                const result = eval(currentInput);
                
                currentInput = result.toString();
                document.getElementById('display').value = currentInput;
            } catch (error) {
                document.getElementById('display').value = 'Error';
                currentInput = '';
            }
        }
        
        // Keyboard support
        document.addEventListener('keydown', function(event) {
            const key = event.key;
            
            if (/[0-9+\-*/.%()]/.test(key)) {
                addToDisplay(key);
            } else if (key === 'Enter') {
                calculate();
            } else if (key === 'Backspace') {
                backspace();
            } else if (key === 'Escape') {
                clearDisplay();
            }
        });
    </script>
</body>
</html>