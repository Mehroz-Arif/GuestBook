<?php
session_start();
if(!isset($_SESSION['mail'])){
    header('location:error.php');
} 
?>

<!doctype html>

<html lang="en"> 

 <head> 

  <meta charset="UTF-8"> 

  <title>CodePen - Animated Login Form using Html &amp; CSS Only</title> 

  <link rel="stylesheet" href="style.css"> 
  <style>
    table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    color: white; /* Set default text color to white */
}

th {
    background-color: #f2f2f2;
    color: black; /* Set heading text color to black */
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.btn-edit, .btn-delete {
    padding: 5px 10px;
    cursor: pointer;
    border: none;
    border-radius: 3px;
}

.btn-edit {
    background-color: #4CAF50;
    color: white;
}

.btn-delete {
    background-color: #f44336;
    color: white;
}

section .signin {
    width: 800px;
}

.text {
    color: white;
}

.white-bg {
        background-color: white;
        color: black; /* Adjust text color for better visibility */
        padding: 5px 8px;
        margin: 0 5px;
        text-decoration: none;
    }

    .current-page {
        background-color: #4CAF50; /* Green color for the current page */
        color: white;
        padding: 5px 8px;
        margin: 0 5px;
        text-decoration: none;
    }

    .pagination-link {
        background-color: white;
        color: black; /* Adjust text color for better visibility */
        padding: 5px 8px;
        margin: 0 5px;
        text-decoration: none;
    }
    </style>
 </head> 

 <body> <!-- partial:index.partial.html --> 

  <section> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> 

   <div class="signin"> 

    <div class="content"> 

  
    <?php
include('connection.php');

// Pagination settings
$commentsPerPage = 10; // Set the number of comments to display per page
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; // Get the current page

// Calculate the starting point for the SQL query
$offset = ($page - 1) * $commentsPerPage;

$sql = "SELECT * FROM comments LIMIT $offset, $commentsPerPage";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table >
        <thead>
            <tr>
                <th class='text'>Sr</th>
                <th>Comments</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>";
$srnumber=1;
        while ($row = $result->fetch_assoc()) {
            echo '<tr>
                    <td>' . $srnumber. '</td>
                    <td>' . $row["comments"] . '</td>
                    <td>' . $row["email"] . '</td>
                    <td>
                        <a href="edit.php?id=' . $row['comment_id'] . '"><button class="btn-edit">Edit</button></a>
                        <a href="delete.php?id=' . $row['comment_id'] . '"><button class="btn-delete">Delete</button></a>
                        
                    </td>
                  
                    </tr>';
                    $srnumber++;
        }


    echo '</tbody>';
    echo '</table>';

    // Pagination links
    $sql = "SELECT COUNT(*) as total FROM comments";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $totalComments = $row['total'];
    $totalPages = ceil($totalComments / $commentsPerPage);

    echo '<div style="margin-top: 20px;">';
    for ($i = 1; $i <= $totalPages; $i++) {
        $pageClass = ($i == $page) ? 'current-page' : 'pagination-link';
        echo '<a href="?page=' . $i . '" class="' . $pageClass . '">' . $i . '</a> ';
    }
    echo '</div>';
}
?>



<a href="logout.php"><button class="btn-delete">Logout</button></a>
    





       
    </div> 

   </div> 

  </section> <!-- partial --> 




 </body>

</html>