{extends file="layout.tpl"}
{block name="header"}
    <script>
        $(document).ready(function () {
            var select = $('#year');
            var myDate = new Date();
            var year = myDate.getFullYear();
            for (var i = 1900; i < year + 1; i++) {
                select.append($('<option>', {
                    value: i,
                    text: i
                }));
            }
        });
    </script>
{/block}
{block name="content"}
    <form method="POST" role="form" action="/?page=add-movie" class="form-horizontal">
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Title:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
        </div>
        <div class="form-group">
            <label for="year" class="col-sm-2 control-label">Year:</label>
            <div class="col-sm-8">
                <select id="year" name="year" class="form-control">
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="format" class="col-sm-2 control-label">Format:</label><br>
            <div class="col-sm-8">
                <select name="format" id="format" class="form-control">
                    {foreach $formats as $key => $value}
                        <option value="{$key}">{$value}</option>
                    {/foreach}
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="actors" class="col-sm-2 control-label">Add actors:</label>
            <div class="col-sm-8">
                <input id="actors" type="text" class="form-control" name="actors" required/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <button type="submit" class="btn btn-primary">Add
                    movie
                </button>
            </div>
        </div>
    </form>
{/block}
