<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discount Calculator | Multi-Tool Utility</title>
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
            <h1><i class="bi bi-tag-fill me-2"></i>Discount Calculator</h1>
            <p class="lead">Calculate final price after discount and savings amount from percentage discounts.</p>
        </div>

        <div class="tool-form">
            <form id="discountForm">
                <div class="mb-3">
                    <label for="originalPrice" class="form-label">Original Price</label>
                    <div class="input-group">
                        <span class="input-group-text">$</span>
                        <input type="number" class="form-control" id="originalPrice" min="0" step="0.01" required>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="discountPercent" class="form-label">Discount Percentage</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="discountPercent" min="0" max="100" step="0.1" required>
                        <span class="input-group-text">%</span>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary w-100">Calculate Discount</button>
            </form>

            <div class="result-container mt-4" id="resultContainer" style="display: none;">
                <h4>Discount Calculation</h4>
                <div id="result"></div>
                <button class="btn btn-outline-secondary mt-3" onclick="resetDiscountCalculator()">Calculate Another</button>
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
        document.getElementById('discountForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const originalPrice = parseFloat(document.getElementById('originalPrice').value);
            const discountPercent = parseFloat(document.getElementById('discountPercent').value);
            
            const discountAmount = (originalPrice * discountPercent) / 100;
            const finalPrice = originalPrice - discountAmount;
            
            document.getElementById('result').innerHTML = `
                <p><strong>Original Price:</strong> $${originalPrice.toFixed(2)}</p>
                <p><strong>Discount Percentage:</strong> ${discountPercent}%</p>
                <p><strong>Discount Amount:</strong> $${discountAmount.toFixed(2)}</p>
                <p><strong>Final Price:</strong> $${finalPrice.toFixed(2)}</p>
                <p><strong>You Save:</strong> $${discountAmount.toFixed(2)} (${discountPercent}%)</p>
            `;
            
            document.getElementById('resultContainer').style.display = 'block';
        });
        
        function resetDiscountCalculator() {
            document.getElementById('discountForm').reset();
            document.getElementById('resultContainer').style.display = 'none';
        }
    </script>
</body>
</html>