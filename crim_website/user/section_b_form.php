<?php
session_start();
require_once __DIR__ . '/../config/db.php';

// Check if logged in
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'user') {
    header("Location: ../auth/login.php");
    exit;
}

$userId = $_SESSION['user']['id'];
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $leaderName = $_POST['leaderName'];
    $passportNo = $_POST['passportNo'];
    $staffId = $_POST['staffId'];
    $position = $_POST['position'];
    $otherPosition = $_POST['otherPosition'] ?? '';
    $schoolCentre = $_POST['schoolCentre'];
    $officePhone = $_POST['officePhone'];
    $mobilePhone = $_POST['mobilePhone'];
    $email = $_POST['email'];
    $academicQual = $_POST['academicQual'];
    $employment = $_POST['employment'];
    $contractExpiry = $_POST['contractExpiry'] ?? null;
    $appointmentDate = $_POST['appointmentDate'];

    if ($position === 'others' && !empty($otherPosition)) {
        $position = $otherPosition;
    }

    $stmt = $conn->prepare("
        INSERT INTO submissions (
            user_id, leaderName, passportNo, staffId, position, schoolCentre,
            officePhone, mobilePhone, email, academicQual, employment,
            contractExpiry, appointmentDate
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");

    $stmt->bind_param(
        "issssssssssis",
        $userId,
        $leaderName,
        $passportNo,
        $staffId,
        $position,
        $schoolCentre,
        $officePhone,
        $mobilePhone,
        $email,
        $academicQual,
        $employment,
        $contractExpiry,
        $appointmentDate
    );

    if ($stmt->execute()) {
        $message = "<p class='text-yellow-400 font-bold text-center my-4 animate-fade-in'>✅ Your form has been submitted successfully and is pending approval.</p>";
    } else {
        $message = "<p class='text-red-500 font-bold text-center my-4 animate-fade-in'>❌ Error: " . $conn->error . "</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Section B Form</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px);}
        to { opacity: 1; transform: translateY(0);}
    }
    .animate-fade-in { animation: fadeIn 0.8s ease forwards; }

    body {
        font-family: 'Inter', sans-serif;
        background-color: #0d0f17;
        color: #e2e8f0;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
    }
    .form-container {
        background-color: #1a1e26;
        padding: 3rem;
        border-radius: 1rem;
        width: 100%;
        max-width: 960px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.6);
        transform: scale(0.95);
        opacity: 0;
        animation: fadeIn 0.8s forwards;
        position: relative;
    }
    input:focus, textarea:focus, select:focus {
        outline: none;
        border-color: #facc15 !important;
        box-shadow: 0 0 10px rgba(250, 204, 21, 0.3);
        transition: all 0.3s ease;
    }
    .error { 
        border-color: #dc2626 !important; 
    }
    .error-message {
        color: #dc2626;
        font-size: 0.875rem;
        margin-top: 0.25rem;
        display: none;
    }
    .input-group {
        display: flex;
        flex-direction: column;
    }
    .input-group.error .error-message {
        display: block;
    }
    button {
        transition: all 0.3s ease;
    }
    .radio-group label {
        margin-right: 1.5rem;
        cursor: pointer;
    }
    .radio-group input[type="radio"] {
        accent-color: #facc15;
    }
</style>
</head>
<body>

<div class="form-container">
    <a href="user_dashboard.php" class="absolute top-8 left-8 flex items-center space-x-2 px-4 py-2 rounded-full text-sm font-semibold text-gray-300 bg-gray-800 hover:bg-gray-700 transition">
        <span>⬅️</span>
        <span>Back to Dashboard</span>
    </a>
    
    <h1 class="text-4xl font-bold mb-8 text-center text-yellow-400 animate-fade-in">CRIM Grant Application</h1>

    <?= $message ?>

    <form id="sectionBForm" method="POST" class="space-y-6 text-left">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div class="input-group animate-fade-in">
                <label class="block text-lg font-semibold mb-2">Leader Name:</label>
                <input type="text" name="leaderName" required class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-600 transition">
                <span class="error-message">This field is required.</span>
            </div>

            <div class="input-group animate-fade-in">
                <label class="block text-lg font-semibold mb-2">Mykad/Passport No:</label>
                <input type="text" name="passportNo" required class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-600 transition">
                <span class="error-message">This field is required.</span>
            </div>

            <div class="input-group animate-fade-in">
                <label class="block text-lg font-semibold mb-2">Staff ID:</label>
                <input type="text" name="staffId" required class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-600 transition">
                <span class="error-message">This field is required.</span>
            </div>

            <div class="input-group animate-fade-in">
                <label class="block text-lg font-semibold mb-2">School/Centre:</label>
                <input type="text" name="schoolCentre" class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-600 transition">
            </div>

            <div class="input-group animate-fade-in">
                <label class="block text-lg font-semibold mb-2">Office Phone No:</label>
                <input type="text" name="officePhone" class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-600 transition">
            </div>

            <div class="input-group animate-fade-in">
                <label class="block text-lg font-semibold mb-2">Mobile Phone No:</label>
                <input type="text" name="mobilePhone" class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-600 transition">
            </div>

            <div class="input-group animate-fade-in">
                <label class="block text-lg font-semibold mb-2">Email:</label>
                <input type="email" name="email" required class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-600 transition">
                <span class="error-message">A valid email is required.</span>
            </div>
            
            <div class="input-group animate-fade-in">
                <label class="block text-lg font-semibold mb-2">Date of Appointment:</label>
                <input type="date" name="appointmentDate" class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-600 transition">
            </div>
        </div>
        
        <div class="animate-fade-in">
            <label class="block text-lg font-semibold mb-2">Position:</label>
            <div class="radio-group flex flex-wrap gap-4 mb-2">
                <label><input type="radio" name="position" value="professor"> Professor</label>
                <label><input type="radio" name="position" value="associate_professor"> Associate Professor</label>
                <label><input type="radio" name="position" value="senior_lecturer"> Senior Lecturer</label>
                <label><input type="radio" name="position" value="lecturer"> Lecturer</label>
                <label><input type="radio" name="position" value="others"> Others</label>
            </div>
            <input type="text" name="otherPosition" id="otherPosition" placeholder="If Others, please specify" class="w-full mt-2 px-4 py-3 rounded-lg bg-gray-800 border border-gray-600 transition hidden">
        </div>

        <div class="input-group animate-fade-in">
            <label class="block text-lg font-semibold mb-2">Academic Qualification:</label>
            <textarea name="academicQual" rows="2" class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-600 transition"></textarea>
        </div>

        <div class="input-group animate-fade-in">
            <label class="block text-lg font-semibold mb-2">Employment:</label>
            <div class="radio-group flex flex-wrap items-center gap-4 mb-2">
                <label><input type="radio" name="employment" value="permanent"> Permanent</label>
                <label><input type="radio" name="employment" value="contract"> Contract</label>
            </div>
            <input type="date" name="contractExpiry" id="contractExpiry" class="w-full mt-2 px-4 py-3 rounded-lg bg-gray-800 border border-gray-600 transition hidden">
        </div>

        <button type="submit" class="w-full py-4 rounded-xl bg-yellow-400 text-gray-900 font-bold text-lg hover:bg-yellow-500 transition shadow-lg animate-fade-in">Submit</button>
    </form>
</div>

<script>
const otherPositionInput = document.getElementById('otherPosition');
const contractInput = document.getElementById('contractExpiry');

document.querySelectorAll('input[name="position"]').forEach(el => {
    el.addEventListener('change', function() {
        if (this.value === 'others') {
            otherPositionInput.classList.remove('hidden');
        } else {
            otherPositionInput.classList.add('hidden');
            otherPositionInput.value = '';
        }
    });
});

document.querySelectorAll('input[name="employment"]').forEach(el => {
    el.addEventListener('change', function() {
        if (this.value === 'contract') {
            contractInput.classList.remove('hidden');
        } else {
            contractInput.classList.add('hidden');
            contractInput.value = '';
        }
    });
});

const form = document.getElementById('sectionBForm');
form.addEventListener('submit', function(e) {
    let valid = true;
    const requiredFields = ['leaderName', 'passportNo', 'staffId', 'email'];
    const requiredRadioGroups = ['position', 'employment'];

    document.querySelectorAll('.input-group').forEach(el => el.classList.remove('error'));

    requiredFields.forEach(name => {
        const field = form.elements[name];
        const group = field.closest('.input-group');
        if (!field.value.trim()) {
            valid = false;
            group.classList.add('error');
        } else {
            group.classList.remove('error');
        }
    });

    if (otherPositionInput.value.trim() === '' && !otherPositionInput.classList.contains('hidden')) {
        valid = false;
        otherPositionInput.closest('.input-group').classList.add('error');
    }

    if (contractInput.value === '' && !contractInput.classList.contains('hidden')) {
        valid = false;
        contractInput.closest('.input-group').classList.add('error');
    }
    
    requiredRadioGroups.forEach(name => {
        const checked = [...document.querySelectorAll(`input[name="${name}"]`)].some(r => r.checked);
        if (!checked) {
            valid = false;
        }
    });

    if (!valid) e.preventDefault();
});
</script>

</body>
</html>
