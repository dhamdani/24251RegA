<?php
return [
  'credentials' => [
    'file' => env('FIREBASE_CREDENTIALS', base_path('config/firebase-credentials.json'))
  ],
  'database' => [
    'url' => env('FIREBASE_DATABASE_URL', 'https://pos-system-aeee5-default-rtdb.firebaseio.com/')
  ]
];
?>
