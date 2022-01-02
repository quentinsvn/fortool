<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('max_execution_time', 300); //300 seconds = 5 minutes. In case if your CURL is slow and is loading too much (Can be IPv6 problem)
error_reporting(E_ALL);
define('OAUTH2_CLIENT_ID', 'DISCORD_OAUTH_ID_CLIENT');
define('OAUTH2_CLIENT_SECRET', 'DISCORD_OAUTH_SECRET_CLIENT');
$authorizeURL = 'https://discordapp.com/api/oauth2/authorize';
$tokenURL = 'https://discordapp.com/api/oauth2/token';
$apiURLBase = 'https://discordapp.com/api/users/@me';
$apiURLBase2 = 'https://discordapp.com/api/users/@me/guilds';
$revokeURL = 'https://discordapp.com/api/oauth2/token/revoke';
$userrr = apiRequest($apiURLBase, false);
$guilds = apiRequest($apiURLBase2, false);


if(get('action') == 'register') {
  $params = array(
    'client_id' => OAUTH2_CLIENT_ID,
    'redirect_uri' => 'https://fortool.fr/account/register.php',
    'response_type' => 'code',
    'scope' => 'identify guilds email'
  );
  // Redirect the user to Discord's authorization page
  header('Location: https://discordapp.com/api/oauth2/authorize' . '?' . http_build_query($params));
  die();
}

if(get('code')) {
    // Exchange the auth code for a token
    $token = apiRequest($tokenURL, array(
      "grant_type" => "authorization_code",
      'client_id' => OAUTH2_CLIENT_ID,
      'client_secret' => OAUTH2_CLIENT_SECRET,
      'redirect_uri' => 'https://fortool.fr/account/register.php',
      'code' => get('code')
    ));
    $logout_token = $token->access_token;
    $_SESSION['access_token'] = $token->access_token;
    header('Location: ' . $_SERVER['PHP_SELF']);
  }

if(get('action') == 'logout') {
    apiRequest($revokeURL, array(
        'token' => session('access_token'),
        'client_id' => OAUTH2_CLIENT_ID,
        'client_secret' => OAUTH2_CLIENT_SECRET,
      ));
    unset($_SESSION['access_token']);
    header('Location: ' . $_SERVER['PHP_SELF']);
    die();
  }
function apiRequest($url, $post, $headers=array()) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $response = curl_exec($ch);
    if($post)
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
    $headers[] = 'Accept: application/json';
    if(session('access_token'))
      $headers[] = 'Authorization: Bearer ' . session('access_token');
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($ch);
    return json_decode($response);
  }
  function get($key, $default=NULL) {
    return array_key_exists($key, $_GET) ? $_GET[$key] : $default;
  }
  function session($key, $default=NULL) {
    return array_key_exists($key, $_SESSION) ? $_SESSION[$key] : $default;
  }

  $json_options = [
    "http" => [
      "method" => "GET",
      "header" => "Authorization: Bot BOT_TOKEN"
    ]
  ];


  $json_context = stream_context_create($json_options);
  $userapi = apiRequest($apiURLBase, false);
  $guildapi = apiRequest($apiURLBase2, false);
  if(session('access_token')) {
    $json_get = file_get_contents('https://discordapp.com/api/guilds/538087318284795905/members/'. $userapi->id .'', false, $json_context);
    $json_decode  = json_decode($json_get, true);
  }
?>