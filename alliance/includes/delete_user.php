<!-- model -->

<div id="deleteModel" class="modal">
    <div class="body">
        <div class="head">

            <h4 class="modelTitle">delete User</h4>
            <button class="close" data-dismiss="model">x</button>
        </div>
        <div class="modalBody">
            <p>are you sure you want to delete this user?</p>
            <form action="" method="post" id="form-delete">
                <input type="hidden" name="id">

            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn " data-dismiss="modal">close</button>
            <button type="submit" class="btn red " form="form-delete" data-dismiss="modal">delete</button>
        </div>

    </div>
</div>