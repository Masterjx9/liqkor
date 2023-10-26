<form method="post" action="{$baseUrl}/index.php?controller=liqkor&action=generate">
    {foreach from=$accounts item=account}
        <input type="checkbox" name="accounts[]" value="{$account|escape}">{$account|escape}<br>
    {/foreach}
    <input type="submit" value="Generate Docker Files">
</form>
