<!-- Modal -->
<div class="modal fade" id="stopModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="page-title" id="modalTitleLabel">Stop Attendance</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Column -->
                    <div class="ol-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material" id="stopForm" method="post">
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
                                    <div class="alert alert-success d-none" id="successAlertStop">
                                        <strong>Attendance Ended.</strong>
                                    </div>
                                    <div class="alert alert-danger d-none" id="errorAlertStop">
                                        <strong>Authentication Failed!</strong> Either your email or password was incorrect.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary" name="save" id="save" value="End Attendance" />
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