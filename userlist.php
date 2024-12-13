<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        table th {
            background-color: #f4f4f4;
        }
        .actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        .actions button {
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 4px;
            min-width: 60px;
            transition: all 0.3s ease;
        }
        .actions .edit {
            background-color:rgb(53, 45, 172);
            color: white;
        }
        .actions .edit:hover {
            background-color: rgb(43, 36, 139);
            transform: scale(1.05);
        }
        .actions .delete {
            background-color: #f44336;
            color: white;
        }
        .actions .delete:hover {
            background-color: #d32f2f;
            transform: scale(1.05);
        }
        @media screen and (max-width: 600px) {
            .actions {
                flex-direction: column;
                gap: 5px;
            }
            .actions button {
                width: 100%;
            }
            table th, table td {
                padding: 8px 5px;
                font-size: 14px;
            }
        }
    </style>
    <script>
        function editUser(element) {
            const row = element.closest('tr');
            const cells = row.getElementsByTagName('td');
            
            for(let i = 0; i < cells.length - 1; i++) {
                const cell = cells[i];
                const currentValue = cell.textContent;
                cell.innerHTML = `<input type="text" value="${currentValue}">`;
            }
            
            element.textContent = 'Save';
            element.onclick = () => saveUser(element);
        }

        function saveUser(element) {
            const row = element.closest('tr');
            const cells = row.getElementsByTagName('td');
            
            for(let i = 0; i < cells.length - 1; i++) {
                const cell = cells[i];
                const input = cell.querySelector('input');
                cell.textContent = input.value;
            }
            
            element.textContent = 'Edit';
            element.onclick = () => editUser(element);
        }

        function deleteUser(element) {
            if(confirm('Are you sure you want to delete this user?')) {
                element.closest('tr').remove();
            }
        }
    </script>
</head>
<body>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "userregistration");
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    ?>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Company</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM users";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . (isset($row['firstname']) && isset($row['lastname']) ? 
                        htmlspecialchars($row['firstname'] . ' ' . $row['lastname']) : '') . "</td>";
                    echo "<td>" . (isset($row['email']) ? htmlspecialchars($row['email']) : '') . "</td>";
                    echo "<td>" . (isset($row['phonenumber']) ? htmlspecialchars($row['phonenumber']) : '') . "</td>";
                    echo "<td>" . (isset($row['company']) ? htmlspecialchars($row['company']) : '') . "</td>";
                    echo "<td class='actions'>
                            <button class='edit' onclick='editUser(this)'>Edit</button>
                            <button class='delete' onclick='deleteUser(this)'>Delete</button>
                          </td>";
                    echo "</tr>";
                }
            }
            mysqli_close($conn);
            ?>
        </tbody>
    </table>
</body>
</html>
