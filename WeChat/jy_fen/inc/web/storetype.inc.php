<?php
 goto h47pP; CUNGX: goto jCUKa; goto ao0I1; g34LA: m92oK: goto GvGhE; eQzAB: if ($res) { goto rxuQh; } goto QJGzX; uYYHa: gtcGD: goto ijUID; T65VI: $res = pdo_delete("\152\x79\x66\x65\156\x5f\163\x74\157\162\x65\x74\x79\160\x65", array("\x69\144" => $_GPC["\x69\144"])); goto eQzAB; mqQ88: if (!($operation == "\x64\x65\154\x65\164\145")) { goto gtcGD; } goto T65VI; c2PfC: $op = $_GPC["\153\x65\x79\x77\157\x72\144\x73"]; goto oR32z; G6pNr: $operation = empty($_GPC["\157\x70"]) ? "\144\151\x73\160\154\141\x79" : trim($_GPC["\x6f\x70"]); goto zu8fe; Y_QXc: $pagesize = 10; goto c3br6; zu8fe: $where = "\x57\110\x45\122\105\40\165\x6e\x69\x61\143\151\x64\x3d\x3a\x75\x6e\x69\x61\x63\x69\144"; goto BYlNg; c3br6: $sql = "\x73\x65\x6c\x65\143\164\40\52\40\146\x72\157\155\40" . tablename("\152\171\146\x65\x6e\x5f\163\164\x6f\x72\x65\x74\171\x70\145") . $where . "\x20\x6f\x72\x64\x65\162\40\x62\x79\x20\x69\144\40\141\163\x63"; goto XgAXT; aOrBH: $GLOBALS["\146\x72\141\x6d\145\x73"] = $this->getMainMenu(); goto G6pNr; IwWvm: $where .= "\x20\141\156\144\40\x6e\141\x6d\145\40\114\111\x4b\105\x20\72\x6e\141\155\x65\x20"; goto c2PfC; AeMch: jCUKa: goto uYYHa; h47pP: global $_GPC, $_W; goto aOrBH; H1JIQ: if (!$_GPC["\x6b\x65\171\x77\157\162\144\x73"]) { goto m92oK; } goto IwWvm; QJGzX: message("\345\x88\xa0\351\231\244\xe5\244\xb1\350\264\245\357\274\201", '', "\145\162\162\x6f\x72"); goto CUNGX; Y3dtm: $list = pdo_fetchall($select_sql, $data); goto mqQ88; XgAXT: $select_sql = $sql . "\40\114\111\x4d\111\124\x20" . ($pageindex - 1) * $pagesize . "\x2c" . $pagesize; goto iXnFj; iXnFj: $total = pdo_fetchcolumn("\163\145\154\145\143\x74\x20\x63\157\165\156\x74\x28\x2a\51\x20\x66\162\157\x6d\x20" . tablename("\x6a\171\146\145\156\x5f\163\x74\x6f\x72\145\164\171\160\145") . $where . "\40\x6f\x72\144\x65\x72\x20\142\171\40\151\144\x20\x61\163\x63", $data); goto GQYzy; tVbmn: message("\345\210\xa0\351\231\244\346\210\x90\xe5\x8a\x9f\357\xbc\201", $this->createWebUrl("\163\x74\x6f\x72\x65\164\171\160\145"), "\163\x75\x63\143\145\x73\x73"); goto AeMch; BYlNg: $data["\x3a\x75\x6e\151\x61\143\151\144"] = $_W["\x75\156\151\141\x63\x69\144"]; goto H1JIQ; GQYzy: $pager = pagination($total, $pageindex, $pagesize); goto Y3dtm; oR32z: $data["\x3a\156\141\x6d\x65"] = "\x25{$op}\x25"; goto g34LA; ao0I1: rxuQh: goto tVbmn; GvGhE: $pageindex = max(1, intval($_GPC["\x70\141\x67\145"])); goto Y_QXc; ijUID: include $this->template("\x77\x65\x62\x2f\x73\164\157\162\145\164\x79\160\145");