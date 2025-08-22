<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generator | Multi-Tool Utility</title>
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
            <h1><i class="bi bi-shield-lock me-2"></i>Password Generator</h1>
            <p class="lead">Create strong, random passwords with customizable length and character sets.</p>
        </div>

        <div class="tool-form">
            <form id="passwordForm">
                <div class="mb-3">
                    <label for="length" class="form-label">Password Length (8-64 characters)</label>
                    <input type="number" class="form-control" id="length" min="8" max="64" value="12" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Character Sets</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="uppercase" checked>
                        <label class="form-check-label" for="uppercase">Uppercase Letters (A-Z)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="lowercase" checked>
                        <label class="form-check-label" for="lowercase">Lowercase Letters (a-z)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="numbers" checked>
                        <label class="form-check-label" for="numbers">Numbers (0-9)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="symbols" checked>
                        <label class="form-check-label" for="symbols">Symbols (!@#$%^&*)</label>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary w-100">Generate Password</button>
            </form>

            <div class="result-container mt-4" id="resultContainer" style="display: none;">
                <h4>Generated Password</h4>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="generatedPassword" readonly>
                    <button class="btn btn-outline-secondary" type="button" id="copyButton">
                        <i class="bi bi-clipboard"></i> Copy
                    </button>
                </div>
                <div class="password-strength mt-2">
                    <div class="progress">
                        <div class="progress-bar" id="strengthBar" role="progressbar" style="width: 0%"></div>
                    </div>
                    <small id="strengthText" class="text-muted"></small>
                </div>
                <button class="btn btn-outline-secondary mt-3" onclick="resetGenerator()">Generate Another</button>
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
    
    <!-- Password Generator Script -->
    <script>
        document.getElementById('passwordForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form values
            const length = parseInt(document.getElementById('length').value);
            const uppercase = document.getElementById('uppercase').checked;
            const lowercase = document.getElementById('lowercase').checked;
            const numbers = document.getElementById('numbers').checked;
            const symbols = document.getElementById('symbols').checked;
            
            // Validate at least one character set is selected
            if (!uppercase && !lowercase && !numbers && !symbols) {
                alert('Please select at least one character set');
                return;
            }
            
            // Character sets
            const charSets = {
                uppercase: 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
                lowercase: 'abcdefghijklmnopqrstuvwxyz',
                numbers: '0123456789',
                symbols: '!@#$%^&*()_+-=[]{}|;:,.<>?'
            };
            
            // Build available characters string
            let availableChars = '';
            if (uppercase) availableChars += charSets.uppercase;
            if (lowercase) availableChars += charSets.lowercase;
            if (numbers) availableChars += charSets.numbers;
            if (symbols) availableChars += charSets.symbols;
            
            // Generate password
            let password = '';
            for (let i = 0; i < length; i++) {
                const randomIndex = Math.floor(Math.random() * availableChars.length);
                password += availableChars[randomIndex];
            }
            
            // Display password
            document.getElementById('generatedPassword').value = password;
            document.getElementById('resultContainer').style.display = 'block';
            
            // Calculate password strength
            calculateStrength(password);
        });
        
        // Copy to clipboard
        document.getElementById('copyButton').addEventListener('click', function() {
            const passwordField = document.getElementById('generatedPassword');
            passwordField.select();
            document.execCommand('copy');
            
            // Change button text temporarily
            const copyButton = document.getElementById('copyButton');
            copyButton.innerHTML = '<i class="bi bi-check"></i> Copied!';
            setTimeout(() => {
                copyButton.innerHTML = '<i class="bi bi-clipboard"></i> Copy';
            }, 2000);
        });
        
        // Calculate password strength
        function calculateStrength(password) {
            let strength = 0;
            const length = password.length;
            
            // Length contributes up to 50% of strength
            strength += Math.min(50, (length / 64) * 50);
            
            // Character variety contributes the rest
            const hasUppercase = /[A-Z]/.test(password);
            const hasLowercase = /[a-z]/.test(password);
            const hasNumbers = /[0-9]/.test(password);
            const hasSymbols = /[^A-Za-z0-9]/.test(password);
            
            const varietyCount = [hasUppercase, hasLowercase, hasNumbers, hasSymbols].filter(Boolean).length;
            strength += (varietyCount / 4) * 50;
            
            // Update UI
            const strengthBar = document.getElementById('strengthBar');
            const strengthText = document.getElementById('strengthText');
            
            strengthBar.style.width = `${strength}%`;
            
            if (strength < 30) {
                strengthBar.className = 'progress-bar bg-danger';
                strengthText.textContent = 'Weak';
            } else if (strength < 70) {
                strengthBar.className = 'progress-bar bg-warning';
                strengthText.textContent = 'Moderate';
            } else if (strength < 90) {
                strengthBar.className = 'progress-bar bg-info';
                strengthText.textContent = 'Strong';
            } else {
                strengthBar.className = 'progress-bar bg-success';
                strengthText.textContent = 'Very Strong';
            }
        }
        
        function resetGenerator() {
            document.getElementById('passwordForm').reset();
            document.getElementById('resultContainer').style.display = 'none';
        }
    </script>
</body>
</html>