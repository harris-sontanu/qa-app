<div class="topic-form mt-5">
    <h3 class="h2 fw-bolder mb-4">Reply to the Message</h3>
    <form class="row" action="{{ route('answer.store') }}" method="post" enctype="multipart/form-data">
        <div class="col-12 form-group mb-4">
            <textarea name="post-message" id="post-message" class="form-control tinymce" cols="30" rows="10"></textarea>
        </div>
        <div class="clear"></div>
        <div class="col-6 form-group">
            <small class="text-muted">Maximum file size allowed is 2048 KB.</small>
            <div class="form-file">
                <input type="file" class="form-control" id="file-input">
            </div>
        </div>
        <div class="clear"></div>
        <div class="col-12 form-group mb-1">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                <label class="form-check-label nott ls0 mb-0 fw-semibold" for="inlineCheckbox1">Set as a Private Reply</label>
            </div>
        </div>
        <div class="clear"></div>
        <div class="col-12 form-group">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                <label class="form-check-label nott ls0 mb-0 fw-semibold" for="inlineCheckbox2">Email me when Someone Replies</label>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" name="submit" class="button button-large bg-alt py-2 rounded-1 fw-medium nott ls0 ms-0">Submit Now</button>
        </div>
    </form>
</div>