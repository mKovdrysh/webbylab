{extends file="layout.tpl"}

{block name="content"}
    <form method="POST" role="form" class="form-inline">
        <div class="form-group">
            <label for="search">Title or Author:</label>
            <input type="text" id="search" class="form-control" name="title" value="{$title}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Search</button>
        </div>
    </form>
    <div>
        <h3>Movies:</h3>
        {foreach $result as $movie}
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="lead">{$movie.title}</span>
                </div>
                <div class="panel-body">
                    <div>
                        <span>Stars: {$movie.actors} </span><br>
                        <span>Release year: {$movie.year} </span><br>
                        <span>Format: {$movie.format} </span>
                    </div>
                </div>
                <div class="panel-footer">
                    <a href="/?page=delete-movie&id={$movie.id}" class="btn btn-default">Delete</a>

                </div>
            </div>
        {/foreach}
    </div>
{/block}
