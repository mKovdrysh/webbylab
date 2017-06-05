{extends file="layout.tpl"}

{block name="content"}
    <form method="POST" role="form" action="/?page=process-import" enctype="multipart/form-data"
          class="form-horizontal">
        <div class="form-group">
            <label for="file" class="col-sm-2"><b>Import file:</b></label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="file" name="file" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2"></div>
            <button type="submit" class="btn btn-primary">Import</button>
        </div>
    </form>
{/block}
