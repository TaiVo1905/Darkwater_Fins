<!DOCTYPE html>
<html Exampleg="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Darkwater Fins</title>
    <?php include_once './app/components/bootStrapAndFontLink.php' ?>
    <base href="<?php echo BASE_URL ?>">
    <link rel="stylesheet" href="./public/css/common.css">
    <link rel="stylesheet" href="./public/css/headerAdmin.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/sidebarAdmin.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/userManagement.css?v=<?php echo time(); ?>">
</head>
<body>
    <div style="background-color: #F4F4F4;height:100vh;">
        <?php include_once './app/components/headerAdmin.php' ;
            $dashboardHTML = generateDashboard('hide-element', '34 orders', '$20000', '33');
            echo $dashboardHTML;
        ?>
        <?php include_once './app/components/sidebarAdmin.php' ?>
        <div class="table-container big_container">
            <table class="table_btn align-middle text-center small_container">
                <thead class="table-head">
                    <tr>
                        <th>No.</th>
                        <th>User's name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Address</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody class="table-body-btn">
                    <?php
                            foreach ($data as $user) {
                                if($user->roles == 1){
                                    $active = "active";
                                    $roles_1 = "Admin";
                                    $roles_2 = "User";
                                }else{
                                    $active = null;
                                    $roles_1 = "User";
                                    $roles_2 = "Admin";
                                }
                            echo "
                                <tr data-userId = '".$user->user_id."'>
                                    <td>".$user->user_id."</td>
                                    <td title='".$user->user_name."'>".$user->user_name."</td>
                                    <td title='".$user->email."'>".$user->email."</td>
                                    <td title='".$user->address."'>".$user->passwords."</td>
                                    <td title='".$user->address."'></td>
                                    <td>
                                        <i
                                            class='icon-setting bi bi-gear admin ". $active ."'
                                            ></i>
                                        <select class='role-select' onchange='updateUserRole(this)'>
                                            <option value='$roles_1'>".$roles_1."</option>
                                            <option value='$roles_2'>".$roles_2."</option>
                                        </select>
                                        <i class='icon-delete bi bi-trash m-1'></i>
                                    </td>
                                </tr>
                            ";
                            }
                        ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="./public/js/define.js?v=<?php echo time(); ?>"></script>
    <script src="./public/js/userManagement.js?v=<?php echo time(); ?>"></script>
</body>
</html>