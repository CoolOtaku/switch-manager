<div class="modal fade" id="modal_add_edit_switch" tabindex="-1" aria-labelledby="modal_add_edit_switch" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-butt-1-1_general" id="modal_switch_title">Title</h5>
        <button type="button" class="btn_hiden text-butt-1-1_general" data-bs-dismiss="modal" aria-label="Close">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
          </svg>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="Id1" id="Id1">
        <input type="hidden" name="Add_or_edit" id="Add_or_edit">
        <div class="mb-3">
          <label for="Name" class="form-label text-butt-1-1_general">Name:</label>
          <input type="text" id="Name" name="Name" class="form-control" placeholder="Name">
        </div>
        <div class="mb-3">
          <label for="IP" class="form-label text-butt-1-1_general">IP:</label>
          <input type="text" id="IP" name="IP" class="form-control" placeholder="IP">
        </div>
        <div class="mb-3">
          <label for="Login" class="form-label text-butt-1-1_general">Login:</label>
          <input type="text" id="Login" name="Login" class="form-control" placeholder="Login">
        </div>
        <div class="mb-3">
          <label for="Password" class="form-label text-butt-1-1_general">Password:</label>
          <input type="password" id="Password" name="Password" class="form-control" placeholder="Password">
        </div>
        <div class="mb-3">
          <label for="Image" class="form-label text-butt-1-1_general">Image:</label>
          <input class="form-control" type="file" id="Image" name="Image" placeholder="Image">
        </div>
      </div>
      <div class="modal-footer">
        <div class="button_style button-1-1_general text-butt-1-1_general" id="Btn_Save_SWitch">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
          </svg>
          Save
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="delete_modal_Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-butt-1-1_general" id="delete_modal_Label">Delete this switch</h5>
        <button type="button" class="btn_hiden text-butt-1-1_general" data-bs-dismiss="modal" aria-label="Close">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
          </svg>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="Id2" id="Id2">
        <p class="text-butt-1-1_general">You really want to delete this switch ?</p>
      </div>
      <div class="modal-footer">
        <div class="button_style button-1-1_general text-butt-1-1_general" id="Btn_Delete_SWitch">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
          </svg>
          Yes
        </div>
      </div>
    </div>
  </div>
</div>