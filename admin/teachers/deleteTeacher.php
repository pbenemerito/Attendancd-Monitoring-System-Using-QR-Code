<!-- Modal -->
<div class="modal fade" id="deleteTeacher" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Column -->
                    <div class="ol-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div id="isDelete">
                                        <h3>Are you sure you want to delete?</h3>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success" id="delete">Yes</button>
                                            <button type="button" class="btn btn" data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                    <div class="alert alert-success d-none" id="deleteSuccessAlert">
                                        <strong>Successfully Deleted.</strong>
                                    </div>
                                    <div class="alert alert-danger d-none" id="deleteErrorAlert">
                                        <strong>Update Failed!</strong> Account Do Not Exist!
                                    </div>
                                </div>
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