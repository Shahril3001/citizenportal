<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://yandextranslatezakutynskyv1.p.rapidapi.com/getSupportedLanguages",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => "apiKey=trnsl.1.1.20200301T034332Z.ae657af27d9aef1e.76bbccc5cfce3b724056deb1c9e60f3c07390880",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: YandexTranslatezakutynskyV1.p.rapidapi.com",
		"X-RapidAPI-Key: 05c19eaf45mshbf31e9e9ec60bddp14200fjsn95226b8ece30",
		"content-type: application/x-www-form-urlencoded"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}

?>
