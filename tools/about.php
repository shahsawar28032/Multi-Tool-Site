<?php
$theme = isset($_COOKIE['site_theme']) ? $_COOKIE['site_theme'] : 'light';
?>
<!DOCTYPE html>
<html lang="en" data-theme="<?php echo htmlspecialchars($theme); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-Tool Utility</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
         <link rel="stylesheet" href="../bootstrap.min.css">

</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="bi bi-tools me-2"></i>Multi-Tool Utility
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Tools
                        </a>
                        <ul class="dropdown-menu">
                            <li><h6 class="dropdown-header">Calculators</h6></li>
                            <li><a class="dropdown-item" href="tools/standard-calculator.php">
                                <i class="bi bi-calculator-fill me-2"></i>Standard Calculator
                            </a></li>
                            <li><a class="dropdown-item" href="tools/scientific-calculator.php">
                                <i class="bi bi-calculator me-2"></i>Scientific Calculator
                            </a></li>
                            <li><a class="dropdown-item" href="tools/percentage-calculator.php">
                                <i class="bi bi-percent me-2"></i>Percentage Calculator
                            </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="tools/age-calculator.php">
                                <i class="bi bi-calendar-event me-2"></i>Age Calculator
                            </a></li>
                            <li><a class="dropdown-item" href="tools/bmi-calculator.php">
                                <i class="bi bi-person-bounding-box me-2"></i>BMI Calculator
                            </a></li>
                            <li><a class="dropdown-item" href="tools/loan-emi-calculator.php">
                                <i class="bi bi-cash-coin me-2"></i>Loan Calculator
                            </a></li>
                            <li><a class="dropdown-item" href="tools/construction-cost-calculator.php">
                                <i class="bi bi-house-gear me-2"></i>Construction Cost Calculator
                            </a></li>
                            <li><a class="dropdown-item" href="tools/unit-converter.php">
                                <i class="bi bi-arrow-left-right me-2"></i>Unit Converter
                            </a></li>
                            <li><a class="dropdown-item" href="tools/date-difference.php">
                                <i class="bi bi-calendar-range me-2"></i>Date Difference
                            </a></li>
                            <li><a class="dropdown-item" href="tools/password-generator.php">
                                <i class="bi bi-shield-lock me-2"></i>Password Generator
                            </a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
                
                <!-- Theme Toggle Button -->
                <button id="themeToggle" class="btn btn-sm btn-outline-light">
                    <i class="bi bi-sun-fill theme-icon"></i>
                    <i class="bi bi-moon-fill theme-icon"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="bg-light py-5">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">Your All-in-One Utility Toolkit</h1>
            <p class="lead text-muted">Free online tools for everyday calculations and conversions</p>
        </div>
    </header>

    <!-- Tools Grid -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Available Tools</h2>
            <div class="row g-4">
                <!-- Standard Calculator -->
                <div class="col-md-6 col-lg-4">
                    <div class="card tool-card h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-calculator-fill tool-icon"></i>
                            <h3 class="card-title h5 mt-3">Standard Calculator</h3>
                            <p class="card-text">Basic arithmetic operations like addition, subtraction, multiplication, and division.</p>
                            <a href="tools/standard-calculator.php" class="btn btn-primary">Open Tool</a>
                        </div>
                    </div>
                </div>

                <!-- Scientific Calculator -->
                <div class="col-md-6 col-lg-4">
                    <div class="card tool-card h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-calculator tool-icon"></i>
                            <h3 class="card-title h5 mt-3">Scientific Calculator</h3>
                            <p class="card-text">Advanced mathematical functions including trigonometry, logarithms, and exponents.</p>
                            <a href="tools/scientific-calculator.php" class="btn btn-primary">Open Tool</a>
                        </div>
                    </div>
                </div>

                <!-- Age Calculator -->
                <div class="col-md-6 col-lg-4">
                    <div class="card tool-card h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-calendar-event-fill tool-icon"></i>
                            <h3 class="card-title h5 mt-3">Age Calculator</h3>
                            <p class="card-text">Calculate your exact age in years, months, and days from your birth date.</p>
                            <a href="tools/age-calculator.php" class="btn btn-primary">Open Tool</a>
                        </div>
                    </div>
                </div>

                <!-- BMI Calculator -->
                <div class="col-md-6 col-lg-4">
                    <div class="card tool-card h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-person-bounding-box tool-icon"></i>
                            <h3 class="card-title h5 mt-3">BMI Calculator</h3>
                            <p class="card-text">Calculate your Body Mass Index based on height and weight measurements.</p>
                            <a href="tools/bmi-calculator.php" class="btn btn-primary">Open Tool</a>
                        </div>
                    </div>
                </div>

                <!-- Loan EMI Calculator -->
                <div class="col-md-6 col-lg-4">
                    <div class="card tool-card h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-cash-coin tool-icon"></i>
                            <h3 class="card-title h5 mt-3">Loan EMI Calculator</h3>
                            <p class="card-text">Calculate your Equated Monthly Installment for loans with different interest rates.</p>
                            <a href="tools/loan-emi-calculator.php" class="btn btn-primary">Open Tool</a>
                        </div>
                    </div>
                </div>

                <!-- Construction Cost Calculator -->
                <div class="col-md-6 col-lg-4">
                    <div class="card tool-card h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-house-gear tool-icon"></i>
                            <h3 class="card-title h5 mt-3">Construction Cost Calculator</h3>
                            <p class="card-text">Estimate your house construction costs based on area and quality specifications.</p>
                            <a href="tools/construction-cost-calculator.php" class="btn btn-primary">Open Tool</a>
                        </div>
                    </div>
                </div>

                <!-- Percentage Calculator -->
                <div class="col-md-6 col-lg-4">
                    <div class="card tool-card h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-percent tool-icon"></i>
                            <h3 class="card-title h5 mt-3">Percentage Calculator</h3>
                            <p class="card-text">Calculate percentages, increases, decreases, and differences between values.</p>
                            <a href="tools/percentage-calculator.php" class="btn btn-primary">Open Tool</a>
                        </div>
                    </div>
                </div>

                <!-- Discount Calculator -->
                <div class="col-md-6 col-lg-4">
                    <div class="card tool-card h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-tag-fill tool-icon"></i>
                            <h3 class="card-title h5 mt-3">Discount Calculator</h3>
                            <p class="card-text">Calculate final price after discount and savings amount from percentage discounts.</p>
                            <a href="tools/discount-calculator.php" class="btn btn-primary">Open Tool</a>
                        </div>
                    </div>
                </div>

                <!-- Unit Converter -->
                <div class="col-md-6 col-lg-4">
                    <div class="card tool-card h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-arrow-left-right tool-icon"></i>
                            <h3 class="card-title h5 mt-3">Unit Converter</h3>
                            <p class="card-text">Convert between different units of length, weight, temperature, and more.</p>
                            <a href="tools/unit-converter.php" class="btn btn-primary">Open Tool</a>
                        </div>
                    </div>
                </div>

                <!-- Date Difference Calculator -->
                <div class="col-md-6 col-lg-4">
                    <div class="card tool-card h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-calendar-range tool-icon"></i>
                            <h3 class="card-title h5 mt-3">Date Difference</h3>
                            <p class="card-text">Calculate the duration between two dates in years, months, and days.</p>
                            <a href="tools/date-difference.php" class="btn btn-primary">Open Tool</a>
                        </div>
                    </div>
                </div>

                <!-- Random Password Generator -->
                <div class="col-md-6 col-lg-4">
                    <div class="card tool-card h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-shield-lock tool-icon"></i>
                            <h3 class="card-title h5 mt-3">Password Generator</h3>
                            <p class="card-text">Create strong, random passwords with customizable length and character sets.</p>
                            <a href="tools/password-generator.php" class="btn btn-primary">Open Tool</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">About Multi-Tool Utility</h2>
            <div class="row">
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="About Us" class="img-fluid rounded shadow">
                </div>
                <div class="col-lg-6">
                    <h3 class="mb-4">Your Trusted Digital Toolkit</h3>
                    <p class="lead">Multi-Tool Utility is a comprehensive collection of free online tools designed to make your daily calculations and conversions effortless.</p>
                    
                    <h5 class="mt-4">Our Mission</h5>
                    <p>We believe that everyone should have access to powerful, easy-to-use tools without the hassle of downloads, installations, or subscriptions. Our mission is to provide reliable, accurate, and completely free utilities that work seamlessly across all devices.</p>
                    
                    <h5 class="mt-4">What Makes Us Different</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>No registration required</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>No annoying ads</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>100% privacy focused</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>Works offline capability</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>Mobile-friendly design</li>
                    </ul>
                </div>
            </div>
            
            <div class="row mt-5">
                <div class="col-md-4 text-center">
                    <div class="card h-100 border-0">
                        <div class="card-body">
                            <i class="bi bi-shield-check display-4 text-primary mb-3"></i>
                            <h5>Privacy First</h5>
                            <p>All calculations happen in your browser. We don't store or collect any of your data.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="card h-100 border-0">
                        <div class="card-body">
                            <i class="bi bi-lightning-charge display-4 text-primary mb-3"></i>
                            <h5>Instant Results</h5>
                            <p>Get accurate results instantly without any server delays or processing time.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="card h-100 border-0">
                        <div class="card-body">
                            <i class="bi bi-phone display-4 text-primary mb-3"></i>
                            <h5>Mobile Optimized</h5>
                            <p>Perfectly designed to work on smartphones, tablets, and desktop computers.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Our Services</h2>
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-calculator display-4 text-primary mb-3"></i>
                            <h4>Financial Calculators</h4>
                            <p>Comprehensive financial tools including loan EMI calculators, compound interest calculators, and investment planning tools.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-calendar-check display-4 text-primary mb-3"></i>
                            <h4>Date & Time Tools</h4>
                            <p>Advanced date calculators, age calculators, time converters, and scheduling tools for precise time management.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-rulers display-4 text-primary mb-3"></i>
                            <h4>Unit Converters</h4>
                            <p>Accurate conversion between various units including length, weight, temperature, area, and volume measurements.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-house-gear display-4 text-primary mb-3"></i>
                            <h4>Construction Tools</h4>
                            <p>Specialized calculators for construction projects, material estimations, and cost calculations.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-shield-lock display-4 text-primary mb-3"></i>
                            <h4>Security Tools</h4>
                            <p>Password generators, encryption tools, and security checkers to keep your digital life secure.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-graph-up display-4 text-primary mb-3"></i>
                            <h4>Business Tools</h4>
                            <p>Professional calculators for business metrics, profit calculations, and financial analysis.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Contact Us</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5><i class="bi bi-tools me-2"></i>Multi-Tool Utility</h5>
                    <p class="mb-0">Your all-in-one solution for everyday calculations and conversions.</p>
                </div>
                <div class="col-md-3">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.php" class="text-white">Home</a></li>
                        <li><a href="#about" class="text-white">About</a></li>
                        <li><a href="#services" class="text-white">Services</a></li>
                        <li><a href="#contact" class="text-white">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Connect</h5>
                    <a href="#" class="text-white me-2"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-white me-2"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="text-white me-2"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="text-white"><i class="bi bi-github"></i></a>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <p class="mb-0">&copy; <?php echo date("Y"); ?> Multi-Tool Utility. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Theme Toggle Script -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const themeToggle = document.getElementById('themeToggle');
        const sunIcon = themeToggle.querySelector('.bi-sun-fill');
        const moonIcon = themeToggle.querySelector('.bi-moon-fill');
        
        themeToggle.addEventListener('click', function() {
            const currentTheme = document.documentElement.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            
            document.documentElement.setAttribute('data-theme', newTheme);
            sunIcon.style.display = newTheme === 'dark' ? 'inline-block' : 'none';
            moonIcon.style.display = newTheme === 'light' ? 'inline-block' : 'none';
            
            localStorage.setItem('theme', newTheme);
            document.cookie = `site_theme=${newTheme}; path=/; max-age=${60*60*24*365}`;
        });
    });
    </script>
</body>
</html>