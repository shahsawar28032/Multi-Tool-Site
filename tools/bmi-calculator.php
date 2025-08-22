<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator | Multi-Tool Utility</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
         <link rel="stylesheet" href="../bootstrap.min.css">

    <style>
        .bmi-category {
            font-weight: 500;
            padding: 0.5rem;
            border-radius: 5px;
            margin-top: 1rem;
        }
        .underweight { background-color: #5bc0de; color: white; }
        .normal { background-color: #5cb85c; color: white; }
        .overweight { background-color: #f0ad4e; color: white; }
        .obese { background-color: #d9534f; color: white; }
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
            <h1><i class="bi bi-person-bounding-box me-2"></i>BMI Calculator</h1>
            <p class="lead">Calculate your Body Mass Index based on height and weight measurements.</p>
        </div>

        <div class="tool-form">
            <form id="bmiForm">
                <div class="mb-3">
                    <label class="form-label">Measurement System</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="unitSystem" id="metricSystem" value="metric" checked>
                        <label class="form-check-label" for="metricSystem">Metric (cm, kg)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="unitSystem" id="imperialSystem" value="imperial">
                        <label class="form-check-label" for="imperialSystem">Imperial (in, lb)</label>
                    </div>
                </div>
                
                <div id="metricFields">
                    <div class="mb-3">
                        <label for="heightCm" class="form-label">Height (cm)</label>
                        <input type="number" class="form-control" id="heightCm" min="50" max="300" step="0.1" required>
                    </div>
                    <div class="mb-3">
                        <label for="weightKg" class="form-label">Weight (kg)</label>
                        <input type="number" class="form-control" id="weightKg" min="10" max="500" step="0.1" required>
                    </div>
                </div>
                
                <div id="imperialFields" style="display: none;">
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="heightFeet" class="form-label">Height (feet)</label>
                            <input type="number" class="form-control" id="heightFeet" min="2" max="10" step="1">
                        </div>
                        <div class="col-6">
                            <label for="heightInches" class="form-label">Height (inches)</label>
                            <input type="number" class="form-control" id="heightInches" min="0" max="11" step="1">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="weightLb" class="form-label">Weight (pounds)</label>
                        <input type="number" class="form-control" id="weightLb" min="20" max="1000" step="0.1">
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary w-100">Calculate BMI</button>
            </form>

            <div class="result-container mt-4" id="resultContainer" style="display: none;">
                <h4>BMI Result</h4>
                <div id="result"></div>
                <div id="bmiCategory" class="bmi-category"></div>
                <button class="btn btn-outline-secondary mt-3" onclick="resetBmiCalculator()">Calculate Another</button>
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
        // Toggle between metric and imperial units
        document.querySelectorAll('input[name="unitSystem"]').forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.value === 'metric') {
                    document.getElementById('metricFields').style.display = 'block';
                    document.getElementById('imperialFields').style.display = 'none';
                } else {
                    document.getElementById('metricFields').style.display = 'none';
                    document.getElementById('imperialFields').style.display = 'block';
                }
            });
        });
        
        document.getElementById('bmiForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const unitSystem = document.querySelector('input[name="unitSystem"]:checked').value;
            let height, weight, bmi;
            
            if (unitSystem === 'metric') {
                height = parseFloat(document.getElementById('heightCm').value) / 100; // Convert cm to m
                weight = parseFloat(document.getElementById('weightKg').value);
            } else {
                const feet = parseFloat(document.getElementById('heightFeet').value);
                const inches = parseFloat(document.getElementById('heightInches').value);
                height = (feet * 12 + inches) * 0.0254; // Convert to meters
                weight = parseFloat(document.getElementById('weightLb').value) * 0.453592; // Convert to kg
            }
            
            // Calculate BMI
            bmi = weight / (height * height);
            
            // Display result
            document.getElementById('result').innerHTML = `
                <p><strong>BMI:</strong> ${bmi.toFixed(1)}</p>
                <p><strong>Weight Category:</strong></p>
            `;
            
            // Determine category
            const categoryElement = document.getElementById('bmiCategory');
            let categoryClass, categoryText;
            
            if (bmi < 18.5) {
                categoryClass = 'underweight';
                categoryText = 'Underweight (BMI < 18.5)';
            } else if (bmi < 25) {
                categoryClass = 'normal';
                categoryText = 'Normal weight (BMI 18.5-24.9)';
            } else if (bmi < 30) {
                categoryClass = 'overweight';
                categoryText = 'Overweight (BMI 25-29.9)';
            } else {
                categoryClass = 'obese';
                categoryText = 'Obese (BMI ≥ 30)';
            }
            
            categoryElement.className = `bmi-category ${categoryClass}`;
            categoryElement.textContent = categoryText;
            
            document.getElementById('resultContainer').style.display = 'block';
        });
        
        function resetBmiCalculator() {
            document.getElementById('bmiForm').reset();
            document.getElementById('resultContainer').style.display = 'none';
        }
    </script>
</body>
</html>