<?php
$tool = $_GET['tool'] ?? '';
$allowed_tools = [
    'standard-calculator',
    'scientific-calculator',
    // Add all other allowed tools here
];

if (in_array($tool, $allowed_tools)) {
    $html = file_get_contents("tools/$tool.php");
    
    // Inject offline support
    $html = str_replace(
        '</head>',
        '<style>
            /* Embedded theme styles */
            :root {
                --bg-color: #ffffff;
                --text-color: #212529;
                --card-bg: #f8f9fa;
                --border-color: #dee2e6;
                --primary-color: #0d6efd;
                --hover-bg: #e9ecef;
            }
            [data-theme="dark"] {
                --bg-color: #212529;
                --text-color: #f8f9fa;
                --card-bg: #2c3034;
                --border-color: #495057;
                --primary-color: #3d7bff;
                --hover-bg: #343a40;
            }
            body {
                background-color: var(--bg-color);
                color: var(--text-color);
                transition: background-color 0.3s ease, color 0.3s ease;
            }
        </style>
        <script>
            '.file_get_contents('js/scripts.js').'
        </script>
        </head>',
        $html
    );
    
    // Force download
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.$tool.'-offline.html"');
    echo $html;
    exit;
} else {
    header('HTTP/1.0 404 Not Found');
    echo 'Tool not found';
}