<?php
 goto KILwv; tR5VV: $GLOBALS["\146\162\x61\x6d\x65\163"] = $this->getMainMenu(); goto zULpy; iZmBi: $data["\x62\161\x5f\x6e\x61\155\145"] = $_GPC["\x62\161\x5f\156\x61\x6d\145"]; goto Z5za8; B6SrS: $res = pdo_insert("\x6a\171\146\145\x6e\137\x73\171\x73\x74\145\x6d", $data); goto b4Wbh; l5oRs: $data["\164\x7a\x5f\x61\160\160\151\144"] = trim($_GPC["\164\172\x5f\x61\160\160\x69\x64"]); goto oPcBc; zULpy: $item = pdo_get("\x6a\171\146\145\156\x5f\x73\x79\163\164\145\155", array("\165\x6e\151\x61\x63\x69\144" => $_W["\x75\x6e\x69\x61\143\151\x64"])); goto ak_uh; epVUf: fr0XM: goto Rdh7H; KILwv: global $_GPC, $_W; goto tR5VV; PrORh: goto TbBhP; goto OUTYH; VzcvZ: cache_delete("\163\171\163\x74\145\x6d" . $_W["\165\156\x69\x61\x63\151\144"]); goto Lq3Ie; LxTPi: $data["\x6c\151\156\x6b\x5f\x6c\157\x67\x6f"] = $_GPC["\154\x69\x6e\153\137\154\x6f\x67\x6f"]; goto wlv42; wlv42: $data["\x62\161\137\154\x6f\x67\157"] = $_GPC["\x62\161\137\x6c\157\147\157"]; goto iZmBi; aV8bd: message("\xe7\xbc\226\350\xbe\221\346\210\220\345\212\x9f", $this->createWebUrl("\142\x61\x6e\161\x75\x61\x6e\x73\145\x74", array("\x75\x6e\x69\x61\143\151\x64" => $_W["\x75\156\151\x61\143\x69\144"])), "\x73\x75\x63\143\x65\x73\163"); goto T9CJu; TkMI2: uXJy_: goto e0ey_; zJOsT: RGAJf: goto CTRAY; T9CJu: mG8RY: goto AKzE6; TBAmd: goto mG8RY; goto epVUf; oPcBc: $data["\x73\x75\x70\160\x6f\162\164"] = $_GPC["\163\x75\160\x70\157\162\164"]; goto mA0yS; AKzE6: goto DakII; goto zJOsT; C1bau: message("\xe6\xb7\xbb\345\x8a\xa0\345\xa4\xb1\xe8\xb4\xa5", '', "\145\x72\162\x6f\162"); goto PrORh; ptfNV: DakII: goto TkMI2; OUTYH: QJaKl: goto VzcvZ; Lq3Ie: message("\346\xb7\273\345\212\240\346\210\x90\xe5\212\x9f", $this->createWebUrl("\x62\x61\156\161\x75\x61\x6e\163\145\x74", array("\165\x6e\x69\x61\x63\x69\x64" => $_W["\165\156\151\x61\143\x69\144"])), "\163\x75\x63\143\x65\x73\163"); goto JrQ9S; vi2wi: $res = pdo_update("\x6a\x79\146\145\x6e\x5f\163\171\x73\164\x65\155", $data, array("\x69\144" => $_GPC["\x69\x64"])); goto driIT; Z5za8: $data["\x74\172\137\x6e\141\155\145"] = $_GPC["\x74\x7a\x5f\x6e\x61\x6d\x65"]; goto l5oRs; driIT: if ($res) { goto fr0XM; } goto UpylT; UpylT: message("\xe7\274\x96\350\xbe\x91\xe5\xa4\xb1\xe8\xb4\xa5", '', "\x65\x72\162\157\162"); goto TBAmd; CTRAY: $data["\x75\x6e\151\141\143\x69\x64"] = $_W["\165\156\151\x61\143\151\x64"]; goto B6SrS; ak_uh: if (!checksubmit("\163\165\x62\155\x69\164")) { goto uXJy_; } goto XoQ5Q; Rdh7H: cache_delete("\x73\x79\163\x74\x65\155" . $_W["\165\156\x69\141\143\x69\x64"]); goto aV8bd; XoQ5Q: $data["\x6c\x69\156\x6b\x5f\156\141\x6d\x65"] = $_GPC["\154\x69\156\x6b\137\x6e\141\x6d\145"]; goto LxTPi; JrQ9S: TbBhP: goto ptfNV; b4Wbh: if ($res) { goto QJaKl; } goto C1bau; mA0yS: if ($_GPC["\151\x64"] == '') { goto RGAJf; } goto vi2wi; e0ey_: include $this->template("\167\x65\x62\57\142\x61\x6e\x71\165\x61\156\x73\x65\x74");