<!DOCTYPE html>
<html Exampleg="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User management</title>
    <base href="<?php echo BASE_URL ?>">
    <?php include_once './app/components/link.php' ?>
    <link rel="stylesheet" href="./public/css/common.css">
    <link rel="stylesheet" href="./public/css/admin/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/admin/sidebar.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/admin/userManagement.css?v=<?php echo time(); ?>">
</head>
<body>
    <div style="background-color: #F4F4F4;height:100vh;">
        <?php
            include_once './app/components/admin/header.php' ;
            echo generateDashboard('hide-element', '34 orders', '$20000', '33', "Users management");
            include_once './app/components/admin/sidebar.php';
        ?>
        <div class="table-container big_container">
            <table class="table_btn align-middle text-center small_container">
                <thead class="table-head">
                    <tr>
                        <th>User_id</th>
                        <th>User's name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <table class="table-body-btn table_btn align-middle text-center small_container">
                    <?php
                    foreach ($data as $user) {
                        if($user->getRoles() == 1){
                            $active = "active";
                            $roles_1 = "Admin";
                            $roles_2 = "User";
                        }else{
                            $active = null;
                            $roles_1 = "User";
                            $roles_2 = "Admin";
                        }
                            echo "
                                <tr data-userId = '{$user->getUserId()}'>
                                    <td>{$user->getUserId()}</td>
                                    <td title='{$user->getUserName()}'>{$user->getUserName()}</td>
                                    <td title='{$user->getEmail()}'>{$user->getEmail()}</td>
                                    <td title='{$user->getAddress()}'>{$user->getAddress()}</td>
                                    <td>
                                        <i
                                            class='icon-setting bi bi-gear admin  $active'
                                            ></i>
                                        <select class='role-select'>
                                            <option value='$roles_1'>$roles_1</option>
                                            <option value='$roles_2'>$roles_2</option>
                                        </select>
                                        <i class='icon-ban bi bi-ban m-1'></i>

                                    </td>
                                </tr>
                            ";
                        }
                    ?>
                </table>
            </table>
            <div class="d-flex justify-content-center mt-3">
                <nav>
                    <ul class="pagination mb-0">
                        <?php
                            $pageNum = count($data)/25 + 1;
                            if($pageNum > 2) {
                                for($i = 1; $i <= $pageNum; $i++) {
                                    echo '<li class="page-item"><a class="page-link" data-page="' . $i . '">' . $i . '</a></li>';
                                }
                            }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirmBanUser" tabindex="-1" aria-labelledby="confirmBanUserLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="confirmationModalLabel">
                Confirm Order
              </h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Are you sure you want to ban this user?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary" id="confirmButton">Confirm</button>
            </div>
          </div>
        </div>
    </div>
    <?php include_once  './app/components/toast.php';
    echo displayToast(''); ?>
    <script src="./public/js/define.js?v=<?php echo time(); ?>"></script>
    <script src="./public/js/admin/userManagement.js?v=<?php echo time(); ?>"></script>
    <script src="./public/js/admin/sidebar.js?v=<?php echo time(); ?>"></script>
    <script src="./public/js/pagination.js?v=<?php echo time(); ?>"></script>
</body>
</html>