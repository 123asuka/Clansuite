{* {$last_registered_users|var_dump} *}

<!-- Start: last_registered_users widget @ Standard Theme // -->

{foreach item=lastuser from=$last_registered_users}

{$lastuser.user_id}
{$lastuser.email}
{$lastuser.nick}
{$lastuser.country}
<br />

{/foreach}
<!-- End: last_registered_users widget // -->