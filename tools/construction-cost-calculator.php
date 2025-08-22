<?php
$theme = isset($_COOKIE['site_theme']) ? $_COOKIE['site_theme'] : 'light';
?>
<!DOCTYPE html>
<html lang="en" data-theme="<?php echo htmlspecialchars($theme); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Construction Cost Calculator | Multi-Tool Utility</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../bootstrap.min.css">
    <style>
        .construction-image {
            background: url('https://www.zameen.com/blog/wp-content/uploads/2023/04/house-construction-cost-calculator-1-1024x576.jpg') center/cover;
            height: 200px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .quality-option {
            cursor: pointer;
            transition: all 0.3s;
        }
        .quality-option:hover {
            transform: translateY(-3px);
        }
        .quality-option.active {
            border: 2px solid var(--primary-color);
            box-shadow: 0 5px 15px rgba(13, 110, 253, 0.2);
        }
    </style>
</head>
<body>
    <!-- Navigation (Same as your other tools) -->
    <?php //include '../header.php'; ?>

     <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                <i class="bi bi-tools me-2"></i>Multi-Tool Utility
            </a>
        </div>
    </nav>

    <div class="tool-container my-5">
        <div class="tool-header">
            <h1><i class="bi bi-house-gear me-2"></i>Construction Cost Calculator</h1>
            <p class="lead">Estimate your house construction costs based on area and quality specifications.</p>
        </div>

        <!-- <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="construction-image"></div> -->
                 <div class="text-center mt-4">
            <a href="../index.php" class="btn btn-outline-primary">
                <i class="bi bi-arrow-left me-1"></i> Back to Home
            </a>
        </div>
    
                <div class="tool-form">
                    <form id="constructionForm">
                        <div class="row mb-4">
                            <div class="col-md-6 mb-3">
                                <label for="area" class="form-label">Total Area (sq ft)</label>
                                <input type="number" class="form-control" id="area" min="100" step="50" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="floors" class="form-label">Number of Floors</label>
                                <select class="form-select" id="floors" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5+</option>
                                </select>
                            </div>
                        </div>

                        <h5 class="mb-3">Construction Quality</h5>
                        <div class="row mb-4">
                            <div class="col-md-4 mb-3">
                                <div class="card quality-option p-3 text-center" data-quality="economy">
                                    <i class="bi bi-house-door text-warning" style="font-size: 2rem;"></i>
                                    <h6>Economy</h6>
                                    <small class="text-muted">PKR 1,500-2,500/sq ft</small>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card quality-option p-3 text-center active" data-quality="standard">
                                    <i class="bi bi-house text-primary" style="font-size: 2rem;"></i>
                                    <h6>Standard</h6>
                                    <small class="text-muted">PKR 2,500-3,500/sq ft</small>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card quality-option p-3 text-center" data-quality="luxury">
                                    <i class="bi bi-house-heart text-danger" style="font-size: 2rem;"></i>
                                    <h6>Luxury</h6>
                                    <small class="text-muted">PKR 3,500-5,000+/sq ft</small>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="location" class="form-label">Location Factor</label>
                            <select class="form-select" id="location">
                                <option value="1.0">Major City (Karachi, Lahore, Islamabad)</option>
                                <option value="0.9">Other Urban Area</option>
                                <option value="0.8">Rural Area</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-3">Calculate Estimated Cost</button>
                    </form>

                    <div class="result-container mt-4" id="resultContainer" style="display: none;">
                        <h4>Construction Estimate</h4>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h6>Total Area</h6>
                                        <p class="h4" id="resultArea">0 sq ft</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h6>Cost Per Sq Ft</h6>
                                        <p class="h4" id="resultRate">PKR 0</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <h5>Estimated Total Cost</h5>
                                <p class="display-5 fw-bold text-primary" id="resultTotal">PKR 0</p>
                                <small class="text-muted">* This is an approximate estimate</small>
                            </div>
                        </div>
                        <button class="btn btn-outline-secondary mt-3 w-100" onclick="resetCalculator()">New Calculation</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">&copy; <?php echo date("Y"); ?> Multi-Tool Utility. All rights reserved.</p>
        </div>
    </footer>
    <!-- <?php //include '../footer.php'; ?> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Quality selection
        document.querySelectorAll('.quality-option').forEach(option => {
            option.addEventListener('click', function() {
                document.querySelectorAll('.quality-option').forEach(opt => opt.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Form submission
        document.getElementById('constructionForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get inputs
            const area = parseFloat(document.getElementById('area').value);
            const floors = parseInt(document.getElementById('floors').value);
            const locationFactor = parseFloat(document.getElementById('location').value);
            const quality = document.querySelector('.quality-option.active').dataset.quality;
            
            // Calculate cost
            let ratePerSqFt;
            switch(quality) {
                case 'economy':
                    ratePerSqFt = 2000 * locationFactor;
                    break;
                case 'luxury':
                    ratePerSqFt = 4250 * locationFactor;
                    break;
                default: // standard
                    ratePerSqFt = 3000 * locationFactor;
            }
            
            // Adjust for floors (simplified)
            const floorMultiplier = floors > 2 ? 1 + (floors * 0.05) : 1;
            const totalCost = area * ratePerSqFt * floorMultiplier;
            
            // Display results
            document.getElementById('resultArea').textContent = area.toLocaleString() + ' sq ft';
            document.getElementById('resultRate').textContent = 'PKR ' + Math.round(ratePerSqFt).toLocaleString();
            document.getElementById('resultTotal').textContent = 'PKR ' + Math.round(totalCost).toLocaleString();
            document.getElementById('resultContainer').style.display = 'block';
            
            // Scroll to results
            document.getElementById('resultContainer').scrollIntoView({ behavior: 'smooth' });
        });
        
        function resetCalculator() {
            document.getElementById('constructionForm').reset();
            document.getElementById('resultContainer').style.display = 'none';
            document.querySelector('.quality-option[data-quality="standard"]').click();
        }
    </script>
</body>
</html>