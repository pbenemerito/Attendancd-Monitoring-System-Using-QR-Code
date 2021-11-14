<!-- Modal -->
<div class="modal fade" id="addModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="page-title" id="modalTitleLabel">Add Section</h3>
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
                                        <label class="col-md-12 p-0">Section Name *</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" required id="sectionName" name="sectionName" placeholder="DEVOPS"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Section Code *</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" required id="sectionCode" name="sectionCode" placeholder="BSIT1-1"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="alert alert-success d-none" id="successAlert">
                                        <strong>Success.</strong>
                                    </div>
                                    <div class="alert alert-danger d-none" id="errorAlert">
                                        <strong>Insert Failed!</strong> Section Code already exist!
                                    </div>
                                    <div class="alert alert-danger d-none" id="dontExistAlert">
                                        <strong>Update Failed!</strong> Section Do Not Exist!
                                    </div>
                                    <input type="hidden" name="sectionId" id="sectionId"
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