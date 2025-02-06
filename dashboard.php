<div class="form-container">
    <h2>Student Information Form</h2>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $stmt = $pdo->prepare("REPLACE INTO students 
                (name, age, section, roll_number, dob, gender) 
                VALUES (?, ?, ?, ?, ?, ?)");
            
            $stmt->execute([
                $_POST['name'],
                $_POST['age'],
                $_POST['section'],
                $_POST['roll_number'],
                $_POST['dob'],
                $_POST['gender']
            ]);
            
            echo "<p style='color: green;'>Data saved successfully!</p>";
        } catch (PDOException $e) {
            echo "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
        }
    }

    $student = [];
    if (isset($_GET['roll'])) {
        $stmt = $pdo->prepare("SELECT * FROM students WHERE roll_number = ?");
        $stmt->execute([$_GET['roll']]);
        $student = $stmt->fetch();
    }
    ?>
    
    <form method="POST">
        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="name" required value="<?= $student['name'] ?? '' ?>">
        </div>
        <div class="form-group">
            <label>Age</label>
            <input type="number" name="age" required value="<?= $student['age'] ?? '' ?>">
        </div>
        <div class="form-group">
            <label>Section</label>
            <input type="text" name="section" required value="<?= $student['section'] ?? '' ?>">
        </div>
        <div class="form-group">
            <label>Roll Number</label>
            <input type="text" name="roll_number" required value="<?= $student['roll_number'] ?? '' ?>">
        </div>
        <div class="form-group">
            <label>Date of Birth</label>
            <input type="date" name="dob" required value="<?= $student['dob'] ?? '' ?>">
        </div>
        <div class="form-group">
            <label>Gender</label>
            <select name="gender" required>
                <option value="Male" <?= ($student['gender'] ?? '') == 'Male' ? 'selected' : '' ?>>Male</option>
                <option value="Female" <?= ($student['gender'] ?? '') == 'Female' ? 'selected' : '' ?>>Female</option>
                <option value="Other" <?= ($student['gender'] ?? '') == 'Other' ? 'selected' : '' ?>>Other</option>
            </select>
        </div>
        <button type="submit" class="btn">Save Data</button>
    </form>
</div>