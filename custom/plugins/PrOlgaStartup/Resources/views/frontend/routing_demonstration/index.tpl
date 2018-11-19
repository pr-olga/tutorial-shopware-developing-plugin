{extends file="parent:frontend/index/index.tpl"}

{block name='frontend_index_content'}

<h1>Ich bin ein {$currentAction}-Template</h1>

<a href="{url controller='RoutingDemonstration' action=$nextAction}">
    {s name="GoToNextPage"}next page{/s}
</a>
{/block}