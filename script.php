<?php
const APIKEY = 'YOUR-OPENAI-KEY-HERE';

// Empfange die Daten von der Browsererweiterung
$content = file_get_contents("php://input");
$json = json_decode($content, true);

$name = $json['name'];
$kurzbeschreibung = $json['kurzbeschreibung'];

// Erstelle die Nachrichten für die Chat API
$messages = [
    [
        "role" => "system",
        "content" => "Du bist ein hilfreicher Assistent."
    ],
    [
        "role" => "user",
        "content" => "Bitte schreibe aufgrund der folgenden Daten eine Langbeschreibung für einen Artikel. Name: " . $name . "\nKurzbeschreibung: " . $kurzbeschreibung
    ]
];

// Bereite die Anfrage an die OpenAI Chat API vor
$data = [
//    'model' => 'gpt-4', // Modellname
    'model' => 'gpt-4-1106-preview', // Modellname
    'messages' => $messages
];

// cURL-Einstellungen für die Anfrage
$curl = curl_init('https://api.openai.com/v1/chat/completions');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Bearer ' . APIKEY,
]);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

// Sende die Anfrage an OpenAI
$result = curl_exec($curl);

// Prüfe auf Fehler in der cURL-Anfrage
if (curl_errno($curl)) {
    die('cURL-Fehler: ' . curl_error($curl));
}

curl_close($curl);

// Extrahiere die Antwort
$response = json_decode($result, true);

$langbeschreibung = $response['choices'][0]['message']['content'];

// Sende die Antwort zurück an die Erweiterung
header('Content-Type: application/json');
echo json_encode(['langbeschreibung' => $langbeschreibung]);
?>
