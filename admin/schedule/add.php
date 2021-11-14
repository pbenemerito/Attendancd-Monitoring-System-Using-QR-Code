<!-- Modal -->
<div class="modal fade" id="addModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="page-title" id="modalTitleLabel">Add Schedule</h3>
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
                                        <label class="col-md-12 p-0">Subject Name *</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" required id="subjectName" name="subjectName" placeholder="Basic Physical Exercise"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Subject Code *</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" required id="subjectCode"  name="subjectCode" placeholder="PE100"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Units *</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="number" required id="units" name="units" placeholder="3"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Start Time *</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="time" required id="startTime" name="startTime"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">End Time *</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="time" required id="endTime" name="endTime"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Day *</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" required id="day" name="day" placeholder="MTWTHF"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Semester *</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" required id="semester" name="semester" placeholder="1st Sem"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">School Year *</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" required id="sy" name="sy" placeholder="2020-2021"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Room *</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" required id="room" name="room" placeholder="Room400"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Section *</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <select name="section" id="section" required class="form-control p-0 border-0">
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Teacher *</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <select name="teacher" id="teacher" required class="form-control p-0 border-0">
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="alert alert-success d-none" id="successAlert">
                                        <strong>Success.</strong>
                                    </div>
                                    <div class="alert alert-danger d-none" id="errorAlert">
                                        <strong>Insert Failed!</strong> Subject Code already exist!
                                    </div>
                                    <div class="alert alert-danger d-none" id="dontExistAlert">
                                        <strong>Update Failed!</strong> Schedule Do Not Exist!
                                    </div>
                                    <input type="hidden" name="scheduleId" id="scheduleId"
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