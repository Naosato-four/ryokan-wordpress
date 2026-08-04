<?php
/*
Template Name: お問い合わせページ
*/

get_header();
?>



  <div id="contactApp">
    <main class="contact-page-wrapper py-5">
      <!-- 💡 動的コンポーネントで「入力」と「完了」を1ページ内で切り替え -->
      <transition name="fade" mode="out-in" appear>
        <component 
          :is="currentView" 
          :form.sync="form"
          :faq-url="faqUrl"
          :name-error="nameError"
          :kana-error="kanaError"
          :zip-error="zipError"
          :address-error="addressError"
          :tel-error="telError"
          :mail-error="mailError"
          :mail-confirm-error="mailConfirmError"
          :content-error="contentError"
          @fetch-address="fetchAddress"
          @filter-tel="filterTel"
          @to-complete="goToComplete">
        </component>
      </transition>
    </main>
  </div>

  <!-- ========================================================== -->
  <!-- 📄 テンプレート1：お問い合わせ 入力画面 -->
  <!-- ========================================================== -->
  <script type="text/x-template" id="tpl-contact-form">
    <div>
      <section class="contact-hero text-center mb-5">
        <div class="container">
          <h1 class="contact-page-title mb-4" style="font-family: serif; letter-spacing: 0.1em;">お 問 い 合 わ せ</h1>

          <ul class="contact-notice-list mb-5">
            <li>返信には2、3日かかる場合もございます。お急ぎの場合はお電話ください。</li>
            <li>
              このページのフォームよりお問い合わせいただいた場合、自動的にご記入いただいたメールアドレス宛に内容確認のメールが届きます。届かない場合は、お手数ではございますが再度お問い合わせいただきますようお願いいたします。
            </li>
          </ul>

          <div class="tel-faq-box p-4 mb-5">
            <div class="row align-items-center justify-content-center g-3">
              <div class="col-md-7 text-md-end text-center">
                <span class="small text-muted d-block d-md-inline ">お電話でのお問い合わせ</span>
                <strong style="font-size: 20px; letter-spacing: 0.05em;">tel.0000-11-2525</strong>
                <span class="small text-muted ms-1">(有料)</span>
              </div>
            </div>
          </div>

          <div class="contact-faq-link-button mb-5">
            <a :href="faqUrl" class="btn" style="max-width: 250px; ">
              よくある質問はこちら <i class="fa-solid fa-angle-right ms-1"></i>
            </a>
          </div>

          <div class="step-bar">
            <div class="active">お客様情報ご入力</div>
          </div>
          <hr class="mx-auto" style="max-width: 600px; color: #e5e2dc;">
        </div>
      </section>

      <section class="contact-form-section">
        <div class="container">
          <div class="contact-form-inner mx-auto style-form-wrapper" style="max-width: 850px;">
            <p class="text-danger small mb-2 p-4 text-start">※は必須項目です</p>

            <form @submit.prevent="$emit('to-complete')" class="p-5 h-adr">
              <span class="p-country-name" style="display:none;">Japan</span>

              <!-- お名前 -->
              <div class="row mb-4 align-items-center">
                <label class="col-md-3 text-md-start text-start col-form-label bg-light-label py-2">
                  お名前 <span class="required-star">※</span>
                </label>
                <div class="col-md-9 text-start">
                  <input type="text" class="form-control contact-input" placeholder="例) 琥珀太郎" v-model="form.name">
                  <span v-if="nameError" class="text-danger small d-block mt-1">{{ nameError }}</span>
                </div>
              </div>

              <!-- フリガナ -->
              <div class="row mb-4 align-items-center">
                <label class="col-md-3 text-md-start text-start col-form-label bg-light-label py-2">
                  フリガナ <span class="required-star">※</span>
                </label>
                <div class="col-md-9 text-start">
                  <input type="text" class="form-control contact-input" placeholder="例) コハクタロウ" v-model="form.kana">
                  <span v-if="kanaError" class="text-danger small d-block mt-1">{{ kanaError }}</span>
                </div>
              </div>
              
              <!-- 法人名・団体名 -->
              <div class="row mb-4 align-items-center">
                <label class="col-md-3 text-md-start text-start col-form-label bg-light-label py-2">
                  法人名・団体名
                </label>
                <div class="col-md-9 text-start">
                  <input type="text" class="form-control contact-input" placeholder="例) 株式会社〇〇" v-model="form.company">
                </div>
              </div>

              <!-- 住所（郵便番号含む） -->
              <div class="row mb-4 align-items-start">
                <label class="col-md-3 text-md-start text-start col-form-label bg-light-label py-2 mt-1">
                  住所 <span class="required-star">※</span>
                </label>
                <div class="col-md-9 text-start">
                  <div class="d-flex align-items-center mb-1" style="max-width: 160px;">
                    <span class="me-2 text-muted">〒</span>
                    <input type="text" class="form-control contact-input" placeholder="000-0000"
                      v-model="form.zip" maxlength="8" @input="$emit('fetch-address')">
                  </div>
                  <span v-if="zipError" class="text-danger small d-block mb-2">{{ zipError }}</span>

                  <input type="text" class="form-control contact-input mt-1"
                    placeholder="例) 〇〇県〇〇市〇〇区 マンション名000号室" v-model="form.address">
                  <span v-if="addressError" class="text-danger small d-block mt-1">{{ addressError }}</span>
                </div>
              </div>

              <!-- 電話番号 -->
              <div class="row mb-4 align-items-center">
                <label class="col-md-3 text-md-start text-start col-form-label bg-light-label py-2">
                  電話番号 <span class="required-star">※</span>
                </label>
                <div class="col-md-9 text-start">
                  <input type="tel" class="form-control contact-input" placeholder="例) 03-0000-0000" v-model="form.tel"
                    @input="$emit('filter-tel')">
                  <span v-if="telError" class="text-danger small d-block mt-1">{{ telError }}</span>
                </div>
              </div>

              <!-- メールアドレス -->
              <div class="row mb-4 align-items-center">
                <label class="col-md-3 text-md-start text-start col-form-label bg-light-label py-2">
                  メールアドレス <span class="required-star">※</span>
                </label>
                <div class="col-md-9 text-start">
                  <input type="email" class="form-control contact-input" placeholder="例) 1234@abc.co.jp"
                    v-model="form.email">
                  <span v-if="mailError" class="text-danger small d-block mt-1">{{ mailError }}</span>
                </div>
              </div>

              <!-- メールアドレス（再入力） -->
              <div class="row mb-4 align-items-center">
                <label class="col-md-3 text-md-start text-start col-form-label bg-light-label py-2">
                  メールアドレス(再入力) <span class="required-star">※</span>
                </label>
                <div class="col-md-9 text-start">
                  <input type="email" class="form-control contact-input" placeholder="例) 1234@abc.co.jp"
                    v-model="form.emailConfirm">
                  <span v-if="mailConfirmError" class="text-danger small d-block mt-1">{{ mailConfirmError }}</span>
                </div>
              </div>

              <!-- お問い合わせ内容 -->
              <div class="row mb-5">
                <label class="col-md-3 text-md-start text-start col-form-label bg-light-label py-2">
                  お問い合わせ内容 <span class="required-star">※</span>
                </label>
                <div class="col-md-9 text-start">
                  <textarea rows="6" class="form-control contact-textarea" placeholder="ご質問やご要望についてご記入ください。"
                    v-model="form.content"></textarea>
                  <span v-if="contentError" class="text-danger small d-block mt-1">{{ contentError }}</span>
                </div>
              </div>

              <div class="text-center">
                  <button type="submit" class="btn btn-outline-secondary px-5 py-2 btn-sm btn-custom-submit">
                    送信する <i class="fa-solid fa-angle-right ms-1"></i>
                  </button>
              </div>
            
          </div>
        </div>
      </section>
    </div>
  </script>

  <!-- ========================================================== -->
  <!-- 📄 テンプレート2：お問い合わせ 完了画面 -->
  <!-- ========================================================== -->
  <script type="text/x-template" id="tpl-contact-complete">
    <div class="container">
      <div class="contact-card mx-auto text-center p-5">
        <div class="contact-icon-wrap mb-4">
          <i class="fa-regular fa-paper-plane"></i>
        </div>

        <h1 class="contact-main-title mb-4">お問い合わせを受け付けました</h1>

        <p class="contact-message-text mb-4">
          この度はお問い合わせいただき、誠にありがとうございました。<br>
          ご入力いただいた内容を確認の上、担当者より通常2〜3営業日以内にご返信いたします。
        </p>

        <div class="contact-info-box text-start mx-auto p-4 mb-5">
          <p class="mb-0">
            ※ご入力いただいたメールアドレス宛に、自動返信のお控えをお送りいたしました。<br>
            しばらく経っても届かない場合は、大変お手数ですがお電話（0000-11-2525）にて直接お問い合わせください。
          </p>
        </div>

        <div class="contact-btn-area">
          <a href="<?php echo home_url(); ?>" class="btn contact-home-button">
            トップページへ戻る
          </a>
        </div>
      </div>

      <!-- 💡 SSGform実配信用（隠しフォーム） -->
      <form id="ssg-contact-form-final" action="https://ssgform.com/s/p6xtIn3YGh6u" method="post" style="display: none;">
        <input type="text" name="お名前" :value="form.name">
        <input type="text" name="フリガナ" :value="form.kana">
        <input type="text" name="法人名・団体名" :value="form.company">
        <input type="text" name="郵便番号" :value="form.zip">
        <input type="text" name="住所" :value="form.address">
        <input type="tel" name="電話番号" :value="form.tel">
        <input type="email" name="email" :value="form.email">
        <textarea name="お問い合わせ内容">{{ form.content }}</textarea>
      </form>
    </div>
  </script>

<?php get_footer(); ?>