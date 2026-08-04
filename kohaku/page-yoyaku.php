<?php

/*
Template Name: ご予約
*/

get_header();?>


    <!-- ページタイトル -->
    <section class="yoyaku-hero">
        <h1>空室確認・ご予約</h1>
        <p>四季折々の自然に囲まれた旅館「琥珀」で、心安らぐひとときをお過ごしください。</p>
    </section>

    <div id="app">
        <div class="complete-step-bar mb-5 text-center mt-5">
            <span class="complete-step-item" :class="{ 'complete-step-active': currentView === 'order-form' }">1.
                条件入力</span>
            <span class="complete-step-separator"><i class="fa-solid fa-chevron-right"></i></span>

            <span class="complete-step-item" :class="{ 'complete-step-active': currentView === 'order-confirm' }">2.
                内容確認</span>
            <span class="complete-step-separator"><i class="fa-solid fa-chevron-right"></i></span>

            <span class="complete-step-item" :class="{ 'complete-step-active': currentView === 'order-complete' }">3.
                完了</span>
        </div>
        <transition name="fade" mode="out-in" appear>
            <component :is="currentView" :order-form.sync="orderForm" :errors="errors" :mail-error="mailError"
                :tel-error="telError" :today-date="todayDate" :calculated-total="calculatedTotal" :nights="nights"
                @to-confirm="goToConfirm" @to-order="goToOrder" @finalize-order="handleOrderFinalSubmit"
                @reset-to-order="resetToOrderPage">
            </component>
        </transition>
    </div>



    <!-- ===================================================
        1. 予約フォーム画面 テンプレート
    =================================================== -->
    <template id="tpl-order-form">
        <main class="booking-container">
            <form id="ssg-order-form" @submit.prevent="$emit('to-confirm')" class="booking-form">

                <section class="form-section">
                    <label for="date" class="form-label form-label-required">宿泊日</label>
                    <div class="form-input-wrapper">
                        <div class="date-inputs-inline">
                            <input id="date" type="text" ref="datepicker" placeholder="日付を入力してください" autocomplete="off"
                                :value="orderForm.date" class="form-control date-input">
                        </div>
                        <span v-if="errors.date && errors.date.length" class="error-text">{{ errors.date[0] }}</span>
                    </div>
                </section>

                <section class="form-section">
                    <label for="dateOut" class="form-label form-label-required">チェックアウト日</label>
                    <div class="form-input-wrapper">
                        <div class="date-inputs-inline">
                            <input id="dateOut" type="text" ref="datepicker" placeholder="日付を入力してください"
                                autocomplete="off" :value="orderForm.dateOut" class="form-control date-input">
                        </div>
                        <span v-if="errors.dateOut && errors.dateOut.length" class="error-text">{{ errors.dateOut[0]
                            }}</span>
                    </div>
                </section>


                <section class="form-section">
                    <label class="form-label form-label-required">ご利用人数</label>
                    <div class="form-input-wrapper">
                        <div class="date-inputs-inline">

                            <!-- 大人人数のセレクトボックス -->
                            <div style="flex: 1;" class="people">
                                <span>大人（中学生以上）1人：16,000 円～</span>
                                <select id="guestsAdult" v-model="orderForm.guestsAdult"
                                    class="form-control select-control">
                                    <option value="">選択</option>
                                    <option v-for="n in 10" :key="'adult-'+n" :value="n">{{ n }}名</option>
                                </select>
                            </div>

                            <!-- 小人人数のセレクトボックス -->
                            <div style="flex: 1;" class="people">
                                <span>小人（小学生以下）1人：8,000 円～</span>
                                <select id="guestsChild" v-model="orderForm.guestsChild"
                                    class="form-control select-control">
                                    <option value="">選択</option>
                                    <option v-for="n in 10" :key="'child-'+n" :value="n">{{ n }}名</option>
                                </select>
                            </div>

                        </div>
                        <span v-if="errors.guests && errors.guests.length" class="error-text">{{ errors.guests[0]
                            }}</span>
                    </div>
                </section>

                <fieldset class="form-section">
                    <legend class="form-label form-label-required">客室タイプ</legend>

                    <div class="form-input-wrapper radio-group">
                        <label class="radio-label">
                            <input type="radio" name="room_type_view" v-model="orderForm.roomType" value="渓音"> 渓音（けいおん）
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="room_type_view" v-model="orderForm.roomType" value="夕霞"> 夕霞（ゆうがすみ）
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="room_type_view" v-model="orderForm.roomType" value="星待"> 星待（ほしまち）
                        </label>
                        <span v-if="errors.roomType && errors.roomType.length" class="error-text">{{ errors.roomType[0]
                            }}</span>
                    </div>
                </fieldset>

                <section class="form-section">
                    <label for="rooms" class="form-label form-label-required">部屋数</label>
                    <div class="form-input-wrapper">
                        <select id="rooms" v-model="orderForm.rooms" name="部屋数" class="form-control select-control">

                            <option value="">選択してください</option>
                            <option v-for="n in 3" :key="'room-'+n" :value="n">{{ n }}部屋</option>
                        </select>
                        <span v-if="errors.rooms && errors.rooms.length" class="error-text">{{ errors.rooms[0] }}</span>
                    </div>
                </section>

                <section class="form-section">
                    <label for="name" class="form-label form-label-required">お名前（カタカナ）</label>
                    <div class="form-input-wrapper">
                        <input type="text" id="name" v-model="orderForm.customerName" name="お名前" class="form-control"
                            placeholder="全角カタカナ 10文字以内">
                        <span v-for="err in errors.name" :key="err" class="error-text">{{ err }}</span>
                    </div>
                </section>

                <section class="form-section">
                    <label for="phone" class="form-label form-label-required">電話番号</label>
                    <div class="form-input-wrapper">
                        <input type="tel" id="phone" v-model="orderForm.phone" name="電話番号" class="form-control"
                            placeholder="ハイフンなし" maxlength="11">
                        <span v-if="telError" class="error-text">{{ telError }}</span>
                        <span v-if="errors.tel && errors.tel.length" class="error-text">{{ errors.tel[0] }}</span>
                    </div>
                </section>

                <!-- 郵便番号セクション -->
                <section class="form-section">
                    <label for="zip" class="form-label">郵便番号</label>
                    <div class="form-input-wrapper">
                        <!-- v-model に書き換え、SSGフォーム用の name="郵便番号" を追加 -->
                        <input type="text" id="zip" v-model="orderForm.zip" name="郵便番号" class="form-control"
                            placeholder="例: 1234567" maxlength="7">
                        <span v-if="errors.zip && errors.zip.length" class="error-text">{{ errors.zip[0] }}</span>
                    </div>
                </section>

                <!--  住所セクション -->
                <section class="form-section">
                    <label for="address" class="form-label">住所</label>
                    <div class="form-input-wrapper">
                        <!-- v-model に書き換え、SSGフォーム用の name="住所" を追加 -->
                        <input type="text" id="address" v-model="orderForm.address" name="住所" class="form-control">
                    </div>
                </section>

                <section class="form-section">
                    <label for="mail" class="form-label form-label-required">Eメールアドレス</label>
                    <div class="form-input-wrapper">
                        <input type="email" id="mail" v-model="orderForm.mail" class="form-control"
                            placeholder="sample@example.com" name="email">
                        <span v-if="mailError" class="error-text">{{ mailError }}</span>
                        <span v-if="errors.email && errors.email.length" class="error-text">{{ errors.email[0] }}</span>
                    </div>
                </section>

                <section class="form-section">
                    <label class="form-label">アレルギーの有無</label>
                    <div class="form-input-wrapper">
                        <!-- 1. あり/なし のラジオボタン（v-model化） -->
                        <div class="radio-group" style="margin-bottom: 12px;">
                            <label class="radio-label">
                                <input type="radio" name="アレルギーの有無" v-model="orderForm.hasAllergy" value="あり"> あり
                            </label>
                            <label class="radio-label">
                                <input type="radio" name="アレルギーの有無" v-model="orderForm.hasAllergy" value="なし"> なし
                            </label>
                        </div>

                        <transition name="fade">
                            <div v-if="orderForm.hasAllergy === 'あり'" class="allergy">
                                <!-- 7/3はここを変更してた（吉田） -->
                                <p>該当するアレルゲンにチェックを入れてください（表示義務9品目）</p>

                                <!-- 2. 9品目のチェックボックス（v-modelで配列を自動操作！） -->
                                <div class="radio-group" style="gap: 12px 20px; margin-bottom: 16px;">
                                    <label
                                        v-for="item in ['えび ', 'かに ', 'くるみ ', '小麦 ', 'そば ', '卵 ', '乳 ', '落花生 ', 'カシューナッツ ']"
                                        :key="item" style="font-size: 14px; cursor: pointer;">
                                        <input type="checkbox" name="アレルギー項目[]" v-model="orderForm.allergyItems"
                                            :value="item"> {{ item }}
                                    </label>
                                </div>

                                <!-- 3. その他自由記入のテキストエリア -->
                                <label for="allergy_note"
                                    style="font-size: 13px; color: #666; display: block; margin-bottom: 4px;">
                                    その他（具体的な症状や、上記以外の食材など）</label>
                                <textarea id="allergy_note" name="アレルギー詳細" v-model="orderForm.allergyNote"
                                    class="form-textarea" placeholder="例：大豆アレルギーがあり、醤油もNGです。など"
                                    style="height: 80px; min-height: 80px;"></textarea>
                            </div>
                        </transition>
                    </div>
                </section>

                <section class="form-section">
                    <label for="note" class="form-label">ご要望・ご質問</label>
                    <div class="form-input-wrapper">
                        <textarea id="note" name="ご要望・ご質問" v-model="orderForm.note" class="form-textarea"></textarea>
                    </div>
                </section>

                <footer class="form-footer">
                    <button type="submit" class="btn-submit">予約確認画面へ</button>
                </footer>
            </form>
        </main>
    </template>

    <!-- ===================================================
        2. 予約確認画面 テンプレート
    =================================================== -->
    <template id="tpl-order-confirm">
        <main class="booking-container">
            <h2>ご予約内容の確認</h2>
            <p class="confirm-lead">入力内容をご確認の上、「予約確定」ボタンを押してください。</p>

            <table class="confirm-table">
                <tr>
                    <th>宿泊日</th>
                    <td>{{ orderForm.date }}</td>
                </tr>
                <tr>
                    <th>チェックアウト</th>
                    <td>{{ orderForm.dateOut }}</td>
                </tr>
                <tr>
                    <th>泊数</th>
                    <td>{{ nights }}泊</td>
                </tr>
                <tr>
                    <th>ご利用人数</th>
                    <td>大人: {{ orderForm.guestsAdult }}名 / 小人: {{ orderForm.guestsChild || 0 }}名</td>
                </tr>
                <tr>
                    <th>ご希望のお部屋</th>
                    <td>{{ orderForm.roomType }}</td>
                </tr>
                <tr>
                    <th>部屋数</th>
                    <td>{{ orderForm.rooms }}部屋</td>
                </tr>
                <tr>
                    <th>代表者氏名</th>
                    <td>{{ orderForm.customerName }}</td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td>{{ orderForm.phone }}</td>
                </tr>
                <tr>
                    <th>郵便番号</th>
                    <td>{{ orderForm.zip || 'なし'}}</td>
                </tr>
                <tr>
                    <th>住所</th>
                    <td>{{ orderForm.address || 'なし'}}</td>
                </tr>
                <tr>
                    <th>Eメールアドレス</th>
                    <td>{{ orderForm.mail }}</td>
                </tr>
                <tr>
                    <th>アレルギー</th>
                    <td>
                        <div v-if="orderForm.hasAllergy === 'あり'">
                            <p style="margin: 0 0 6px 0;">該当項目：{{ orderForm.allergyItems.join('、') || '選択なし' }}</p>
                            <p style="margin: 0; font-size: 14px; color: #666;">その他・詳細：{{ orderForm.allergyNote || 'なし'
                                }}</p>
                        </div>
                        <span v-else>なし</span>
                    </td>
                </tr>
                <tr>
                    <th>ご要望・ご質問</th>
                    <td>{{ orderForm.note || 'なし' }}</td>
                </tr>
                <tr class="total-row">
                    <th>概算合計料金</th>
                    <td><strong>{{ calculatedTotal | formatPrice }} 円</strong>（税込）</td>
                </tr>
            </table>

            <!-- 最終のURL確定後にSSGformで送信後URLを設定します！！ -->
            <form id="ssg-order-form-final" action="https://ssgform.com/s/p6xtIn3YGh6u" method="post">
                <!-- SSGformに置くためだけのデータ欄 -->
                <div style="display: none;">
                    <input type="text" name="宿泊日" :value="orderForm.date">
                    <input type="text" name="泊数" :value="(nights) + '泊'">
                    <input type="text" name="チェックアウト日" :value="orderForm.dateOut">
                    <input type="text" name="ご利用人数"
                        :value="`大人：${orderForm.guestsAdult}名、子供：${orderForm.guestsChild ? orderForm.guestsChild + '名' : '0名'}`">
                    <input type="text" name="ご希望のお部屋" :value="orderForm.roomType">
                    <input type="text" name="部屋数" :value="orderForm.rooms + '部屋'">
                    <input type="text" name="代表者氏名" :value="orderForm.customerName">
                    <input type="tel" name="電話番号" :value="orderForm.phone">
                    <input type="text" name="郵便番号" :value="orderForm.zip">
                    <input type="text" name="住所" :value="orderForm.address">
                    <input type="email" name="メールアドレス" :value="orderForm.mail">
                    <input type="text" name="アレルギーの有無" :value="orderForm.hasAllergy">
                    <input type="text" name="アレルギー項目" :value="orderForm.allergyItems.join('、')">
                    <input type="text" name="アレルギー詳細" :value="orderForm.allergyNote">
                    <textarea name="ご要望・ご質問">{{ orderForm.note || 'なし' }}</textarea>
                    <input type="text" name="概算合計料金" :value="(calculatedTotal).toLocaleString() + ' 円'">
                </div>

                <footer class="form-footer confirm-buttons">
                    <button type="button" @click="$emit('to-order')" class="btn-back">修正する</button>
                    <!-- クリックされた瞬間に Vue 側の確定処理を実行（ボタン自体は submit タイプなので、その後即座に action へ送信されます） -->
                    <button type="submit" @click="$emit('finalize-order')" class="btn-submit">予約確定</button>
                </footer>
            </form>
        </main>
    </template>

    <!-- ===================================================
        3. 予約完了画面 テンプレート
    =================================================== -->
    <template id="tpl-order-complete">
        <main class="complete-page-wrapper my-5">
            <div class="container">

                <div class="complete-card mx-auto text-center p-5">
                    <div class="complete-icon-wrap mb-4">
                        <i class="fa-regular fa-circle-check"></i>
                    </div>

                    <h1 class="complete-main-title mb-4">ご予約ありがとうございました</h1>

                    <p class="complete-message-text mb-4">
                        銅山温泉 旅館「琥珀」へのご予約手続きがすべて完了いたしました。<br>
                        ご登録いただいたメールアドレス宛に、自動返信にて**「予約確認メール」**をお送りいたしましたのでご確認ください。
                    </p>

                    <div class="complete-info-box text-start mx-auto p-4 mb-5">
                        <p class="mb-2"><strong>■ ご案内とお願い</strong></p>
                        <ul class="complete-notice-list ps-3 mb-0">
                            <li>メールが届かない場合は、迷惑メールフォルダをご確認いただくか、当宿までお電話（0237-28-2525）にてお問い合わせください。</li>
                            <li>予定チェックイン時間を大幅に過ぎる場合は、事前にご連絡をお願いいたします。</li>
                        </ul>
                    </div>

                    <div class="complete-btn-area">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn complete-home-button">
                            トップページへ戻る
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </template>

<?php get_footer(); ?>