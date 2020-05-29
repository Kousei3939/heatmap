<?php
 $data = 70;
 var_dump($data);
?>
<?php
try{
    $pdo = new PDO(
        'mysql:host=localhost;dbname=heatmap;charset=utf8',
        'root',
        ''
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}catch(PDOException $Exception){
    echo '接続エラー：' .$Exception->getMessage();
}
try{
    $sql = "SELECT * FROM heatmap";
    $stmh = $pdo->prepare($sql);
    $stmh->execute();
}catch(PDOException $Exception){
    die('接続エラー：' .$Exception->getMessage());
}
 

echo "<pre>";
$data = [];

    while($row = $stmh->fetch(PDO::FETCH_ASSOC)){
   
        array_push($data , $row);
    }
    $pdo = null;

    var_dump($data);
    $json = json_encode( $data ) ;
// if(isset($_POST['time']) && isset($_POST['page'])
// && isset($_POST['xcoord'])&& isset($_POST['ycoord'])
// ){
 
//     $data = array();
//     $page = htmlentities($_POST['page']);
//     if($page == "/"){ $page = "/index.php"; }
//     $mysqldatebefore = date( 'Y-m-d H:i:s', strtotime("-1 ".$_POST['time']) );
 
//       $con2 = mysql_connect('localhost', $dbuser, $dbpass);
//               mysql_select_db($dbname, $con2);
 
//     $result = mysql_query("SELECT x, y FROM `clicks` WHERE `time` > '$mysqldatebefore' && page = '$page'");
//             $i = 0;
//              while($row = mysql_fetch_array($result)){
//                 $data[$i] = array();
//                 $data[$i]['x'] = $row['x'];
//                 $data[$i]['y'] = $row['y']; 
//                 $i++;
//              }
 
//             $data['amount'] = $i;
//             mysql_close($con2);
// echo json_encode($data);
// }
 
?>

<script>



 var data = <?= $json; ?>;
console.log(data);
    window.onload = function() {
      // create a heatmap instance
      var heatmap = h337.create({
        container: document.getElementById('heatmapContainer'),
        maxOpacity: .6,
        radius: 50,
        blur: .90,
        // backgroundColor with alpha so you can see through it
        backgroundColor: 'rgba(0, 0, 58, 0.96)'
      });
      var heatmapContainer = document.getElementById('heatmapContainerWrapper');

    
    //   heatmapContainer.onmousemove = heatmapContainer.ontouchmove = function(e) {
    //     // we need preventDefault for the touchmove
    //     e.preventDefault();
    //     var x = e.layerX;
    //     var y = e.layerY;
    //     if (e.touches) {
    //       x = e.touches[0].pageX;
    //       y = e.touches[0].pageY;
    //     }
        
    //     heatmap.addData({ x: x, y: y, value: 1 });

    //   };

      heatmapContainer.onclick = function(e) {
        var x = e.layerX;
        var y = e.layerY;
  

        heatmap.addData({ x,y, value: 1 });


        do {
            count++;
    heatmap.addData({ x,y, value: 1 });
} while( json );

      };


  

    };
    
  
  </script>

<!DOCTYPE html>
<html lang="ja">
<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
    </script>

<script src="heatmap.js">
</script>



<script>

// while(data--){
//   json= (x,y);
//  if(!currentBounds.contains(latlng)) {
//   continue;
//   }
//  me.latlngs.push({json});
//  point = me.pixelTransform(projection.fromLatLngToDivPixel(latlng));
//  mapdata.data.push({x, y,time,page});
// }



$(document).ready(function() {
	$(document).click(function(e){
      log_click(window.location.href.toString().split(window.location.host)[1], e.pageX, e.pageY);
   });
	// var canvas = document.getElementsByTagName('canvas')[0];
	// canvas.style.display = "none";   
});

function log_click(page, x, y){ // log clicks for heatmap
	$.post("./logclick.php", {
		page: page, 
		x_coord : x,
		y_coord: y
	}, function(data){
		if (data == 1){ 
			console.log("Click logged: " + x + ", " + y);

	} else{
      console.log("Error - click not logged " + x + ", " + y);
   }
  }) 
}
</script>










        <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1" />
    <title>日仏貿易株式会社 様 &#8211; 業務のアウトソーシングなら株式会社ウィズアス</title>
    <meta name="description" content="年間400以上5000名規模の研修運営と自社研修施設の常駐管理で運用安定化" />
    <meta name="robots" content="" />
    <!-- ogp -->
    <meta property="og:url" content="https://www.withus-inc.co.jp/casestudies/bosch/" />
    <meta property="og:title" content="日仏貿易株式会社 様｜株式会社ウィズアス" />
    <meta property="og:type" content="article">
    <meta property="og:description" content="年間400以上5000名規模の研修運営と自社研修施設の常駐管理で運用安定化" />
    <meta property="og:image" content="https://www.withus-inc.co.jp/wp-content/uploads/2020/04/nichifutsu.jpg" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@Twitterユーザー名" /><!--後で追加-->
    <meta property="og:site_name" content="株式会社ウィズアス" />
    <meta property="og:locale" content="ja_JP" />

    <!-- icon -->
    <link rel="icon" sizes="16x16" href="https://www.withus-inc.co.jp/wp-content/themes/withus/images/favicon.png" type="image/png" /> 
    <link rel="apple-touch-icon" sizes="128x128" href="/apple-touch-icon.png"  >
    <!-- <meta name="msapplication-TileImage" content="画像のURL" /> -->

    <!-- style js -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://www.withus-inc.co.jp/wp-content/cache/autoptimize/css/autoptimize_0b05619eecd812a01f227f5b8ab3206e.css" />
   

    <!-- feed -->
    <link rel="alternate" type="application/rss+xml" title="業務のアウトソーシングなら株式会社ウィズアス &raquo; フィード" href="https://www.withus-inc.co.jp/feed/" />
    <link rel="alternate" type="application/rss+xml" title="業務のアウトソーシングなら株式会社ウィズアス &raquo; コメントフィード" href="https://www.withus-inc.co.jp/comments/feed/" />
</head>

<body>
    <div id="heatmapContainerWrapper">
        <div id="heatmapContainer">
    
    <div class="firstview mincho">
    <h1 class="firstview_ttl">事例紹介</h1>
    </div>
    <div class="article_ttl general_width_large">
    <h2 class="mincho">認知を目的とし、指名検索ボリュームアップというKPIを達成のために行ったイベントとは？</h2>
    <img src="img/top.jpg" alt="">
    </div>

    <div class="nav">
        <h3>目次</h3>
        <ol class="mainlist">
            <li><a href="#about">イベント概要</a></li>
            <li><a href="#reason">問い合わせの経緯</a></li>
            <li><a href="#goal">目的</a></li>
            <li><a href="#problem">課題感</a></li>
            <li><a href="#process">ローンチパーティ」が開催されるまで</a></li>
            <li><a href="#flow">イベント当日</a>
                    <ol class="sublist">
                            <li><a href="#flowClient">主催者側（日仏貿易さま）の動き</a></li>
                            <li><a href="#flowWithus">運営側（ウィズアス）の動き</a></li>
                    </ol>
            </li>
            <li><a href="#goodPoint">開催を終えて良かったこと</a></li>
            <li><a href="#fromWithus">ウィズアス担当者より</a></li>
        </ol>
    </div>

    <section class="company">
        <div class="general_width_large">
        <h3>クライアント情報</h3>
        <div class="company_chart">
        <img src="img/nichifutsu.jpg" alt="" >
        <table>
            <tbody>
            <tr>
                <th>会社名</th> <td>日仏貿易株式会社</td>
            </tr>
            <tr>
                <th>業種</th> <td>輸入販売</td>
            </tr>
            <tr>
                <th>事業内容</th> <td>デニスジャパンに属する食品・飲料に特化した輸入・卸商社</td>
            </tr>
            <tr>
                <th>利用サービス</th> <td>イベント運営アウトソーシング</td>
            </tr>
        </tbody>
        </table>
        </div>
    </div>
    </section>

    <section id="about" class="event_about">
        <div class="general_width_large">
            <h3 class="section_ttl">1.イベント概要</h3>
            <table>
                <tr>
                    <th>イベント名</th> <td>ペリエローンチパーティ</td>
                </tr>
                <tr>
                    <th>開催日時</th>
                    <td>
                    <p>2020/1/24（金）</p>
                    <p>第1部&nbsp;メディアコンファレンス&nbsp;13:30～14:30</p>
                    <p>第2部&nbsp;パーティ・Tシャツコンペティション&nbsp;15:00～17:00</p>
                </tr>
                <tr>
                    <th>会場</th> <td>在日フランス商工会議所（東京都中央区日本橋）</td>
                </tr>
            </table>
            <div class="event_aboutWrap">
            <div class="event_aboutTxt">
                  <p>本イベントでは、日仏貿易さまがフランス産ナチュラルミネラルウォーター「ペリエ」の正規の代理店になったことを発表しました。</p>
                  <p>第1部「メディアコンファレンス」では、ペリエの歴史や今後のブランディング、販売戦略について広報され、第2部「パーティ・Tシャツコンペティション」では、ブランドイメージの向上のためにペリエの歴史が詰まったロゴとボトルシェイプを用いたTシャツのデザインを公募してコンペティションを行い、小売店や業務店、問屋、インフルエンサー向けのパーティーを開催されました。</p>
                   <p>本イベントにはメディアに情報を発信するキックオフイベントの意味もありました。<br>
                    今回なぜ広報のチャネルをこのようなPRイベントにしたというと、ペリエというブランドを扱う顧客としてリテール（小売業）とフードサービス（実店舗）がありますが、今回は両方をターゲットにしたからです。</p>
                    <p>ターゲット層の幅が広いので、認知を拡大させるのに一番効率がいいチャネルがイベントだと考えました。また、目で見てわかる（体験）をしてもらいたいという考えもあったために今回のような「ローンチパーティ」を企画しました。</p>
                    <p>今後ペリエのお客様になるような方をターゲットとしてペリエのブランドを理解、認知、拡散してもらうために「ペリエブランド」の歴史とこれからのマーケティング戦略を紹介しました。
                    </p>
                </div>
                <img src="img/1_event.jpg" alt="" >
                </div>
            </div>
        </section>

        <section class="reason" id="reason">
            <div class="general_width_large">
            <h3 class="section_ttl">2.問い合わせの経緯</h3>
            <div class="reason_txt">
                <h4 class="voice_ttl">-お客さまの声</h4>
                <p>問い合わせのきっかけとして、日仏貿易主催の「モナンカップ」というバーテンダーのカクテル大会をウィズアスが運営サポートしていたことがあげられます。</p>
                <p>そこで1回目の運営がスムーズにいったことと、前回の提案の際に提案力と価格面を評価していただいたので再度、ウィズアスに相談していただけました。</p>
                <p>また、もう一度一から「ペリエ」のブランディングを説明して、毎回新しい業者に頼むというスイッチングコストを懸念されていたこともあり、事業内容なども理解のあるウィズアスにお声がけをいただきました。</p>
            </div>
            <img src="img/2_reason.jpg" alt="" >
            </div>
        </section>

        <section class="client_goal" id="goal">
            <div class="general_width_large">
                <h3 class="section_ttl">3.目的</h3>
            <div class="flex-box">
                <div class="client_goal_txt">
                    <h4 class="voice_ttl">-お客さまの声</h4>
                    <p>今後、ポップアップストアなどの店舗でのプロモーションを各地で開催していく予定をしていたので、業務店のようなお客さまをターゲットとして集客しました。</p>
                    <p>また、ターゲットにはインフルエンサーも含まれていため、InstagramなどのSNSでの拡散を狙って会場の装飾としてシューティングスポット（撮影ポイント）を設置したいという要望がありました。</p>
                </div>
                <img src="img/3_goal.jpg" alt="" >
            </div>
        </div>
        </section>

        <section class="time_problem" id="problem">
            <div class="general_width_large">
                <h3 class="section_ttl">4.課題感</h3>
                <div class="flex-box">
                <img src="img/4_problem.jpg" alt="" >
                <div class="time_problem_txt">
                    <h4 class="voice_ttl">-お客さまの声</h4>
                    <p>課題として、今回あまり時間がない中で準備をしてもらわなければならなかったということがあげられます。そのため、業者の選択や検討の期間を短縮するためにも以前からお付き合いのある業者に頼ませていただきました。</p>
                    <p>今回作りこみのポイントとして重要だったのがシューティングボードでした。展示会の施工会社さまもいらっしゃるのでウィズアスさんにやってもらうのか施工のプロに頼むのかで悩みました。</p>
                    <p>ウィズアスさんにご相談したところ、イメージにマッチした提案をしていただけたので信頼して任せることができました。</p>
                    <p>全体的な課題感でいうと、短期間でどうやって運営まで持っていくのかという点がありました。</p>
                    <p>今回のようにイベントのボリューム感ですと弊社の人間だけでは回しきれなかったので、当日のディレクションなど懸念点ではあったのですが、ウィズアスさんにしっかりと運営のサポートを入っていただいくことができました。イベント当日のディレクションはほぼ100パーセントお願いすることができたと思います。</p>
                    <p>また、装飾に関してブランディングの観点などから要望ありましたので、装飾の費用を予算内で抑えなければなりませんでした。</p>
                </div>
            </div>
            </div>
        </section>

        <section class="process" id="process">
            <div class="general_width_large process_wrap">
                <h3 class="section_ttl">5.「ローンチパーティ」が開催されるまで</h3>
                <img src="img/5_chart.jpg" alt="" >
                <p>-それでは、実際にウィズアスの製作チームがどのように打ち合わせを進めて開催準備を進めてかを時系列順に紹介していきます。</p>
                <div class="process_chart">
                 <!-- chart -->
                    <dl>
                        <dt class="mincho">
                            <p >12月2日(月)</p>
                            <h4><span>ウィズアス担当者が日仏貿易さまに訪問して<br class="br-pc">キックオフミーティング<img src="svg/12_2.svg" alt="" ></span></h4>
                        </dt>
                        <dd>
                            <p>日仏貿易さまに訪問して今回の「ローンチパーティ」についての概要をヒアリングしました。施工、レイアウト、スケジュール、装飾、見積もりについて確認しました。</p>
                        </dd>
                    </dl>
                        <dl>
                        <dt class="mincho">
                            <p >12月12日（火）</p>
                            <h4><span>ウィズアス製作チームが<br>日仏貿易さまに訪問して打ち合わせ<img src="svg/12_12.svg" alt="" ></span></h4>
                        </dt>
                        <dd>
                            <p>日仏貿易さまとウィズアス製作チームの顔合わせ。<br>事前にウィズアス社内で計画書、図面、見積もりを共有してレイアウトや施工、全体のスケジュールについて修正案を提案して確認しました</p>
                        </dd>
                        </dl>
                        <dl>
                        <dt class="mincho">
                            <p>12月24日（火）</p>
                            <h4><span>通訳さまが行う業務の<br class="br-br">内容を確認<img src="svg/12_24.svg" alt="" ></span></h4>
                        </dt>
                        <dd>
                            <div>
                                <p>打ち合わせを振り返って全体の確認。会場のレイアウトを確認させていただいたり、日仏貿易さまからのいただいた資料について確認しました。</p>
                                <p>また、プログラム内容がまだ確立していなかった時期だったので、どのタイミングで通訳や司会進行にともなうプレゼン画面や映像が必要になるのか打ち合わせをしました。</p>
                                <p>今回のイベントで重要な装飾については、会場に付属する装飾品の確認させていただいたり、ウィズアスが製作する造作品の確認を致しました。</p>
                            </div>
                        </dd>
                    </dl>
                        <dl><dt class="mincho">
                        <p>1月7日（火）</p>
                        <h4><span>ウィズアス製作チームで<br>社外の装飾業者と打ち合わせ<img src="svg/1_7.svg" alt="" ></span></h4>
                    </dt>
                    <dd>
                        <div>
                            <p>ウィズアス製作チームのみで打ち合わせを行いました。イメージ写真を共有して予算を伝えて、シューティングボードの施工と会場の装飾について要望を出させていただきました。</p>
                            <p>装飾のイメージ写真を見せてもらいながら意見をすり合わせて、日仏貿易さまに装飾イメージを共有する期日を決めたりする打ち合わせになりました。</p>
                        </div>
                    </dd>
                    </dl>
                        <dl>
                        <dt class="mincho">
                        <p>1月8日（水）</p>
                        <h4><span>日仏貿易さまに訪問し<br class="br-sp">ケータリングの打ち合わせ<img src="svg/12_2.svg" alt="" ></span></h4>
                    </dt>
                        <dd>
                        <div>
                            <p>ケータリング業者に関しては、日仏貿易さまがご自身でケータリング業者を手配していたので、ウィズアス製作チームの業務分担を確認しました。</p>
                            <p>ケータリング準備に必要なパントリーや作業スペースについてや他の業者との兼ね合いもあるために搬入の時間を確認しました。</p>
                        </div>
                    </dd>
                    </dl>
                        <dl>
                        <dt class="mincho">
                        <p>1月10日（金）</p>
                        <h4><span>会場の下見<img src="svg/1_10.svg" alt="" ></span></h4>
                        </dt>
                        <div>
                                <dd>
                            <p>打ち合わせではなく内部タスクとして製作担当者が会場を下見しました。</p>
                            <p>会場が在日フランス商工会議所ということもあり、通常、PRイベントを行う会場とは勝手 が違うこともあり会場の設備や状況を入念に行いました。</p>
                            <p>会場下見で確認したポイントは以下になります。</p>
                             <div>
                                    <h5 class="points_before">会場下見のポイント</h5>
                                    <ul class="points">
                                        <li><span>1</span>
                                            <h6 class="mincho">サイネージの画像のサイズ</h6>
                                                <p>サイネージとは駅構内や百貨店でよく見かける電子広告を表示する平面ディスプレイ の看板のことです。サイネージに貼る紙の素材についてや映像が写すための確認作業 を行いました。</p></li><li>
                                                <span>2</span>
                                            <h6 class="mincho">天井高や飾り棚のサイズ</h6>
                                                <p>サイネージとは駅構内や百貨店でよく見かける電子広告を表示する平面ディスプレイ の看板のことです。サイネージに貼る紙の素材についてや映像が写すための確認作業 を行いました。</p></li><li><span>3</span>
                                            <h6 class="mincho">業者さんの駐車場所と動線の確認</h6>
                                            <p>搬入車両の場所や時間、搬入室、経路、トラックの留め置きができる場所の確認を行いました。</p></li><li><span>4</span> <h6 class="mincho">床の素材</h6>
                                            <p>カーペット式なのか、フロアなのか。パネルや展示物を搬入、設置する際に養生が必要なのか確認をしました。</p></li><li><span>5</span>
                                            <h6 class="mincho">当日の開場時間とゴミの確認</h6>
                                            <p>当日の鍵開け時間とごみの分別の再確認を行いました。</p></li><li><span>6</span>
                                            <h6 class="mincho">控室の確認</h6>
                                            <p>会場によっては控室を用意することが出来ない場合があるのですが、今回の会場も控室スペースがほぼない状態にありました。</p></li> </ul>
                                </div>
                            </dd>
                        </div>
                        </dl>
                    </li>
                        <dl>
                        <dt class="mincho">
                        <p>1月20日（月）</p>
                        <h4><span>MCとの打ち合わせと<br class="br-sp">最終確認<img src="svg/1_20.svg" alt="" ></span></h4>
                    </dt>
                    <dd>
                            <div>
                                <p>ウィズアスで作成した台本の読み合わせをメインとした打ち合わせを行いました。
                                読み合わせ後、メディアカンファレンスとパーティーの流れの確認、２部で開催するTシャツコンペに出演されるフレアバーテンダーさまの演出の構成についてミーティングを行いまいした。</p>
                                <p>出演されるフレアバーテンダーさまとの打ち合わせができていない状態でしたので、詰め切れてない部分を確認していきました。</p>
                                <p>フレアバーテンダーさまがコンペ優勝者のTシャツを着て優勝発表する流れの演出方法についてMCの方がアイディアを出してくださり話合いをして内容を固めていきました</p>
                                <p>実際のTシャツコンペでのフレアバーテンダー動画が以下になります。</p>
                                <div class="video">
                                <iframe src="https://www.youtube.com/embed/NjPQQUpbwUY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                <p>その後、最終の打ち合わせも行いました。
                                ここでは、最終的にまだ残っているタスクを確認し消化しました。この時点でまだ残っているタスクはメールと電話にて日仏貿易さまのご担当者とのやりとりで解決しました。</p>
                            </div>
                        </div>
                        </dd>
                    </dl>
                <p>準備期間中にはタスクを実行するにガントチャートで、日仏貿易さま、ウィズアスのどちらにボールがあるのかをはっきりさせながら進行していきました。</p>
                <div class="download"><a href=""><img src="img/download.png"></a></div>
                </div>
            </div>
        </section>

        <section class="flow" id="flow">
            <div class="general_width_large">
                <h3 class="section_ttl">6.イベント当日</h3>
                <h4>1月24日(金)「ペリエローンチパーティ」当日を迎えました。
                        当日の動きを主催者側とウィズアス運営チーム側の観点からみていきます。
                        </h4>
                <div>
                 <!-- チャートを作る -->

                </div>
                </div>
        </section>

        <section class="flow_client" id="flowClient">
            <div class="general_width_large">
                <h3 class="section_ttl">6-1.主催者側<br class="br-sp">（日仏貿易さま）の動き</h3>
                <img src="img/6_1_flow.jpg" alt="" >
                 <!-- チャートを作る -->
                 <div class="timetable_client">
                            <dl class="timetable_clientwrap">
                                <dt>
                                <p>8:30</p>
                                <h3>下準備・<br class="br-sp">セッティング</h3>
                                </dt>
                                <dd>
                            <p>ペリエのブランドに関わるマーケティングと営業のコアなメンバーが集まり、下準備やセッティングを開始しました。ドリンクの専門チームに所属するドリンクの開発をしているメンバーがドリンクをサーブするための下準備。</p>
                        </dd></dl>
                        <dl class="timetable_clientwrap"><dt>
                                    <p>9:30</p>
                                    <h3>受付のセッティング</h3>
                            </dt>
                            <dd>
                                <p>メディアカンファレンス開場の前にマーケティングのメンバーが数名入って、受付のセッティング。</p>
                            </dd>
                        </dl>
                                <dl class="timetable_clientwrap">
                                <dt>
                                        <p>11:00</p>
                                        <h3>当日の流れ確認の<br class="br-sp"> 打ち合わせ</h3>
                                    </dt>
                                    <dd>
                                    <p>受付の対応や登壇者と当日の流れ確認の打ち合わせ。</p>
                                </dd>
                                </dl>
                                <dl class="timetable_clientwrap">
                                    <dt>
                                            <p>12:30</p>
                                            <h3>受付対応</h3>
                                    </dt>
                                    <dd></dd>
                                </dl>
                                <dl class="timetable_clientwrap">
                                           <dt>
                                                <p>13:30</p>
                                                <h3>第1部&nbsp;メディアコンファレンス開始</h3>
                                            </dt>
                                            <dd></dd>
                                        </dl>
                                        <dl class="timetable_clientwrap"><dt>
                                                    <p>14:30</p>
                                                    <h3>全社員が会場入り</h3>
                                                </dt>
                                                <dd>
                                                <p>メディアコンファレンス終了後<br>第2部パーティーの始まる前に全社員が会場入り</p></dd>
                                            </dl>
                                            <dl class="timetable_clientwrap">
                                                <dt><p>15:00</p>
                                                        <h3>第2部<br>パーティ・Tシャツコンペティション開始</h3></dt><dd></dd>
                                                    </dl>
                                                <dl class="timetable_clientwrap"><dt>
                                                            <p>17:00</p>
                                                            <h3>会場片付け</h3></dt>
                                                       <dd> <p>パーティー終了後に会場片付け。</p></dd>
                                                </dl>
                                            </div>
                    <h4 class="flow_point">ローンチパーティを開催する上で重要だったポイント</h4>
                    <div class="flow_pointTxt">
                        <h4 class="voice_ttl">-お客さまの声</h4>
                            <p>一番大事になってくるのは全体のタイムコントロールです。全体的な表舞台の回しも非常に大切だと思うんですけれども、舞台裏も含めて全体のタイムコントロールというのが一番大事だと考えています。</p>
                            <p>イベントでは何時までにどのパートを完了させ、何時までにセッティングを終わらせるなど進行管理の部分が一番重要になります。全体を俯瞰的に見る人が必要になります。</p>
                            <p>また、今回のイベントでは、お客様もトップカスタマーがいらっしゃったりしていますので、来場して下さったクライアントさまの対応も大切です。</p>
                    </div>
                    </div>
        </section>

        <section class="flow_withus" id="flowWithus">
            <div class="general_width_large">
                <h3 class="section_ttl">6-2.運営側<br class="br-sp">（ウィズアス）の動き</h3>
                    <img src="img/6_2_flow.jpg" alt="" >
                    <div class="timetable_clientTtl">
                            <p>8:00</p><p>会場鍵開け</p>
                            <p>ウィズアス製作チームは<em>進行管理</em>と<em>施工／会場装飾</em>の2チームに分かれます。</p>
                        </div>
                        <h4 class="mincho">進行管理チーム</h4>
                        <div>
                        <!-- chart -->
                        <div class="timetable_withusMain">
                                <dl class="timetable_withusMainWrap"><dt>
                                        <p>8:00</p>
                                        <h5>進行ディレクターと打ち合わせ<br>スライドの最終調整</h5>
                                    </dt>
                                    <dd>
                                    <p>進行ディレクターと打ち合わせ、スライドの共有と最終調整をし、当日投影するスライド一式を作成。</p>
                                </dd>
                            </dl>
                                <dl  class="timetable_withusMainWrap">
                                    <dt>
                                        <p>9:00</p>
                                        <h5>会場の音響、照明、映像機材機器の確認作業</h5>
                                    </dt>
                                </dl>
                                <dl class="timetable_withusMainWrap">
                                    <dt>
                                        <p>10:00</p>
                                        <h5>MC到着、MCと直前打ち合わせ</h5>
                                    </dt>
                                </dl>
                                <dl  class="timetable_withusMainWrap">
                                    <dt>
                                        <p>11:20</p>
                                        <h5>メディアカンファレンスリハーサル開始</h5>
                                    </dt>
                                    <dd>
                                    <p>予定より20分遅れてメディアカンファレンスリハーサル開始。遅れた要因は資料の手配と日仏貿易の担当者さま他業務対応のため</p></dd>
                                    </dl>
                                <div class="trouble">
                                    <dt><p>トラブル<br class="br-sp">発生！</p></dt><dd>
                                    <p>登壇者のプレゼンの際に使用するスライドに不具合が発生しました。プロジェクターとプレゼンテーター用の表示を分けて拡張表示ができなかったため、プレゼンテーター用のノートを印刷し、対応しました。</p></dd>
                                    </div>
                                <dl  class="timetable_withusMainWrap">
                                    <dt>
                                        <p>12:00</p>
                                        <h5>メディアカンファレンスリハーサル終了<br>第2部パーティーリハーサル開始</h5>
                                    </dt>
                                    <dd>
                                    <p>リハーサルでTシャツコンペの発表の演出の最終確認をフレアバーテンダーさまと打ち合わせ。</p>
                                    </dd>
                                </dl>
                                <dl  class="timetable_withusMainWrap">
                                    <dt>
                                        <p>12:30</p>
                                        <h5>登壇者と通訳打ち合わせ（＋受付対応）</h5>
                                    </dt>
                                    <dd>
                                    <p>通訳者到着。日仏貿易さま、ペリエさまの登壇者と通訳打ち合わせ。 </p>
                                </dd>
                            </dl>
                                <dl  class="timetable_withusMainWrap">
                                    <dt>
                                        <p>13:00</p>
                                        <h5>受付開始</h5>
                                    </dt>
                                </dl>
                                <div class="trouble">
                                    <dt><p>トラブル<br class="br-sp">発生！</p></dt>
                                    <dd><p> 第2部パーティーでTシャツコンペの表彰される方にトラブルが起こり、 パーティと表彰式に参加できなくなってしまったため進行内容を変更。</p></dd>
                                </div>
                                <dl  class="timetable_withusMainWrap">
                                    <dt>
                                        <p>13:30</p>
                                        <h5>第1部&nbsp;メディアコンファレンス開始</h5>
                                </dt>
                                </dl>
                                <dl  class="timetable_withusMainWrap">
                                    <dt>
                                        <p>14:30</p>
                                        <h5>メディアコンファレンス終了後<br>会場の転換作業</h5>
                                    </dt>
                                </dl>
                                <dl  class="timetable_withusMainWrap">
                                    <dt>
                                        <p>15:00</p>
                                        <h5>第2部<br>パーティ・Tシャツコンペティション開始</h5>
                                    </dt>
                                </dl>
                                <dl  class="timetable_withusMainWrap">
                                   <dt>
                                        <p>17:00</p>
                                        <h5>パーティー終了後、会場片付け</h5>
                                    </dt>
                                </dl>
                            </div>
                        </div>
                <h4 class="mincho">-施工／会場装飾チーム</h4>
                        <div>
                            <!-- チャートを作る -->
                            <div class="timetable_withusSub">
                                 <dl class="timetable_withusSubWrap"><dt>
                                            <p>8:00</p>
                                            <h5>装飾業者さんが会場入り<br>装飾と会場設営対応</h5>
                                    </dt>
                                    <dd>
                                        <p>日仏貿易さまに装飾の確認しながら、ペリエさまの受け入れのお手伝い。現場の飾りや装飾の高さ、バーカウンターの位置調整。控え室の準備。レンタルした食器などの搬入作業、当日使用する備品を管理。</p>
                                    </dd>
                                 </dl>
                                 <dl class="timetable_withusSubWrap"><dt>
                                            <p>10:30</p>
                                            <h5>ドリンクバー設置対応<br>サーブスタッフへのレクチャー<br>ケータリング業者さん会場入り<br>準備ベースご案内対応<br>テーブル・椅子の配置・「バミリ」の設置</h5>
                                        </dt>
                                        <dd>
                                        <p>ドリンクをサーブするスタッフさん会場入り。ドリンクバーの設置対応。ドリンクをお客さまにサーブする流れをスタッフさんにレクチャー。ケータリングの業者さん会場入り。準備ベースのご案内対応</p>
                                        <p>装飾も完成してきていたので、日仏貿易さまにご確認をお願い。日仏貿易さまが持ち込んだ装飾物のお手伝い。</p>
                                        <p>14:30からメディアカンファレンスで使用していたテーブルや椅子を転換して、2部のパーティ用のテーブル配置に並べ直さなければいけないので、前もってパーティーのテーブルと椅子の配置状態にし「バミリ」を設置。</p>
                                    </dd>
                                 </dl>
                                 <dl class="timetable_withusSubWrap">
                                        <dt>
                                            <p>13:30</p>
                                            <h5>第1部<br>メディアコンファレンス開始</h5>
                                        </dt>
                                 </dl>
                                 <dl class="timetable_withusSubWrap">
                                       <dt>
                                            <p>14:30</p>
                                            <h5>メディアコンファレンス終了後<br>会場の転換作業</h5>
                                        </dt>
                                 </dl>
                                 <dl class="timetable_withusSubWrap">
                                     <dt>
                                            <p>15:00</p>
                                            <h5>第2部<br>パーティ・Tシャツコンペティション開始</h5>
                                        </dt>
                                 </dl>
                                 <dl class="timetable_withusSubWrap">
                                       <dt>
                                            <p>17:00</p>
                                            <h5>パーティー終了後、会場片付け</h5>
                                        </dt>
                                 </dl>
                                </div>
                        </div>
                        <img src="img/6_2_flow2.jpg" alt="" >
                        </div>
        </section>

        <section class="good_point" id="goodPoint">
            <div class="general_width_large">
                <h3 class="section_ttl">7.本番を終えて<br class="br-sp">良かったこと</h3>
                    <div class="good_pointTxt">
                        <h4 class="voice_ttl">-お客さまの声</h4>
                            <p>一番良かったと感じたことは、当日のディレクションやタイムキーピングです。</p>
                            <p>イベント当日は何かトラブルがあった場合でも臨機応変な対応していただいたので滞りがなくローンチイベントを開催することが出来ました。</p>
                            <p>自分たちのみで運営をしていたとしたら、トラブルに直面した時にとっさに判断して対応することが難しかったと感じています。トラブル対応をイベントのプロの方に任せられたことで安心感を持つことができました。</p>
                            <p>内製でこのような「ローンチパーティ」を運営するとしたら、新卒や新しく入った人では対応が難しいと思いますので、イベント慣れしているスタッフで適任者をアサインすることになると思います。</p>
                            <p>しかし、これだけのイベントを開催するには当日の運営だけではなく、その前の準備段階が一番大事になってくると思います。イベント業務に慣れたメンバーは、普段膨大な業務を抱えているので、メインの業務に差し障るような運営業務に関わるタスクの負担をかけるのは避けたいと感じています。</p>
                            <p>以前は他のイベントでもすべて内製で開催していました。ウィズアスさんに運営を委託し始めた当初は、運営を全部お願いしていたわけではありませんでした。</p>
                            <p>自分たちでやりたい、こだわりのある部分だけは内製でやりつつ、少しずつ委託する業務範囲のボリュームが増えていきました。</p>
                            <p>ウィズアスさんに周辺業務を巻き取っていただけるようになったので、今では商流の整備や営業支援やイベント向けの企画、デジタルマーケティング、広報、商品設計、ブランディング戦略や販売戦略などのコア業務に集中できるようになりました。</p>
                    </div>
                    <img src="img/7_goodpoint.jpg" alt="" >
                    </div>
        </section>

        <section class="from_withus" id="fromWithus">
            <div class="general_width_large">
                <h3 class="section_ttl">8.ウィズアス担当者<br class="br-sp">より</h3>
                    <div class="from_withusTxt">
                        <h4 class="voice_ttl">-お客さまの声</h4>
                            <p>日仏貿易さまとは、「モナンカップ」運営サポートからのお付き合いになります。
                                    さまざまなイベントにも言える事ですが、PRイベントの開催をサポートする際には、クラアントさまの要望を抜け漏れなく引き出して、実現することが大切です。
                                    </p>
                            <p>イベントの運営のご相談をいただく際には、まだ、イベントのコンテンツも固まっておられないお客さまが多いので、まずは全体的なスケジュールを提示して開催に必要なタスクを共有して方向性を示した上で改めてご要望をヒアリングしていきます。</p>
                            <p>工程表（ガントチャート）を作成することで、お客さまが実現したい要望も明確になり、われわれもお客さまの要望を実現するための課題も把握することが出来ます。もし、ご要望を叶えることが難しい場合は方向性として間違いのない実現性の高い代替案を提案していきます。</p>
                            <p>イベントを制作するには複数のメンバーでチームを形成します。その際には必ず社内MTGを開きクライアントさまからの要望を抜け漏れがないように、必ず資料（計画書、図面、見積もり）を共有してから、打ち合わせにてお客さまにご提案をしています。</p>
                            <p>今回のイベントでは「シューティングポイント、フォトスポットを作りたい」というご要望がありましたので、提案内容と日仏貿易さまのイメージとのズレが生まれないように気を付けました。予算内に収まるような装飾の素材を確認した上で事前にサンプル写真をご用意しました。</p>
                            <p>また、装飾に使用するパネルが海外からの輸入になるため、もしかしたらイベント当日に間に合わないかもしれないという懸念があったために、念の為に発泡スチロールを切り抜いて作成する「スタイロ文字」を準備する提案をいたしました。</p>
                            <p>今回のイベントは外部業者が複数存在して、会場も1部と2部で転換作業が発生するために、施工時間や搬入時間を綿密に設定して効率的な運営ができるように手配しました。</p>
                            <p>当日にイレギュラーな事態が起きた時にも、主催者である日仏貿易のご担当者に判断を仰がなくて良いように、「時間が押していたらメディアからの質疑の時間は短くすること」のように想定されるトラブル対応を前もって確認をしておりました。</p>
                            <p>お客様の仕事を巻き取る、負担をへらすという事を念頭において運営のサポートをさせていただきました。</p>
                    </div>
                    </div>
        </section>

        <!-- お申込みボタン -->
            <div class="general_width_large">
            <a href="" class="red_btn"><p>お問い合わせは</p><p><span>こちら</span></p></a>
            </div>

        <section class="prof_client" >
            <div class="general_width_large">
                <div class="prof_clientWrap">
                    <div class="prof_clientTxt">
                        <h3>ご担当者プロフィール</h3>
                    <ul class="prof_clientdesc">
                        <li>日仏貿易株式会社&nbsp;ビジネスサポート部&nbsp;プロダクト＆マーケティング課</li>
                        <li>課長代理&nbsp;藤吉奈緒さま</li>
                        <li>ユニオンリカーズ株式会社にてマーケティングを担当。その後、同グループ日仏貿易株式会社に転籍。8年間マーケティング業務に従事。ノンアルコールシロップ「モナン」のマーケティングを担当され売り上げ向上に貢献。2019年よりフランス産ナチュラルミネラルウォーター「ペリエ」を担当。今回の「ペリエローンチパーティ」を企画。</li>
                    </ul>
                    <ul class="prof_clientdesc">
                        <li>日仏貿易株式会社&nbsp;ビジネスサポート部&nbsp;プロダクト＆マーケティング課</li>
                        <li>マーケティング&nbsp;エグゼクティブ&nbsp;中嶋あすみさま</li>
                        <li>去年の4月に日仏貿易に入社。マーケテイング課のアシスタントとして、2019年からペリエのアシスタントに抜擢。</li>
                    </ul>
                </div>
                <div class="photo_client">
                    <img src="img/prof.jpg" alt="" >
                    <p>(写真：左より藤吉奈緒さま、中嶋あすみさま）</p>
                </div>
                </div>
                </div>
        </section>

        <section class="prof_withus">
            <div class="general_width_large">
                <h3>株式会社ウィズアス<br class="br-sp">担当者紹介</h3>
                        <ul class="prof_withusList">
                            <li>
                            <img src="img/hasebe.jpg" alt="" >
                            <p>アウトソーシング２部<br>イベント制作２G</p>
                            <p>小桧山崇</p>
                            <p>大学、官庁や地方自治体、民間会社さまざまな業界で年間数百件のイベント運営アウトソーシングを担当。2018年から「モナンカップ」の運営サポートを担当。クライアントの要望を引き出しつつ、企画や運営のサポートに対応するスペシャリスト。</p>
                        </li>
                        <li>
                                <img src="img/hasebe.jpg" alt="" >
                                <p>アウトソーシング２部<br>イベント制作１G</p>
                                <p>高上直也</p>
                                <p>ITベンダー、tech系業界などの数百人規模のカンファレンスからセミナーなどのビジネス系イベントから大手企業の入社式、採用イベントまで幅広くイベントをディレクション。クライアントからの事後アンケートでは常に高い評価をいただいている。お客さまの負担を減らす事をモットーに継続して安定した運営サポートを行っています。</p>
                        </li>
                        <li>
                                <img src="img/hasebe.jpg" alt="" >
                                <p>アウトソーシング２部<br>イベント制作２G</p>
                                <p>山口　薫</p>
                                <p>丁寧な仕事と気配りに定評があり、短納期の案件では時間を有効に使うためにクライアントさまが決断しやすいような提案とレスポンスの速さを心がけている。「イベントに関わるステークホルダーの満足度を上げるためには何をすれば良いか？」を常に考えながら運営サポート業務に勤しんでいます。</p>
                        </li>
                        </ul>
                <ul class="prof_withusList">
                        <li>
                                <img src="img/hasebe.jpg" alt="" >
                                <p>執筆<br>営業・マーケティング部</p>
                                <p>長谷部健</p>
                                <a href="https://twitter.com/YabaAD_coo" target="_blank" class="link_twitter"><img src="svg/Twitter_Logo.svg" class="twitter_logo"><i>@andokok1</i></a>
                                <p>大学、官庁や地方自治体、民間会社さまざまな業界で年間数百件のイベント運営アウトソーシングを担当。2018年から「モナンカップ」の運営サポートを担当。クライアントの要望を引き出しつつ、企画や運営のサポートに対応するスペシャリスト。</p>
                        </li>
                        <li>
                                <img src="img/hasebe.jpg" alt="" >
                                <p>編集<br>株式会社FREEDiVE取締役CMO</p>
                                <p>安藤弘樹</p>
                                <a href="https://twitter.com/KOK1ANDO" target="_blank" class="link_twitter"><img src="svg/Twitter_Logo.svg" class="twitter_logo"><i>@KOK1ANDO</i></a>
                                <p>マーケティング活動において、イベントとは認知施策であったり、リード獲得、ナーチャリング、ファン化など様々です。イベントを行う際には、事前のマーケティングの設計が肝になっていきます。今回は、イベントを実施すると決定してからお問い合わせがきましたが、事前の設計からやるとより効果的でしょう。弊社、<a href="">株式会社FREEDiVE</a>は、ウィズアスさんと一緒にイベントをリアルとマーケティングの観点から作っていきます。お気軽にお問い合わせください</p>
                        </li>
                    </ul>
                    </div>
            </section>

</body>
</html>