<?php
session_start();
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">

  <nav class="sidebar d-flex flex-column">
    <h2 class="mb-4">Admin Dashboard</h2>
    <ul class="nav flex-column gap-2">
      <li class="nav-item">
        <a class="nav-link" href="#user-management" ><i class="fa-solid fa-users icon me-2"></i> User Management </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#adoption-applications"><i class="fa-solid fa-spinner icon me-2"></i> Adoption Process </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#donations"><i class="fa-solid fa-donate icon me-2"></i> Donation Records</a>
      </li>
      <li class="nav-item mt-auto">
        <a class="nav-link" href="logout.php"><i class="fa-solid fa-right-from-bracket icon me-2"></i> Logout</a>
      </li>
    </ul>
  </nav>

  <main class="main px-4 py-5">

    <!-- User Management Section -->
    <section id="user-management" class="mb-5">
      <h3>User Management</h3>
      <div class="table-responsive">
        <table class="table table-bordered align-middle">
          <thead class="table-primary text-primary">
            <tr>
              <th scope="col" style="width: 5%;">ID</th>
              <th scope="col" style="width: 25%;">Name</th>
              <th scope="col" style="width: 30%;">Email</th>
              <th scope="col" style="width: 15%;">Role</th>
              <th scope="col" style="width: 15%;">Actions</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $sql = "SELECT * FROM user";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['username']}</td>
                <td>{$row['email']}</td>
                <td>User</td>
                <td>
                  <form method='POST' action='delete_user.php' class='d-inline' onsubmit='return confirm(\"Delete this user?\")'>
                    <input type='hidden' name='id' value='{$row['id']}' />
                    <button type='submit' class='btn btn-sm btn-danger px-3'>Delete</button>
                  </form>
                </td>
              </tr>";
            }
          } else {
            echo "<tr><td colspan='5' class='text-center'>No users found.</td></tr>";
          }
          ?>
          </tbody>
        </table>
      </div>
    </section>

    <!-- Adoption Applications Section -->
    <section id="adoption-applications" class="mb-5">
      <h3>Adoption Process</h3>
      <div class="table-responsive">
        <table class="table table-bordered align-middle small">
          <thead class="table-primary text-primary">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Age</th>
              <th>Nationality</th>
              <th>Address</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Occupation</th>
              <th>Other Occupation</th>
              <th>Place</th>
              <th>Other Place</th>
              <th>Allowed Pets</th>
              <th>Support</th>
              <th>Visit Permission</th>
              <th>Monetary Ability</th>
              <th>Secure Home</th>
              <th>Responsibility</th>
              <th>Familiar</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
          <?php
              $sql = "SELECT * FROM applications ORDER BY created_at DESC";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  // Display status with color badges
                  $statusBadge = '<span class="badge bg-secondary">Pending</span>';
                  if ($row['status'] === 'approved') {
                    $statusBadge = '<span class="badge bg-success">Approved</span>';
                  } elseif ($row['status'] === 'rejected') {
                    $statusBadge = '<span class="badge bg-danger">Rejected</span>';
                  }
                
                  echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['age']}</td>
                    <td>{$row['nationality']}</td>
                    <td>{$row['address']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['occupation']}</td>
                    <td>{$row['other_occupation']}</td>
                    <td>{$row['place']}</td>
                    <td>{$row['other_place']}</td>
                    <td>{$row['allowed_pets']}</td>
                    <td>{$row['support']}</td>
                    <td>{$row['visit_permission']}</td>
                    <td>{$row['monetary_ability']}</td>
                    <td>{$row['secure_home']}</td>
                    <td>{$row['responsibility']}</td>
                    <td>{$row['familiar']}</td>
                    <td>
                      $statusBadge
                      <form method='POST' action='handle_adoption.php' class='mt-1'>
                        <input type='hidden' name='id' value='{$row['id']}' />
                        <button type='submit' name='action' value='approve' class='btn btn-sm btn-success mb-1' " . ($row['status'] !== 'pending' ? 'disabled' : '') . ">Approve</button>
                        <button type='submit' name='action' value='reject' class='btn btn-sm btn-danger' " . ($row['status'] !== 'pending' ? 'disabled' : '') . ">Reject</button>
                      </form>
                    </td>
                  </tr>";
                }
              } else {
                echo "<tr><td colspan='19' class='text-center'>No adoption applications found.</td></tr>";
              }
              ?>
                          <?php
            if (isset($_SESSION['message'])) {
              echo '<div class="alert alert-info text-center">' . $_SESSION['message'] . '</div>';
              unset($_SESSION['message']);
            }
            ?>
          </tbody>
        </table>
      </div>
    </section>

    <!-- Donation Records Section -->
    <section id="donations" class="mb-5">
      <h3>Donation Records</h3>
      <div class="table-responsive">
        <table class="table table-bordered align-middle">
          <thead class="table-primary text-primary">
            <tr>
              <th style="width: 5%;">ID</th>
              <th style="width: 30%;">Name</th>
              <th style="width: 30%;">Email</th>
              <th style="width: 15%;">Amount</th>
              <th style="width: 20%;">Message</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $sql = "SELECT * FROM donations ORDER BY submitted_at DESC";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>₱" . number_format($row['amount'], 2) . "</td>
                <td>{$row['message']}</td>
              </tr>";
            }
          } else {
            echo "<tr><td colspan='5' class='text-center'>No donation records found.</td></tr>";
          }
          ?>
          </tbody>
        </table>
      </div>
    </section>

  </main>

  <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
