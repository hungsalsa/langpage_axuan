<?php
// FSettingWebsite::find()->select(['title','description','content_form','logo','google_analytics','hotline','email'])->asArray()->one();
 // \Yii::$app->params['my_user'] = FSettingWebsite::getConfigWebsite();
return [
    // 'adminEmail' => 'admin@example.com',
    'og_site_name' => ['property' => 'og:site_name', 'content' => 'lopxin.vn'],
    'og_type' => ['property' => 'og:type', 'content' => 'website'],
    'og_locale' => ['property' => 'og:locale', 'content' => 'vi_VN'],
    // 'og_title' => ['property' => 'og:title', 'content' => 'title'],
    // 'og_description' => ['property' => 'og:description', 'content' => 'description'],
    // 'og_url' => ['property' => 'og:url', 'content' => '/'],
    // 'og_image' => ['property' => 'og:image', 'content' => 'image']
    'infoWebsite'=>[]
];
