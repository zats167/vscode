<?php
 goto qGeuW; jxFbh: $operation = !empty($_GPC["\157\160"]) ? $_GPC["\x6f\x70"] : "\144\151\x73\x70\154\x61\x79"; goto xEKls; r3TKj: $state = $_GPC["\x73\164\141\164\145"]; goto zJzj3; xEKls: $type = empty($_GPC["\x74\171\160\x65"]) ? "\x61\154\x6c" : $_GPC["\164\171\160\x65"]; goto r3TKj; MXvox: MZ_EJ: goto uTD3Q; q8S53: $where .= "\40\x61\156\144\x20\x62\56\165\x73\145\162\x5f\156\x61\x6d\x65\x20\x4c\111\x4b\105\40\x20\x63\x6f\x6e\x63\x61\x74\x28\47\45\47\x2c\x20\x3a\156\x61\155\x65\54\x27\45\x27\x29\x20"; goto FVP9S; FvZ82: $res = pdo_delete("\x6a\x79\x66\x65\156\x5f\x65\x61\162\156\x69\x6e\x67\x73", array("\x69\x64" => $id)); goto df2hh; wr6xc: $pagesize = 10; goto CGfoj; iJVyJ: if (!($operation == "\144\x65\154\145\164\145")) { goto MZ_EJ; } goto gCP98; zJzj3: $pageindex = max(1, intval($_GPC["\160\x61\147\145"])); goto wr6xc; J3Iap: $sql = "\163\145\x6c\145\143\x74\x20\141\x2e\52\54\x62\x2e\165\163\145\162\x5f\156\x61\x6d\x65\x20\x66\162\157\155\x20" . tablename("\x6a\171\x66\x65\x6e\x5f\145\141\162\x6e\x69\x6e\147\163") . "\x20\141\40" . "\x20\154\x65\x66\164\x20\x6a\157\x69\x6e\40" . tablename("\x6a\x79\146\x65\156\x5f\x64\151\x73\x74\162\x69\142\165\x74\151\157\156") . "\40\142\x20\x6f\x6e\40\142\56\165\163\145\162\137\x69\x64\x3d\141\x2e\165\x73\x65\162\137\x69\x64\40" . '' . $where . "\40\117\x52\104\x45\x52\x20\102\x59\40\x61\x2e\164\151\x6d\145\40\x44\x45\123\103"; goto Zcxpu; Vmi4P: $where2 = "\x20\127\x48\x45\x52\105\x20\x20\165\x6e\151\141\x63\x69\x64\x3d\72\x75\156\151\x61\x63\151\x64"; goto qiLIM; qiLIM: $data["\72\x75\156\x69\x61\x63\151\144"] = $_W["\165\x6e\x69\x61\x63\151\144"]; goto t3Q3A; pTHHS: $data["\72\x6e\141\155\x65"] = $op; goto qPXfl; disHG: $pager = pagination($total, $pageindex, $pagesize); goto iJVyJ; FVP9S: $where2 .= "\40\x61\x6e\144\x20\165\163\x65\162\137\x6e\x61\155\x65\x20\114\x49\113\x45\x20\x20\143\157\156\x63\x61\164\50\x27\x25\x27\54\x20\x3a\x6e\x61\155\145\54\47\x25\47\51\x20"; goto pTHHS; t3Q3A: if (!checksubmit("\x73\165\x62\x6d\151\x74")) { goto T0f1a; } goto jfVjV; qGeuW: global $_GPC, $_W; goto qBy0E; aQpyo: message("\345\x88\240\351\x99\xa4\xe5\xa4\261\350\xb4\xa5", '', "\x65\x72\162\157\162"); goto UcDnd; qBy0E: $GLOBALS["\146\162\141\x6d\145\163"] = $this->getMainMenu(); goto jxFbh; iL8Sm: $list = pdo_fetchall($sql, $data); goto g3YMT; gCP98: $id = $_GPC["\x69\x64"]; goto FvZ82; UcDnd: goto eJ88k; goto kJRXN; qPXfl: T0f1a: goto J3Iap; XZsvV: message("\345\x88\240\351\x99\244\346\210\220\xe5\x8a\237", $this->createWebUrl("\146\x78\x79\152", array()), "\x73\x75\x63\x63\x65\x73\x73"); goto WmsdI; df2hh: if ($res) { goto Dxejq; } goto aQpyo; jfVjV: $op = $_POST["\153\x65\x79\167\157\x72\x64\x73"]; goto q8S53; g3YMT: $select_sql = $sql . "\x20\114\111\115\111\x54\x20" . ($pageindex - 1) * $pagesize . "\54" . $pagesize; goto uipFk; kJRXN: Dxejq: goto XZsvV; uipFk: $list = pdo_fetchall($select_sql, $data); goto disHG; Zcxpu: $total = pdo_fetchcolumn("\x53\105\114\x45\x43\x54\40\143\157\x75\x6e\x74\x28\52\x29\x20\x46\x52\x4f\x4d\x20" . tablename("\x6a\x79\146\145\156\x5f\x65\141\162\156\x69\x6e\x67\163") . '' . $where2 . "\40\117\x52\104\x45\x52\x20\102\131\x20\164\x69\x6d\145\x20\104\105\123\x43", $data); goto iL8Sm; CGfoj: $where = "\40\x57\x48\x45\x52\x45\x20\x20\141\x2e\x75\156\151\141\143\x69\x64\x3d\x3a\x75\x6e\x69\x61\143\x69\x64"; goto Vmi4P; WmsdI: eJ88k: goto MXvox; uTD3Q: include $this->template("\x77\145\x62\57\x66\x78\171\x6a");