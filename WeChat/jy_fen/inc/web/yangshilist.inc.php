<?php
 goto KOIwb; reVEa: if ($res) { goto uAuX2; } goto Rbqs8; Icg1e: JGLyH: goto vJ9kJ; xy2nD: $res = pdo_delete("\x6a\x79\146\x65\x6e\137\x79\141\x6e\147\x73\150\x69", array("\x69\144" => $_GPC["\151\x64"])); goto VFV6C; NhpWn: message("\347\xbc\226\350\xbe\x91\xe6\210\x90\xe5\x8a\x9f\357\xbc\201", $this->createWebUrl("\171\141\156\x67\163\150\151\x6c\x69\x73\x74"), "\x73\x75\x63\x63\x65\163\x73"); goto POp7C; FZPwd: goto OMKTS; goto wYh7A; DCEko: message("\xe5\x88\xa0\351\x99\xa4\345\xa4\xb1\350\264\xa5\xef\xbc\201", '', "\x65\162\162\157\162"); goto FZPwd; KOIwb: global $_GPC, $_W; goto DV8pQ; QPRfa: $pagesize = 10; goto nt22v; VFV6C: if ($res) { goto vJ4jJ; } goto DCEko; yMiPg: $select_sql = $sql . "\x20\x4c\x49\x4d\x49\124\40" . ($pageindex - 1) * $pagesize . "\54" . $pagesize; goto Xoic8; cqJPe: message("\xe5\210\xa0\xe9\231\244\346\210\220\xe5\212\x9f\357\274\x81", $this->createWebUrl("\171\x61\x6e\x67\163\x68\x69\x6c\x69\x73\x74"), "\x73\165\x63\143\145\x73\163"); goto SBB5q; QLQBj: $total = pdo_fetchcolumn("\x53\x45\x4c\x45\103\x54\x20\143\x6f\165\156\x74\50\x2a\x29\x20\106\x52\x4f\x4d\40" . tablename("\152\171\146\x65\156\137\171\141\x6e\147\163\150\151") . '' . $where . "\40\117\122\104\x45\x52\x20\x42\x59\x20\x69\144\40\x44\x45\x53\103"); goto IWrpX; Rbqs8: message("\347\274\226\xe8\xbe\221\xe5\244\xb1\xe8\264\xa5\xef\274\201", '', "\x65\x72\x72\x6f\162"); goto ue2zE; NIEpU: $sql = "\163\145\x6c\145\x63\164\40\x2a\40\x66\162\157\155" . tablename("\x6a\x79\146\x65\x6e\137\x79\141\156\147\163\x68\151") . "\x20\x20{$where}\40\157\162\144\145\162\x20\x62\171\40\x69\144\40\x64\145\163\143"; goto QLQBj; mOs9d: if (!$_GPC["\x73\x74\141\x74\x75\x73"]) { goto JGLyH; } goto LpNs4; DV8pQ: $GLOBALS["\146\x72\x61\x6d\145\163"] = $this->getMainMenu(); goto pb6jr; k36RL: $pager = pagination($total, $pageindex, $pagesize); goto qQ0On; ue2zE: goto G5ZkI; goto nPjUq; nPjUq: uAuX2: goto NhpWn; POp7C: G5ZkI: goto Icg1e; LpNs4: $data["\163\164\141\164\165\163"] = $_GPC["\163\164\x61\164\165\x73"]; goto UmD2T; v_7Bx: CSovf: goto mOs9d; IWrpX: $list = pdo_fetchall($sql); goto yMiPg; NAD5e: $pageindex = max(1, intval($_GPC["\x70\141\x67\x65"])); goto QPRfa; SBB5q: OMKTS: goto v_7Bx; qQ0On: if (!($_GPC["\x6f\160"] == "\144\145\154\x65\x74\145")) { goto CSovf; } goto xy2nD; Xoic8: $list = pdo_fetchall($select_sql); goto k36RL; UmD2T: $res = pdo_update("\152\x79\146\x65\156\x5f\x79\x61\x6e\x67\x73\x68\151", $data, array("\x69\144" => $_GPC["\x69\144"])); goto reVEa; nt22v: $where = "\x20\127\x48\x45\x52\x45\40\165\x6e\x69\141\143\x69\144\x3d{$uniacid}\x20"; goto NIEpU; pb6jr: $uniacid = $_W["\165\x6e\151\141\x63\x69\144"]; goto NAD5e; wYh7A: vJ4jJ: goto cqJPe; vJ9kJ: include $this->template("\167\145\x62\57\171\141\156\147\163\x68\151\x6c\x69\x73\x74");