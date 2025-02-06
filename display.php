<?php
// Remove session_start() if it's already called in the parent file
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Student Records</title>
    <style>
    /* General Styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        background: linear-gradient(135deg, #1e3c72, #2a5298);
        min-height: 100vh;
        color: #333;
        padding: 20px;
    }

    .form-container {
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        max-width: 100%;
        margin: 0 auto;
    }

    .form-container h2 {
        margin-bottom: 20px;
        color: #1e3c72;
        text-align: center;
    }

    /* Table Styles */
    .records-table {
        width: 100%;
        border-collapse: collapse;
        box-shadow: 0 1px 12px rgba(0, 0, 0, 0.1);
        background: white;
        border-radius: 10px;
        overflow: hidden;
    }

    .records-table th,
    .records-table td {
        padding: 15px;
        text-align: left;
    }

    .records-table th {
        background: #00509d;
        color: white;
    }

    .records-table tr:nth-child(even) {
        background: #f9f9f9;
    }

    .records-table tr:hover td {
        background: #f3f8ff;
    }

    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 8px;
        flex-wrap: nowrap;
        min-width: 180px;
    }

    .action-buttons .btn {
        padding: 8px 12px;
        font-size: 0.9em;
        text-decoration: none;
        border-radius: 5px;
        white-space: nowrap;
        transition: all 0.3s ease;
    }

    .btn-edit {
        background: #28a745;
        border: 1px solid #218838;
        color: white;
    }

    .btn-delete {
        background: #dc3545;
        border: 1px solid #c82333;
        color: white;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }

    /* Responsive Table */
    @media (max-width: 768px) {
        .records-table {
            display: block;
            overflow-x: auto;
        }
    }
</style>
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Student Records</h2>
        <table class="records-table">
            <thead>
                <tr>
                    <th>Roll Number</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Section</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->query("SELECT * FROM students");
                while ($row = $stmt->fetch()) {
                    echo "<tr>
                        <td>{$row['roll_number']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['age']}</td>
                        <td>{$row['section']}</td>
                        <td>" . date('d M Y', strtotime($row['dob'])) . "</td>
                        <td>{$row['gender']}</td>
                        <td class='action-buttons'>
                            <a href='index.php?page=dashboard&roll={$row['roll_number']}' class='btn btn-edit'>✏️ Edit</a>
                            <a href='delete.php?roll={$row['roll_number']}' class='btn btn-delete'>🗑️ Delete</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>