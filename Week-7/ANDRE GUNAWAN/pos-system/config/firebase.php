<?php
return [
    'credentials' => [
        'file' => env('FIREBASE_CREDENTIALS', base_path('config/firebase-credentials.json')),
    ],
    'databse' => [
        'url' => env('FIREBASE_DATABASE_URL','https://pos-system-67928-default-rtdb.asia-southeast1.firebasedatabase.app/')
    ],
];
