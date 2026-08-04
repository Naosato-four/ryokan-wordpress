
<?php

/*
Template Name: 女将ページ
*/

get_header();?>


  <!-- 💡 ここに既存の共通ナビゲーション/ヘッダーを挿入してください -->

  <!-- ==========================================
     女将ページ ヒーローエリア (image_d05ca2.jpg 上部再現)
     ========================================== -->
  <section class="okami-hero">
    <div class="okami-hero-container">
      <h1 class="okami-hero-title">女 将 挨 拶</h1>
    </div>
  </section>

  <!-- ==========================================
     1. 女将紹介セクション (image_d05ca2.jpg 下部再現)
     ========================================== -->
  <section class="okami-intro-section container fade-in-up">
    <!-- 💡 py-5 px-4 p-md-5 を追加して、ボックス内側の上下左右の縦幅・余白をグッと広げました -->
    <div
      class="row align-items-center justify-content-center flex-column-reverse flex-md-row shadow-lg py-5 px-4 p-md-5">

      <!-- 左側：宿と女将の概要テキスト -->
      <div class="col-md-8 col-lg-8 mt-4 mt-md-0">
        <div class="okami-intro-box text-center text-md-start">
          <h2 class="okami-intro-heading">-琥珀を支える、凛とした佇まい-</h2>
          <p class="okami-intro-text">
            銅山温泉の静謐な山間に佇む「琥珀」は、長年旅人の心と身体を癒やし続けてきた駅前の老舗旅館でございます。<br>
            時代が移り変わる中でも、私どもが大切にしてきたのは、ビジネスや観光の垣根を越えて誰もが安らげる機能性と、<br>
            どこか懐かしいほのぼのとした温もり。<br>
            伝統を受け継ぐ誇りと、私ならではのささやかな「手仕事」を添えたおもてなしの心で、<br>
            皆様を我が家のようにお迎えさせていただきます。
          </p>
        </div>
      </div>

      <!-- 右側：円形の女将プロフィール写真（💡 text-endを削除し、枠いっぱいに広げやすくします） -->
      <div class="col-md-4 col-lg-4">
        <div class="okami-profile-circle">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/okami.png" alt="琥珀 女将">
        </div>
      </div>

    </div>
  </section>

  <!-- 1. 占いをするためのボタン -->
  <div class="text-center my-5 fade-in-up">
    <button type="button" id="uranai-btn" class="btn-okami-fortune">
      <i class="bi bi-sparkles"></i> 女将の気まぐれ「本日のおもてなし占い」
    </button>
  </div>

  <!-- 2. 結果が飛び出すポップアップ画面（初期状態はCSSで非表示） -->
  <div id="fortune-modal" class="fortune-overlay">
    <div class="fortune-card">
      <h3 class="fortune-title">― 本日の口福と癒やし ―</h3>

      <div id="fortune-result" class="fortune-body">
        <!-- ここにJSで結果がドカンと入ります -->
      </div>


      <button type="button" id="fortune-close" class="btn-fortune-close">閉じる</button>

      <div class="mt-4">
        <a href="#" id="fortuneLink" class="btn text-white btn-sm"
          style="background-color: #ddbc75; border-color: #ddbc75; display: none;">
          <!-- ここにボタンの文字がJSで入る -->
        </a>
      </div>
    </div>
  </div>
  </div>

  <!--==========================================
      2. 女将の挨拶セクション
      ========================================== -->
  <section class="okami-greet-section container fade-in-up">
    <div class="row">
      <!-- 左側：挨拶文 -->
      <div class="col-lg-5 col-md-6 d-flex align-items-center">
        <div class="okami-greet-text-box">
          <p>
            琥珀から受け継ぐ伝統の暖簾を守る一方で、<br>
            私にはもうひとつ、温泉街の裏山に広がる深い自然と対峙する「猟師」としての顔がございます。
          </p>
          <p>
            夜明け前の静寂の中、自ら猟銃を手に雪山を歩き<br>山の神から命を分けていただく――。<br>
            凛とした着物姿からは想像もつかないと驚かれますが、泥にまみれ、命の尊さを肌で知るからこそ、お客様をお迎えする一瞬一瞬に偽りのない真心を込めることができるのだと信じております。
          </p>
          <p>
            当館の厨房を預かる総料理長・翁義 磨満とは、時に激しく意見を交わし合う<br>戦友のような関係です。<br>
            私が厳しい審美眼で、そして時には自らの手でハントしてきた最高の食材を、彼の大いなる技で至高の強肴『茂愛紅太（もあべたあ）』へと昇華させる。<br>この妥協なき食への執念こそが、老舗「琥珀」の強か（したたか）な矜持でございます。
          </p>
          <p>
            館内には、山の恵みへの感謝を込めて、私が自ら仕留めた鹿の角をあしらったモダンな設えや、ささやかな手仕事の跡をちりばめております。<br>
            美しき山の滋味と、我が家に帰ってきたような温もりを、どうぞ五感のすべてで深く味わってください。
          </p>
        </div>
      </div>

      <!-- 右側：動きのあるマルチ画像配置（コラージュレイアウト） -->
      <div class="col-lg-7 col-md-6 mt-5 mt-md-0">
        <div class="okami-gallery-container">
          <!-- おもてなしする女将 -->
          <div class="gallery-item item-main">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/okami2.png" alt="カリグラフィー制作風景">
          </div>
          <!-- 雪山に狩猟に出ている女将 -->
          <div class="gallery-item item-sub1">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/okamiyukiyama.png" alt="手元のアップ">
          </div>
          <!-- クマと戦闘する女将 -->
          <div class="gallery-item item-sub2">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/okamikuma.png" alt="額縁入りの作品">
          </div>
          <!-- 鹿を獲った女将 -->
          <div class="gallery-item item-sub3">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/okamisika.png" alt="卓上フレームの作品">
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="spoils-section container my-5 py-5 fade-in-up">
    <div class="text-center mb-5">
      <span class="text-gold letter-spacing-2" style="font-size: 13px; color: #ddbc75;">━ 琥珀の厨房 命の記録 ━</span>
      <h3 class="section-title mt-2" style="font-weight: 600;">女将の今週の「戦利品（仕入れ）速報」</h3>
    </div>

    <div class="row g-4 justify-content-center">
      <div class="col-md-6 col-lg-5">
        <div class="spoils-card p-4 shadow-sm" style="border: 1px solid rgba(221, 188, 117, 0.2); background: #fafafa;">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <span class="badge-target"
              style="background: #333; color: #fff; padding: 4px 10px; font-size: 11px; letter-spacing: 0.1em;">🎯
              本日のハント</span>
            <span class="spoils-date text-muted" style="font-size: 12px;">3日前 / 裏山第三渓流付近</span>
          </div>
          <h4 class="spoils-item-title" style="font-size: 18px; font-weight: 600; margin-bottom: 15px;">極上の夏鹿（銅山温泉産）
          </h4>
          <p class="spoils-comment" style="font-size: 13.5px; line-height: 1.8; color: #555;">
            青葉をたっぷり食べて丸々と太った、今シーズン最高の個体です。料理長も一目見て「これなら最高の『茂愛紅太（もあべたあ）』が焼ける」と不敵な笑みを浮かべておりました。今週末にご宿泊の皆様、どうぞご期待ください。
          </p>
        </div>
      </div>

      <div class="col-md-6 col-lg-5">
        <div class="spoils-card p-4 shadow-sm" style="border: 1px solid rgba(221, 188, 117, 0.2); background: #fafafa;">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <span class="badge-target"
              style="background: #ddbc75; color: #fff; padding: 4px 10px; font-size: 11px; letter-spacing: 0.1em;">🤝
              極秘買い付け</span>
            <span class="spoils-date text-muted" style="font-size: 12px;">今週火曜 / 秘密のルート</span>
          </div>
          <h4 class="spoils-item-title" style="font-size: 18px; font-weight: 600; margin-bottom: 15px;">厳選和牛 A5（前沢プレミアム）
          </h4>
          <p class="spoils-comment" style="font-size: 13.5px; line-height: 1.8; color: #555;">
            競り（せり）の段階から他を圧倒する強気な姿勢で勝ち取ってきた、完璧な霜降りの肉です。原価は完全に予算オーバーですが、お客様の口福には代えられません。料理長の炭火の技で至高の強肴へと昇華されます。
          </p>
        </div>
      </div>
    </div>
  </section>

  <section id="hunting" class="hunting-tour-section py-5" style="background-color: #faf8f5;">
    <div class="container my-4">

      <div class="text-center mb-5 fade-in-up">
        <span
          style="color: #ddbc75; font-size: 14px; letter-spacing: 0.2em; display: block; margin-bottom: 10px;">ACTIVITY</span>
        <h2 style="font-family: serif; font-weight: 600; color: #333; letter-spacing: 0.1em;">女将と行く、狩猟体験ツアー</h2>
        <p class="text-muted small mt-2">〜美しき山の調達紀行。命のハントを肌で知る朝〜</p>
        <div style="width: 50px; height: 1px; background-color: #ddbc75; margin: 20px auto 0;"></div>
      </div>

      <div class="row g-5 align-items-center">
        <div class="col-md-6">
          <div class="tour-description-box p-4"
            style="background-color: #fff; border: 1px solid #eae5dc; border-radius: 4px;">
            <p style="font-family: serif; line-height: 1.8; color: #444;">
              ただ景色を眺めるだけの観光に飽きたお客様へ、琥珀が贈る唯一無二のアクティビティ。夜明け前の静寂の中、ハンターとしての顔を持つ当館の女将と共に、野生動物の足跡や気配を追って深い山へと入ります。
            </p>
            <p style="font-family: serif; line-height: 1.8; color: #444;">
              一瞬の油断も許されない緊張感、泥にまみれながらも凛とした女将の横顔。本物の「生と死の境界線」を五感で体感した後は、山頂で女将が淹れる特製の薬莢（やっきょう）珈琲が待っています。
            </p>

            <ul class="list-unstyled mt-4 pt-3" style="border-top: 1px dashed #ddbc75; font-size: 14px; color: #555;">
              <li class="mb-2"><strong>【エリア】</strong> 銅山狭大渓谷（当館ロビー集合）</li>
              <li class="mb-2"><strong>【開催時間】</strong> 午前 4:30 〜 午前 8:30（要前日予約）</li>
              <li><strong>【料金】</strong> 宿泊者限定プラン（無料、ただし強い心意気が必要です）</li>
            </ul>
          </div>
        </div>

        <div class="col-md-6">
          <h4 class="mb-4" style="font-family: serif; color: #333; font-size: 18px;">【当日の流れ】</h4>

          <div class="hunting-timeline" style="border-left: 2px solid #ddbc75; padding-left: 20px; position: relative;">

            <div class="timeline-item mb-4" style="position: relative;">
              <div
                style="position: absolute; left: -27px; top: 2px; width: 12px; height: 12px; background-color: #ddbc75; border-radius: 50%;">
              </div>
              <h5 style="font-size: 15px; font-weight: bold; color: #333;">04:30 ── 払暁の集合</h5>
              <p class="text-muted small">まだ夜が明けきらないロビーに集合。女将が手際よくハントの装備（頑丈なブーツなど）をチェックします。</p>
            </div>

            <div class="timeline-item mb-4" style="position: relative;">
              <div
                style="position: absolute; left: -27px; top: 2px; width: 12px; height: 12px; background-color: #ddbc75; border-radius: 50%;">
              </div>
              <h5 style="font-size: 15px; font-weight: bold; color: #333;">05:00 ── 静寂の入山</h5>
              <p class="text-muted small">気配を消し、鳥の声だけが響く鳴神大渓谷へ。野生動物の足跡（フィールドサイン）を女将の解説と共に追います。</p>
            </div>

            <div class="timeline-item mb-4" style="position: relative;">
              <div
                style="position: absolute; left: -27px; top: 2px; width: 12px; height: 12px; background-color: #ddbc75; border-radius: 50%;">
              </div>
              <h5 style="font-size: 15px; font-weight: bold; color: #333;">07:00 ── 薬莢（やっきょう）珈琲</h5>
              <p class="text-muted small">山頂の特等席で一息。女将がその場で淹れる、ほのかにワイルドな香りが漂う特製珈琲で体を温めます。</p>
            </div>

            <div class="timeline-item" style="position: relative;">
              <div
                style="position: absolute; left: -27px; top: 2px; width: 12px; height: 12px; background-color: #ddbc75; border-radius: 50%;">
              </div>
              <h5 style="font-size: 15px; font-weight: bold; color: #333;">08:30 ── 命をいただく朝食</h5>
              <p class="text-muted small">帰館後、大浴場で汗を流した後は、総料理長が仕込みたての山の恵みを使った贅沢な朝食が待っています。</p>
            </div>

          </div>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-12">
          <div class="warning-box p-3 text-center"
            style="background-color: #f5f2eb; border-left: 4px solid #ddbc75; font-size: 13px; color: #666;">
            <p class="mb-1"><strong>⚠️ ご参加にあたっての心得</strong></p>
            <p class="mb-0">生き物相手のため、獲物に出会えない場合もございます。その際は、市場での女将の「強気な競り（せり）見学ツアー」に振替となります。</p>
            <p class="mb-0">ヒールやサンダルでのご参加は、山の神と女将の逆鱗に触れますので、絶対に貸出用のブーツをご着用ください。</p>
          </div>
        </div>
      </div>

    </div>
  </section>

<?php get_footer();
