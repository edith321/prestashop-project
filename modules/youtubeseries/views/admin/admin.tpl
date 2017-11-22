{if $submit_form && $submit_form} <!--this checks whether something is being passed in the $submit_form value, if there is the text below is being displayed-->
    <p>
        The form is submitted
    </p>
{/if}

<p>
    {if $status && $status == 'true'}
        All is good
    {else}
        Something wrong happened
    {/if}
</p>

<form method="post">
    <input type="text" name="youtube_txt">
    <p>
    
    </p>
    <input type="submit" value="Submit changes">
</form>