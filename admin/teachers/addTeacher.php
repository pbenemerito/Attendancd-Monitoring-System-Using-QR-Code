<!-- Modal -->
<div class="modal fade" id="addTeacher" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="page-title" id="modalTitleLabel">Add Teacher</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Column -->
                    <div class="ol-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material" id="addForm" method="post">
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Email *</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="email" id="email" required placeholder="johnathan@admin.com"
                                                class="form-control p-0 border-0" name="email"
                                                id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Password *</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="password" id="password" required name="password" value="Password!1" class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">First Name *</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" required id="fname" name="fname" placeholder="Johnathan"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Middle Initial</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="mi" id="mi" placeholder="L."
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Last Name *</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" required id="lname" name="lname" placeholder="Doe"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Ex</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" id="ex" name="ex" placeholder="Jr."
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">College *</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" id="college" required name="college" placeholder="CEN"
                                                class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Department *</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" id="department" required name="department" placeholder="IT Dept"
                                                class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-sm-12">Role *</label>
                                        <div class="col-sm-12 border-bottom">
                                            <select name="role" id="role" required class="form-select shadow-none p-0 border-0 form-control-line">
                                                <option value="teacher">Teacher</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="alert alert-success d-none" id="successAlert">
                                        <strong>Success.</strong>
                                    </div>
                                    <div class="alert alert-danger d-none" id="errorAlert">
                                        <strong>Insert Failed!</strong> Email already exist!
                                    </div>
                                    <div class="alert alert-danger d-none" id="accountDontExistAlert">
                                        <strong>Update Failed!</strong> Account Do Not Exist!
                                    </div>
                                    <input type="hidden" name="accountId" id="accountId"
                                                class="form-control p-0 border-0"> </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary" name="save" id="save" value="Save" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->