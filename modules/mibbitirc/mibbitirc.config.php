; <?php die( 'Access forbidden.' ); /* DO NOT MODIFY THIS LINE! ?>
;
; Clansuite Sysinfo Configuration File for Module mibbitirc
; \trunk\modules\mibbitirc\mibbitirc.config.php 
;

;----------------------------------------
; mibbitirc
;----------------------------------------
[mibbitirc]
mibbit_irc_page_title = "Clansuite - Internet Relay Chat"
mibbit_irc_nickname_prefix = "cs_"
mibbit_irc_server = "mediatraffic.fi.quakenet.org"
mibbit_irc_channel = "clansuite"
mibbit_irc_width = "500"
mibbit_irc_height = "300"


;----------------------------------------
; properties
;----------------------------------------
[properties]
active = true
module_section =
module_id =


; -------------------------------------------------------------------------------
; define here all actions was defined in module and module admin controler
; who necesary permission to access
; -------------------------------------------------------------------------------
;
; ACL action values are:
;    all = all groups has access
;    or
;    root(r) | admin(a) | member(m) | guest(g) | bot(b)
;
;  e.g. acces for: root + admin only
;        show = r|a
;  e.g. acces for: root + admin + member only
;        show = r|a|m
;  e.g. acces for: root + admin + member + guest only
;        show = r|a|m|g
;  e.g. acces for: bots only
;        show = b
;
;----------------------------------------
; properties_acl
;----------------------------------------
[properties_acl]
action_show = 'all'



; DO NOT REMOVE THIS LINE */ ?>