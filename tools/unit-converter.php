<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unit Converter | Multi-Tool Utility</title>
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
            <h1><i class="bi bi-arrow-left-right me-2"></i>Unit Converter</h1>
            <p class="lead">Convert between different units of length, weight, and temperature.</p>
        </div>

        <div class="tool-form">
            <form id="converterForm">
                <div class="row mb-3">
                    <div class="col-md-5">
                        <label for="value" class="form-label">Value</label>
                        <input type="number" class="form-control" id="value" step="any" required>
                    </div>
                    <div class="col-md-5">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" id="category" required>
                            <option value="length">Length</option>
                            <option value="weight">Weight</option>
                            <option value="temperature">Temperature</option>
                        </select>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-5">
                        <label for="fromUnit" class="form-label">From Unit</label>
                        <select class="form-select" id="fromUnit" required>
                            <!-- Options will be populated by JavaScript -->
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label for="toUnit" class="form-label">To Unit</label>
                        <select class="form-select" id="toUnit" required>
                            <!-- Options will be populated by JavaScript -->
                        </select>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100">Convert</button>
                    </div>
                </div>
            </form>

            <div class="result-container" id="resultContainer">
                <h4>Conversion Result</h4>
                <div id="result"></div>
                <button class="btn btn-outline-secondary mt-3" onclick="resetConverter()">Reset</button>
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
    
    <!-- Unit Converter Script -->
    <script>
        // Unit definitions
        const units = {
            length: [
                { name: 'Millimeter', value: 'mm', factor: 0.001 },
                { name: 'Centimeter', value: 'cm', factor: 0.01 },
                { name: 'Meter', value: 'm', factor: 1 },
                { name: 'Kilometer', value: 'km', factor: 1000 },
                { name: 'Inch', value: 'in', factor: 0.0254 },
                { name: 'Foot', value: 'ft', factor: 0.3048 },
                { name: 'Yard', value: 'yd', factor: 0.9144 },
                { name: 'Mile', value: 'mi', factor: 1609.344 }
            ],
            weight: [
                { name: 'Milligram', value: 'mg', factor: 0.001 },
                { name: 'Gram', value: 'g', factor: 1 },
                { name: 'Kilogram', value: 'kg', factor: 1000 },
                { name: 'Tonne', value: 't', factor: 1000000 },
                { name: 'Ounce', value: 'oz', factor: 28.3495 },
                { name: 'Pound', value: 'lb', factor: 453.592 },
                { name: 'Stone', value: 'st', factor: 6350.29 }
            ],
            temperature: [
                { name: 'Celsius', value: '°C' },
                { name: 'Fahrenheit', value: '°F' },
                { name: 'Kelvin', value: 'K' }
            ]
        };
        
        // Populate unit dropdowns based on category
        document.getElementById('category').addEventListener('change', function() {
            const category = this.value;
            const fromUnitSelect = document.getElementById('fromUnit');
            const toUnitSelect = document.getElementById('toUnit');
            
            // Clear existing options
            fromUnitSelect.innerHTML = '';
            toUnitSelect.innerHTML = '';
            
            // Add new options
            units[category].forEach(unit => {
                const option1 = document.createElement('option');
                option1.value = unit.value;
                option1.textContent = `${unit.name} (${unit.value})`;
                fromUnitSelect.appendChild(option1);
                
                const option2 = document.createElement('option');
                option2.value = unit.value;
                option2.textContent = `${unit.name} (${unit.value})`;
                toUnitSelect.appendChild(option2);
            });
            
            // Set default "to" unit to be different from "from" unit
            if (units[category].length > 1) {
                toUnitSelect.selectedIndex = 1;
            }
        });
        
        // Initialize with length units
        document.getElementById('category').dispatchEvent(new Event('change'));
        
        // Handle form submission
        document.getElementById('converterForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const value = parseFloat(document.getElementById('value').value);
            const category = document.getElementById('category').value;
            const fromUnit = document.getElementById('fromUnit').value;
            const toUnit = document.getElementById('toUnit').value;
            
            let result;
            
            if (category === 'temperature') {
                // Temperature conversion requires special handling
                result = convertTemperature(value, fromUnit, toUnit);
            } else {
                // For length and weight, we can use a common approach
                const fromFactor = units[category].find(u => u.value === fromUnit).factor;
                const toFactor = units[category].find(u => u.value === toUnit).factor;
                
                // Convert to base unit first, then to target unit
                const baseValue = value * fromFactor;
                result = baseValue / toFactor;
            }
            
            // Display result
            document.getElementById('result').innerHTML = `
                <p>${value} ${fromUnit} = <strong>${result.toFixed(6)} ${toUnit}</strong></p>
            `;
            document.getElementById('resultContainer').style.display = 'block';
        });
        
        // Temperature conversion function
        function convertTemperature(value, fromUnit, toUnit) {
            let celsius;
            
            // Convert to Celsius first
            switch(fromUnit) {
                case '°C':
                    celsius = value;
                    break;
                case '°F':
                    celsius = (value - 32) * 5/9;
                    break;
                case 'K':
                    celsius = value - 273.15;
                    break;
            }
            
            // Convert from Celsius to target unit
            switch(toUnit) {
                case '°C':
                    return celsius;
                case '°F':
                    return (celsius * 9/5) + 32;
                case 'K':
                    return celsius + 273.15;
            }
        }
        
        function resetConverter() {
            document.getElementById('converterForm').reset();
            document.getElementById('category').dispatchEvent(new Event('change'));
            document.getElementById('resultContainer').style.display = 'none';
        }
    </script>
</body>
</html>