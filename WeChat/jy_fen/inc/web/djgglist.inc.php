<?php
 goto ILZQP; z2Oub: message("\xe5\x85\205\345\200\xbc\345\xa4\xb1\350\xb4\245", '', "\x65\162\162\157\x72"); goto np_Qu; JzWfZ: $total = pdo_fetchcolumn("\x53\105\114\x45\103\124\x20\x63\157\x75\x6e\x74\50\52\51\40\x46\x52\117\x4d\40" . tablename("\x6a\171\146\x65\156\x5f\144\x6a\147\147\x6c\x69\163\x74") . '' . $where2 . "\40\x4f\122\x44\105\x52\40\x42\x59\x20\151\144\40\x44\x45\123\103", $data); goto XyPIe; nHfst: $id = $_GPC["\151\x64"]; goto oEscR; np3hS: udwn0: goto HRHQs; Nbtpp: if (!($operation == "\x72\x65\152\x65\x63\164")) { goto PLICG; } goto nHfst; bl1wy: if ($res) { goto iCHyf; } goto ABJAr; WAIB7: $data3["\x6d\157\x6e\145\171"] = $_GPC["\x72\x65\160\154\x79"]; goto NWwws; kUquk: $data3["\x73\157\x6e\137\x69\x64"] = 0; goto WAIB7; fSGAl: $pagesize = 10; goto u_G2N; Jz3BD: $data3["\x75\x73\x65\x72\x5f\151\x64"] = $id; goto kUquk; naLmB: if (!($operation == "\x61\144\x6f\x70\x74")) { goto dJ8a0; } goto uEJZJ; uEJZJ: $id = $_GPC["\x69\x64"]; goto ir7b2; cR1xY: pdo_delete("\x6a\x79\x66\x65\x6e\x5f\x66\170\165\x73\145\x72", array("\x75\163\145\x72\x5f\151\144" => $id)); goto ZsB8I; LQvrz: goto L6uNc; goto BrWF_; XStem: KdSAE: goto WlOo0; hpwm7: BlAG3: goto MBRqi; LR4_d: $pager = pagination($total, $pageindex, $pagesize); goto cSkJU; fqkA3: $op = $_GPC["\x6b\145\x79\167\x6f\162\x64\x73"]; goto tWNn8; lds2E: $data["\72\x6e\141\155\145"] = $op; goto G1evP; oEscR: $res = pdo_update("\x6a\x79\146\145\x6e\137\144\152\147\147\x6c\151\163\x74", array("\163\x74\x61\164\x65" => 3), array("\151\x64" => $id)); goto bl1wy; RFbmf: if ($res) { goto id4Ot; } goto JW5HM; cTvf4: message("\xe5\210\240\xe9\231\244\xe6\x88\x90\xe5\212\x9f", $this->createWebUrl("\x66\170\x6c\151\x73\x74", array()), "\x73\x75\x63\143\145\163\163"); goto d1qUV; bcHX0: $res = pdo_insert("\152\171\146\145\x6e\137\x65\141\162\x6e\x69\x6e\147\163", $data3); goto OT_GH; SzE9c: goto LGGSc; goto f4pxr; DE9uR: $where2 = "\x20\x57\110\x45\122\x45\x20\x20\165\156\x69\141\x63\151\144\75\72\165\156\x69\141\143\151\144"; goto Jqq9K; QO0Mh: $id = $_GPC["\x69\144"]; goto oCKHW; BrWF_: id4Ot: goto cR1xY; SQJnU: message("\xe6\x8b\222\xe7\273\x9d\xe6\210\220\345\x8a\x9f", $this->createWebUrl("\146\x78\154\151\163\164", array()), "\x73\x75\x63\143\145\x73\x73"); goto y0I3_; ABJAr: message("\346\x8b\222\347\273\235\xe5\244\261\350\xb4\xa5", '', "\x65\x72\x72\x6f\162"); goto SzE9c; OT_GH: if ($res) { goto KdSAE; } goto z2Oub; UQrxz: message("\xe5\256\241\xe6\xa0\xb8\345\xa4\261\xe8\264\245", '', "\145\162\162\x6f\x72"); goto XIX00; Z_BXj: $pageindex = max(1, intval($_GPC["\160\x61\x67\x65"])); goto fSGAl; JW5HM: message("\xe5\210\240\xe9\x99\xa4\345\244\261\350\264\245", '', "\x65\162\162\157\x72"); goto LQvrz; Fs8nP: $select_sql = $sql . "\x20\x4c\111\115\x49\x54\40" . ($pageindex - 1) * $pagesize . "\x2c" . $pagesize; goto HaFhW; iQkby: XCliS: goto JEClC; hXB3Y: $sql = "\x73\x65\154\x65\143\164\x20\x61\56\52\40\54\x62\x2e\156\141\155\145\x20\x61\163\40\165\x6e\x61\155\145\54\x63\56\156\141\155\145\40\x61\x73\40\147\156\x61\155\x65\54\x64\56\x6e\141\x6d\x65\40\x61\163\40\x77\x6e\141\x6d\145\x20\146\x72\157\x6d\x20" . tablename("\x6a\x79\146\145\156\137\144\x6a\147\147\x6c\x69\x73\164") . "\40\141" . "\40\154\145\146\x74\40\152\x6f\x69\x6e\x20" . tablename("\x6a\171\146\145\156\x5f\x75\163\145\162") . "\40\142\x20\157\156\x20\x61\56\x75\x73\x65\162\137\x69\x64\75\x62\56\151\144\40\40\x6c\x65\x66\164\40\152\157\151\x6e\x20" . tablename("\x6a\x79\146\x65\x6e\137\x67\x67") . "\40\143\x20\157\156\x20\x63\x2e\151\144\x3d\x61\x2e\147\147\137\151\x64\40\154\x65\x66\164\x20\x6a\x6f\x69\156\40" . tablename("\152\171\x66\x65\x6e\x5f\x77\151\146\x69") . "\40\x64\40\157\156\x20\141\56\x77\151\x66\151\137\151\x64\x3d\x64\56\x69\x64\40" . $where . "\x20\x4f\122\104\105\122\x20\x42\x59\x20\x69\x64\40\x44\105\123\103"; goto JzWfZ; oCKHW: $res = pdo_delete("\x6a\x79\x66\x65\156\137\144\152\147\x67\154\151\x73\x74", array("\x69\x64" => $id)); goto RFbmf; YsKMV: if ($res) { goto Y7Ets; } goto UQrxz; dGRnd: $GLOBALS["\146\x72\x61\155\145\x73"] = $this->getMainMenu(); goto Z_BXj; MBRqi: hN1A2: goto BP3Y4; np_Qu: goto BlAG3; goto XStem; ILZQP: global $_GPC, $_W; goto dGRnd; tWNn8: $where .= "\x20\x61\156\x64\x20\x28\40\x62\56\156\x61\155\145\x20\114\x49\x4b\x45\x20\x20\x63\x6f\156\x63\141\164\50\47\x25\47\54\40\x3a\156\141\155\145\54\47\x25\47\51\51"; goto YloK5; TEWgQ: if (!($operation == "\x64\145\154\x65\x74\145")) { goto udwn0; } goto QO0Mh; HRHQs: if (!$_GPC["\x69\144\62"]) { goto hN1A2; } goto SbS6q; SbS6q: $id = $_GPC["\x69\x64\62"]; goto uyqSi; Jqq9K: $data["\x3a\x75\156\x69\141\x63\151\144"] = $_W["\165\156\151\x61\x63\x69\144"]; goto BJ2ye; JEClC: dJ8a0: goto Nbtpp; NWwws: $data3["\x74\151\x6d\x65"] = time(); goto NEDKF; XyPIe: $list = pdo_fetchall($sql, $data); goto Fs8nP; WlOo0: message("\345\205\x85\345\x80\274\346\210\220\345\212\237", $this->createWebUrl("\x66\170\154\x69\x73\x74", array()), "\163\165\x63\143\x65\x73\x73"); goto hpwm7; uyqSi: pdo_update("\x6a\171\146\145\x6e\x5f\x75\x73\x65\x72", array("\x63\x6f\155\155\151\x73\x73\x69\x6f\156\x20\53\x3d" => $_GPC["\162\145\160\x6c\171"]), array("\x69\144" => $id)); goto Jz3BD; ir7b2: $res = pdo_update("\x6a\171\x66\145\x6e\x5f\144\x6a\x67\x67\154\x69\x73\x74", array("\163\x74\x61\164\145" => 2), array("\x69\x64" => $id)); goto YsKMV; XIX00: goto XCliS; goto ICwAW; ICwAW: Y7Ets: goto JFRoH; cSkJU: $operation = $_GPC["\x6f\x70"]; goto naLmB; BJ2ye: if (!$_GPC["\x6b\x65\x79\x77\x6f\x72\144\163"]) { goto fNIOb; } goto fqkA3; HaFhW: $list = pdo_fetchall($select_sql, $data); goto LR4_d; NEDKF: $data3["\x75\x6e\x69\141\x63\x69\144"] = $_W["\x75\156\151\141\x63\x69\144"]; goto bcHX0; y0I3_: LGGSc: goto VErPC; G1evP: fNIOb: goto hXB3Y; VErPC: PLICG: goto TEWgQ; u_G2N: $where = "\x20\x57\x48\105\x52\x45\x20\x20\141\56\165\x6e\151\141\143\151\144\x3d\x3a\x75\x6e\x69\141\143\x69\x64"; goto DE9uR; d1qUV: L6uNc: goto np3hS; ZsB8I: pdo_delete("\152\x79\x66\145\156\x5f\x66\170\165\x73\x65\x72", array("\x66\x78\x5f\165\x73\145\x72" => $id)); goto cTvf4; YloK5: $where2 .= "\40\x61\156\x64\x20\x28\156\141\155\x65\40\x4c\111\113\105\40\40\143\157\x6e\143\141\x74\50\x27\x25\47\x2c\x20\72\156\141\x6d\145\54\47\x25\x27\x29\51"; goto lds2E; JFRoH: message("\345\xae\241\346\240\xb8\xe6\210\220\xe5\x8a\x9f", $this->createWebUrl("\x66\170\154\151\x73\x74", array()), "\163\x75\143\143\145\x73\163"); goto iQkby; f4pxr: iCHyf: goto SQJnU; BP3Y4: include $this->template("\x77\x65\x62\57\x64\152\147\x67\x6c\x69\x73\x74");