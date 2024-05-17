    <div class="modal fade" id="manageAccountsModal" tabindex="-1" aria-labelledby="manageAccountsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="manageAccountsModalLabel">Manage Accounts</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addAccountForm" method="post" action="../functions/add_account.php" style="display: inline-flex; gap: 10px; flex-wrap: wrap;">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" required>
                                <span class="input-group-text bg-white border-start-0" id="togglePassword"><i class="fas fa-eye-slash"></i></span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Add Account</button>
                    </form>
                    <h5 class="mt-4">Existing Accounts:</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Username</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="accountList">
                            <?php
                            $sql = "SELECT id, username FROM accounts";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $row["id"]; ?></th>
                                <td><?php echo $row["username"]; ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary edit-btn" data-bs-toggle="modal" data-bs-target="#editAccountModal<?php echo $row["id"]; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                        </svg>
                                    </button>
                                    <button type="button" class="btn btn-danger delete-btn" data-bs-toggle="modal" data-bs-target="#deleteAccountModal<?php echo $row["id"]; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            <?php
                                }
                            } else {
                                echo "<tr><td colspan='3'>No accounts found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

                <?php 
                    $statement = "SELECT * FROM accounts";
                    $result1 = $conn->query($statement);

                    while($row1 = $result1->fetch_assoc()){
                ?>

                <div class="modal fade" id="editAccountModal<?php echo $row1["id"]; ?>" tabindex="-1" aria-labelledby="editAccountModalLabel<?php echo $row1["id"]; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editAccountModalLabel<?php echo $row1["id"]; ?>">Edit Account</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form method="POST" action="../functions/account.php">
                                <div class="mb-3">
                                    <label for="editUsername" class="form-label">Username</label>
                                    <input type="text" class="form-control" name="editUsername" value="<?php echo $row1['username']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="editPassword" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="editPassword" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                <input type="hidden" class="form-control" name="accountID" value="<?php echo $row1["id"]; ?>">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delete Account Modal -->
                <div class="modal fade" id="deleteAccountModal<?php echo $row1["id"]; ?>" tabindex="-1" aria-labelledby="deleteAccountModalLabel<?php echo $row1["id"]; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteAccountModalLabel<?php echo $row1["id"]; ?>">Delete Account</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this account?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger" onclick="deleteAccount(<?php echo $row1['id'] ?>)">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                
                <div class="modal fade" id="logoutModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Confirm Logout</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <p>Are you sure you want to logout?</p>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <a href="../functions/logout.php" class="btn btn-primary">Logout</a>
                    </div>

                    </div>
                </div>
                </div>