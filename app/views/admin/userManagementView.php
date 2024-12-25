<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once './app/components/bootStrapAndFontLink.php'; ?>
    <link rel="stylesheet" href="../public/css/userManagement.css?v=<?php echo time(); ?>">
</head>
<body>
<div class="table-container container mt-4 ">
        <table class="table align-middle text-center ">
            <thead class="table-primary table-head">
                <tr>
                    <th>No.</th>
                    <th>User's name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Address</th>
                    <th>Options</th>
            </tr>
            </thead>
            <tbody class="table-body">
                <tr class="">
                    <td>1</td>
                    <td>Tran Cong Doan</td>
                    <td>congdoan0806@gmail.com</td>
                    <td>********</td>
                    <td>99, To Hien Thanh...</td>
                    <td>
                        <i
                            class="icon-setting bi bi-gear admin"
                            onclick="toggleRoleSelect(this)"
                        ></i>
                        <select class="role-select" onchange="updateRole(this)">
                            <option value="User">User</option>
                            <option value="Admin">Admin</option>
                          </select>
                        <i class="icon-delete bi bi-trash m-1"></i>
                        
                    </td>
                </tr>
                <tr class="">
                    <td>2</td>
                    <td>Mai Tram Huynh</td>
                    <td>Tram@gmail.com</td>
                    <td>********</td>
                    <td>99, To Hien Thanh...ccccccccccccccccccccccccccc</td>
                    <td>
                        <i
                            class="icon-setting bi bi-gear admin"
                            onclick="toggleRoleSelect(this)"
                        ></i>
                        <select class="role-select" onchange="updateRole(this)">
                            <option value="User">User</option>
                            <option value="Admin">Admin</option>
                          </select>
                        <i class="icon-delete bi bi-trash m-1"></i>
                        
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <script src="../public/js/userManagement.js?v=<?php echo time(); ?>"></script>
</body>
</html>