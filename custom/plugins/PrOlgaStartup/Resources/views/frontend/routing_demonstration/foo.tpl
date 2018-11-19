{extends file="parent:frontend/routing_demonstration/index.tpl"}

{block name='frontend_index_content'}

    {$smarty.block.parent}

    <p>Noch ein wenig text!</p>

    {action module='widgets' controller='listing' action='topSeller'}
{/block}