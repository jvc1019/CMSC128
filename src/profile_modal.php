<!--Update Modal-->
<div class="modal fade" id="updateProfileModal<?php echo $user['user_ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="User Details" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary">Edit User Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="profile_update.php?user_ID=<?php echo $user_ID; ?>" enctype="multipart/form-data">
                    <input type="hidden" name="userID" value="<?php echo $user['user_ID']; ?>">
                    <div class="form-group">
                        <!--  Profile Avatar -->
                        <svg width="1.0625em" height="1em" viewBox="0 0 17 16" class="bi bi-image-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M.002 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-12a2 2 0 0 1-2-2V3zm1 9l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094L15.002 9.5V13a1 1 0 0 1-1 1h-12a1 1 0 0 1-1-1v-1zm5-6.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                        </svg>
                        Avatar:
                        <div class="input-group">
                            <select id="addUserAvatar" class="form-control text-truncate border-primary border-top-0 border-left-0 border-right-0 rounded-0" name="userAvatar">
                                <option <?php if ($user['user_Avatar'] == "default") echo "selected" ?> value="default">Default</option>
                                <option <?php if ($user['user_Avatar'] == "avatar1") echo "selected" ?> value="avatar1">Avatar 1</option>
                                <option <?php if ($user['user_Avatar'] == "avatar2") echo "selected" ?> value="avatar2">Avatar 2</option>
                                <option <?php if ($user['user_Avatar'] == "avatar3") echo "selected" ?> value="avatar3">Avatar 3</option>
                                <option <?php if ($user['user_Avatar'] == "avatar4") echo "selected" ?> value="avatar4">Avatar 4</option>
                                <option <?php if ($user['user_Avatar'] == "avatar5") echo "selected" ?> value="avatar5">Avatar 5</option>
                                <option <?php if ($user['user_Avatar'] == "avatar6") echo "selected" ?> value="avatar6">Avatar 6</option>
                                <option <?php if ($user['user_Avatar'] == "avatar7") echo "selected" ?> value="avatar7">Avatar 7</option>
                            </select>
                        </div>
                    </div>
                    <!-- Profile Username -->
                    <div class="form-group">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                        Username: <input type="text" class="form-control font-weight-bold border-primary border-top-0 border-left-0 border-right-0 rounded-0" id="addUserName" name="userName" value="<?php echo $user['user_Name']; ?>" required>
                    </div>
                    <!-- Profile Email -->
                    <div class="form-group">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                        Email: <input type="text" class="form-control border-primary border-top-0 border-left-0 border-right-0 rounded-0" id="addUserEmail" name="userEmail" value="<?php echo $user['user_Email']; ?>" required>
                    </div>
                    <!-- Profile Description -->
                    <div class="form-group">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                        Description:
                        <textarea class="form-control border-primary border-top-0 border-left-0 border-right-0 rounded-0" id="addUserDesc" name="userDesc" placeholder="User description (optional)" rows="4"><?php echo $user['user_Desc']; ?></textarea>
                    </div>
                    <!--  User Theme -->
                    <div class="form-group">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-brush-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.117 8.117 0 0 1-3.078.132 3.658 3.658 0 0 1-.563-.135 1.382 1.382 0 0 1-.465-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.393-.197.625-.453.867-.826.094-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.2-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.175-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04z"/>
                        </svg>
                        Theme:
                        <div class="input-group">
                            <select id="addUserTheme" class="form-control text-truncate border-primary border-top-0 border-left-0 border-right-0 rounded-0" name="userTheme">
                                <option <?php if ($user['user_Theme'] == "default") echo "selected" ?> value="default">Default</option>
                                <option <?php if ($user['user_Theme'] == "theme1") echo "selected" ?> value="theme1">Study</option>
                                <option <?php if ($user['user_Theme'] == "theme2") echo "selected" ?> value="theme2">Sunset</option>
                                <option <?php if ($user['user_Theme'] == "theme3") echo "selected" ?> value="theme3">Street</option>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-sm text-secondary">
                    <!-- reset icon -->
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-counterclockwise" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z" />
                        <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z" />
                    </svg> Reset
                </button>
                <button type="button" class="btn btn-sm text-secondary" data-dismiss="modal">
                    <!-- x icon -->
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                    </svg> Cancel
                </button>
                <button type="submit" class="btn btn-sm text-primary">
                    <!-- check/floppy icon -->
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-arrow-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z" />
                        <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z" />
                        <path fill-rule="evenodd" d="M8 6a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 10.293V6.5A.5.5 0 0 1 8 6z" />
                    </svg> Save
                </button>
                </form>
            </div>
        </div>
    </div>
</div>