<?php



if($userrr->id != $user['discord']) {
    $id_discord = $userrr->id;
    $insertid = $bdd->prepare("UPDATE users SET discord = ? WHERE id = ?");
    $insertid->execute(array($id_discord, $_SESSION['id']));
}

if($userrr->username != $user['discord_username']) {
    $username_discord = $userrr->username;
    $insertusername = $bdd->prepare("UPDATE users SET discord_username = ? WHERE id = ?");
    $insertusername->execute(array($username_discord, $_SESSION['id']));
}

if($userrr->discriminator != $user['discriminator']) {
    $discriminator_discord = $userrr->discriminator;
    $insertdiscriminator = $bdd->prepare("UPDATE users SET discriminator = ? WHERE id = ?");
    $insertdiscriminator->execute(array($discriminator_discord, $_SESSION['id']));
}

if($userrr->avatar != $user['img_url']) {
    $avatar_discord = $userrr->avatar;
    $insertavatar = $bdd->prepare("UPDATE users SET img_url = ? WHERE id = ?");
    $insertavatar->execute(array($avatar_discord, $_SESSION['id']));
}

if (in_array($premium, $json_decode['roles']) || in_array($booster, $json_decode['roles'])) {
    $premium_discord = 1;
    $insertpremium = $bdd->prepare("UPDATE users SET premium = ? WHERE id = ?");
    $insertpremium->execute(array($premium_discord, $_SESSION['id']));
} else {
    $unpremium_discord = 0;
    $insertunpremium = $bdd->prepare("UPDATE users SET premium = ? WHERE id = ?");
    $insertunpremium->execute(array($unpremium_discord, $_SESSION['id']));
}

?>