<div class="modal fade" id="updateprofile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" id="createdepartment">
            <div class="modal-body" id="departmentinner">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="department" name="DepartName" id="DepartName">
                <label for="floatingInput"> Enter Name</label>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="ADD" onclick="adddepartment()">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <!--Here i can directy submit form using href without pass it to javascript function but page refresh -->
            </div>
            </form>
          </div>
        </div>
</div>
