<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Percentage Calculator | Multi-Tool Utility</title>
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
            <h1><i class="bi bi-percent me-2"></i>Percentage Calculator</h1>
            <p class="lead">Calculate percentages, increases, decreases, and differences between values.</p>
        </div>

        <div class="tool-form">
            <ul class="nav nav-tabs" id="percentageTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="percentage-of-tab" data-bs-toggle="tab" data-bs-target="#percentage-of" type="button">Percentage of</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="increase-decrease-tab" data-bs-toggle="tab" data-bs-target="#increase-decrease" type="button">Increase/Decrease</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="difference-tab" data-bs-toggle="tab" data-bs-target="#difference" type="button">Difference</button>
                </li>
            </ul>
            
            <div class="tab-content p-3 border border-top-0 rounded-bottom" id="percentageTabContent">
                <!-- Percentage of -->
                <div class="tab-pane fade show active" id="percentage-of" role="tabpanel">
                    <form id="percentageOfForm">
                        <div class="mb-3">
                            <label for="baseValue" class="form-label">Base Value</label>
                            <input type="number" class="form-control" id="baseValue" step="any" required>
                        </div>
                        <div class="mb-3">
                            <label for="percentage" class="form-label">Percentage</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="percentage" step="any" required>
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Calculate</button>
                    </form>
                    
                    <div class="result-container mt-3" id="percentageOfResult" style="display: none;">
                        <div id="percentageOfResultText"></div>
                        <button class="btn btn-outline-secondary mt-3" onclick="resetPercentageOf()">Reset</button>
                    </div>
                </div>
                
                <!-- Increase/Decrease -->
                <div class="tab-pane fade" id="increase-decrease" role="tabpanel">
                    <form id="increaseDecreaseForm">
                        <div class="mb-3">
                            <label for="originalValue" class="form-label">Original Value</label>
                            <input type="number" class="form-control" id="originalValue" step="any" required>
                        </div>
                        <div class="mb-3">
                            <label for="changePercentage" class="form-label">Percentage Change</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="changePercentage" step="any" required>
                                <span class="input-group-text">%</span>
                            </div>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="radio" name="changeType" id="increase" value="increase" checked>
                                <label class="form-check-label" for="increase">Increase</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="changeType" id="decrease" value="decrease">
                                <label class="form-check-label" for="decrease">Decrease</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Calculate</button>
                    </form>
                    
                    <div class="result-container mt-3" id="increaseDecreaseResult" style="display: none;">
                        <div id="increaseDecreaseResultText"></div>
                        <button class="btn btn-outline-secondary mt-3" onclick="resetIncreaseDecrease()">Reset</button>
                    </div>
                </div>
                
                <!-- Difference -->
                <div class="tab-pane fade" id="difference" role="tabpanel">
                    <form id="differenceForm">
                        <div class="mb-3">
                            <label for="value1" class="form-label">First Value</label>
                            <input type="number" class="form-control" id="value1" step="any" required>
                        </div>
                        <div class="mb-3">
                            <label for="value2" class="form-label">Second Value</label>
                            <input type="number" class="form-control" id="value2" step="any" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Calculate</button>
                    </form>
                    
                    <div class="result-container mt-3" id="differenceResult" style="display: none;">
                        <div id="differenceResultText"></div>
                        <button class="btn btn-outline-secondary mt-3" onclick="resetDifference()">Reset</button>
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
        // Percentage of calculation
        document.getElementById('percentageOfForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const baseValue = parseFloat(document.getElementById('baseValue').value);
            const percentage = parseFloat(document.getElementById('percentage').value);
            
            const result = (baseValue * percentage) / 100;
            
            document.getElementById('percentageOfResultText').innerHTML = `
                <p><strong>${percentage}% of ${baseValue} is:</strong> ${result}</p>
                <p>Calculation: ${baseValue} × ${percentage} ÷ 100 = ${result}</p>
            `;
            document.getElementById('percentageOfResult').style.display = 'block';
        });
        
        function resetPercentageOf() {
            document.getElementById('percentageOfForm').reset();
            document.getElementById('percentageOfResult').style.display = 'none';
        }
        
        // Increase/Decrease calculation
        document.getElementById('increaseDecreaseForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const originalValue = parseFloat(document.getElementById('originalValue').value);
            const percentage = parseFloat(document.getElementById('changePercentage').value);
            const isIncrease = document.getElementById('increase').checked;
            
            let changeAmount, newValue;
            
            if (isIncrease) {
                changeAmount = (originalValue * percentage) / 100;
                newValue = originalValue + changeAmount;
                
                document.getElementById('increaseDecreaseResultText').innerHTML = `
                    <p><strong>${originalValue} increased by ${percentage}% is:</strong> ${newValue}</p>
                    <p>Calculation: ${originalValue} + (${originalValue} × ${percentage} ÷ 100) = ${newValue}</p>
                `;
            } else {
                changeAmount = (originalValue * percentage) / 100;
                newValue = originalValue - changeAmount;
                
                document.getElementById('increaseDecreaseResultText').innerHTML = `
                    <p><strong>${originalValue} decreased by ${percentage}% is:</strong> ${newValue}</p>
                    <p>Calculation: ${originalValue} - (${originalValue} × ${percentage} ÷ 100) = ${newValue}</p>
                `;
            }
            
            document.getElementById('increaseDecreaseResult').style.display = 'block';
        });
        
        function resetIncreaseDecrease() {
            document.getElementById('increaseDecreaseForm').reset();
            document.getElementById('increaseDecreaseResult').style.display = 'none';
        }
        
        // Difference calculation
        document.getElementById('differenceForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const value1 = parseFloat(document.getElementById('value1').value);
            const value2 = parseFloat(document.getElementById('value2').value);
            
            const difference = Math.abs(value1 - value2);
            const percentageDifference = (difference / ((value1 + value2) / 2)) * 100;
            
            document.getElementById('differenceResultText').innerHTML = `
                <p><strong>Absolute Difference:</strong> ${difference}</p>
                <p><strong>Percentage Difference:</strong> ${percentageDifference.toFixed(2)}%</p>
                <p>Calculation: (|${value1} - ${value2}| ÷ ((${value1} + ${value2}) ÷ 2)) × 100 = ${percentageDifference.toFixed(2)}%</p>
            `;
            document.getElementById('differenceResult').style.display = 'block';
        });
        
        function resetDifference() {
            document.getElementById('differenceForm').reset();
            document.getElementById('differenceResult').style.display = 'none';
        }
    </script>
</body>
</html>