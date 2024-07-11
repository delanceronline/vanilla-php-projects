<!-- header -->
<div class="header">
<!-- topbar -->
<div class="topbar">
        <img alt="ManyManyHome.com" src="images/logo.png" border="0">
        <ul class="langMenu">
      <li><a href="#">简体</a></li>
            <li><a href="#">繁體</a></li>
            <li><a href="#" class="active">Home</a></li>
        </ul>
</div>
<!-- topbar end -->

<!-- 2ndbar -->
<div class="bar2">
<!-- menu bar -->
<ul class="mainMenu">
         <li><a href="index.php">首頁</a></li>
         <li><a href="./../register.php" target="_blank">會員登記</a></li>
         <li><a href="./../login.php?language=Chinese%20(Hong%20Kong%20S.A.R.)" target="_blank">放盤管理</a></li>
         <li><a href="#">Blog</a></li>
</ul>
<!-- menu bar end-->
</div>
<!-- 2ndbar end -->

<!-- Search Bar -->
<div class="searchbar">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td height="25">&nbsp;</td>
            <td align="center">放盤人</td>
            <td align="left">
            <select name="r" id="r" class="headerMenu" onchange="dropMenuSubmit(this.form)">
              <option value="">全部</option>
              <option value="0">個人業主</option>
              <option value="1">地產代理</option>
            </select></td>
            <td align="center">放盤種類</td>
            <td><select name="k" class="headerMenu" id="k" onchange="dropMenuSubmit(this.form)">
              <option value="">全部</option>
              <option value="9">樓盤出售</option>
              <option value="10" >樓盤出租</option>
              <option value="11" >工商舖出售</option>
              <option value="12" >工商舖出租</option>
            </select></td>
            <td align="center">地區</td>
            <td align="left"><select name="ri" class="headerMenu" id="ri" onchange="dropMenuSubmit(this.form)">
              <option value="">全部</option>
              <option value="HK" style="background-color:#ffdb29">----------香港區----------
              <option value = '100' >西貢
              <option value = '125' >將軍澳
              <option value = '130' >太和                    
              <option value = '101' >馬鞍山                         
                <option value = '102' >沙田                         
                <option value = '103' >大埔                         
                <option value = '126' >火炭                         
                <option value = '104' >粉嶺                         
                <option value = '124' >大圍                         
                <option value = '105' >上水                         
                <option value = '107' >元朗                         
                <option value = '108' >天水圍                         
                <option value = '110' >屯門                         
                <option value = '111' >深井(屯門)                         
                <option value = '112' >深井(荃灣)                         
                <option value = '113' >荃灣                         
                <option value = '122' >大窩口                         
                <option value = '114' >葵涌                         
                <option value = '132' >葵芳                         
                <option value = '123' >青衣                         
                <option value = '115' >馬灣                         
                <option value = '116' >東涌                         
                <option value = '117' >愉景灣                         
                <option value = '118' >大嶼山                         
                <option value = '119' >坪洲                         
                <option value = '128' >南丫島                         
                <option value = '120' >長洲                         
                <option value = '121' >其他離島                         
                <option value = '133' >石澳
              </option>
              <option value="<?=$showHKAreaArray[$i][0];?>">&nbsp;&nbsp;&nbsp;
              </option>
              <option value="KLN" style="background-color:#ffdb29">----------九龍區----------
              <option value = '131'  >油塘
                                <option value = '52'  >藍田
                                <option value = '53'  >秀茂坪
                                <option value = '54'  >觀塘
                                <option value = '81'  >牛頭角
                                <option value = '55'  >新蒲崗
                                <option value = '127'  >牛池灣
                                <option value = '56'  >九龍灣
                                <option value = '129'  >樂富
                                <option value = '57'  >黃大仙
                                <option value = '79'  >鑽石山
                                <option value = '58'  >九龍城
                                <option value = '59'  >九龍塘
                                <option value = '60'  >何文田
                                <option value = '61'  >石硤尾
                                <option value = '62'  >深水?
                                <option value = '63'  >長沙灣
                                <option value = '64'  >荔枝角
                                <option value = '65'  >美孚
                                <option value = '66'  >長沙灣西區
                                <option value = '80'  >荔景
                                <option value = '67'  >大角咀
                                <option value = '68'  >奧運
                                <option value = '69'  >九龍站
                                <option value = '70'  >太子
                                <option value = '71'  >旺角
                                <option value = '72'  >油麻地
                                <option value = '73'  >佐敦
                                <option value = '74'  >尖沙咀
                                <option value = '75'  >紅磡
                                <option value = '76'  >黃埔
                                <option value = '77'  >土瓜灣
                                <option value = '78'  >又一村
              </option>
              <option value="<?=$showKLNAreaArray[$i][0];?>">&nbsp;&nbsp;&nbsp;
              </option>
              <option value="NT" style="background-color:#ffdb29">-------新界區 / 離島-------
              <option value = '6' >大潭
                                <option value = '5' >赤柱
                                <option value = '4' >淺水灣
                                <option value = '7' >陽明山莊
                                <option value = '8' >薄扶林
                                <option value = '9' >薄扶林花園
                                <option value = '10' >碧瑤灣
                                <option value = '11' >壽臣山
                                <option value = '12' >香港仔
                                <option value = '44' >黃竹坑
                                <option value = '13' >海怡半島
                                <option value = '45' >鴨?洲
                                <option value = '14' >南區
                                <option value = '15' >山頂
                                <option value = '16' >西半山
                                <option value = '17' >西區
                                <option value = '42' >堅尼地城
                                <option value = '18' >上環
                                <option value = '41' >西營盤
                                <option value = '43' >西環
                                <option value = '19' >中環
                                <option value = '20' >中半山
                                <option value = '21' >金鐘
                                <option value = '22' >灣仔
                                <option value = '23' >銅鑼灣
                                <option value = '24' >跑馬地
                                <option value = '25' >肇輝臺
                                <option value = '26' >跑馬地半山
                                <option value = '27' >渣甸山
                                <option value = '28' >大坑
                                <option value = '29' >北角半山
                                <option value = '30' >北角
                                <option value = '40' >天后
                                <option value = '31' >?魚涌
                                <option value = '32' >太古城
                                <option value = '33' >鯉景灣
                                <option value = '34' >筲箕灣
                                <option value = '35' >杏花村
                                <option value = '36' >柴灣
                                <option value = '38' >西灣河
                                <option value = '39' >炮台山
                                <option value = '180'>其它國家

              </option>
              <option value="<?=$showNTAreaArray[$i][0];?>">&nbsp;&nbsp;&nbsp;
              </option>
            </select></td>
            <td align="center">面積</td>
            <td><select name="a" class="headerMenu" id="a" onchange="dropMenuSubmit(this.form)">
              <option value="">全部</option>
              <option value="1">&lt;500呎</option>
              <option value="2">500-800呎</option>
              <option value="3">800-1200呎</option>
              <option value="4">1200-2000呎</option>
              <option value="5">&gt;2000呎</option>
            </select></td>
            <td align="center">類型</td>
            <td><select name="t" class="headerMenu" id="t" onchange="dropMenuSubmit(this.form)">
              <!-- 樓宇-->
              <option value="">全部</option>
              <option value="1">新樓</option>
              <option value="3" >私人樓宇</option>
              <option value="4" >居屋</option>
              <option value="5" >村屋</option>
              <option value="6" >公屋</option>
              <!-- 工商舖-->
              <option value="11" >廠廈</option>
              <option value="12" >商廈</option>
              <option value="13" >街舖</option>
              <option value="14" >樓上舖</option>
              <option value="15" >貨倉</option>
            </select></td>
            <td align="center">價錢</td>
            <td class="searchText"><select name="p" class="headerMenu" id="p"  onchange="dropMenuSubmit(this.form)">
              <option value="">全部</option>
              <!-- 賣盤-->
              <option value="1" >&lt;100萬</option>
              <option value="2" >100-199萬</option>
              <option value="3" >200-299萬</option>
              <option value="4" >300-399萬</option>
              <option value="23" >400-499萬</option>
              <option value="24" >500-799萬</option>
              <option value="25" >&gt;800萬</option>
              <!-- 租盤-->
              <option value="5" >&lt;5000月</option>
              <option value="6" >5000-10000月</option>
              <option value="8" >10000-20000月</option>
              <option value="9" >&gt;20000月</option>
              <option value="10" >&lt;100萬</option>
              <!-- 工商盤-->
              <option value="11" >100-199萬</option>
              <option value="12" >200-299萬</option>
              <option value="13" >300-399萬</option>
              <option value="26" >400-499萬</option>
              <option value="27" >500-799萬</option>
              <option value="28" >&gt;800萬</option>
              <!-- 工商賣盤-->
              <option value="14" >&lt;5000月</option>
              <option value="15" >5000-10000月</option>
              <option value="16" >10000-20000月</option>
              <option value="17" >20000-50000月</option>
              <option value="18" >50000-100000月</option>
              <option value="19" >&gt;100000月</option>
            </select></td>
            <td align="center">已售</td>
            <td class="searchText"><select class="headerMenu" name="s" id="s" onchange="dropMenuSubmit(this.form)">
              <option  value="">全部</option>
              <option value="false">未售盤</option>
              <option value="true">已售盤</option>
            </select></td>
            <td class="searchText">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table>
</div>
<!-- Search Bar end-->
</div>
<!-- header end -->