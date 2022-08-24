<?php

namespace Source\Controllers;

use Source\Core\Connect;
use Source\Models\Auth;
use Source\Models\ChatNotification;
use Source\Models\User;

class Chat extends App
{
    public function __construct()
    {
        parent::__construct();
    }

    public function chat(?array $data): void
    {
      if (Auth::user()->name == "Nome") {
        redirect("/edit_profile");
      }


      $user = (new User())->findById($data["user_id"]);

        $head = $this->seo->render(
            CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("views/chat2", [
            "head" => $head,
            "user" => $user,
            "userLogado" => Auth::user()
        ]);
    }

    public function get(?array $data): void
    {

        $incoming_id = $data["user_id"];
        $outgoing_id = Auth::user()->id;

      $chatNotificationSearch = (new ChatNotification())
        ->find("sent_by = :a and received = :b and visualized = 0", "a={$incoming_id}&b={$outgoing_id}")
        ->fetch();

      if ($chatNotificationSearch) {
        $chatNotificationUpdate = (new ChatNotification())->findById($chatNotificationSearch->id);

        $chatNotificationUpdate->visualized = 1;

        $chatNotificationUpdate->save();
      }

        $photoIncoming = (new User())->findById($incoming_id);
        $photoOutgoing = (new User())->findById($outgoing_id);

        $messages = Connect::getInstance()->query("
            select * from messages where incoming_msg_id = {$incoming_id} and outgoing_msg_id = {$outgoing_id} 
            or incoming_msg_id = {$outgoing_id} and outgoing_msg_id = {$incoming_id} 
            order by id desc limit 100
        ")->fetchAll();

        $output = '';

//      array_reverse($messages)

        foreach ($messages as $message) {

            if ($message->outgoing_msg_id === $outgoing_id) {

                $output .= '<li class="chat-list right">';
                $output .= '<div class="conversation-list">';
                $output .= '<div class="chat-avatar">';
                $output .= '<img src=' . urlExterna("/storage/$photoOutgoing->photo") . '>';
                $output .= '</div>';
                $output .= '<div class="user-chat-content">';
                $output .= '<div class="ctext-wrap">';
                $output .= '<div class="ctext-wrap-content">';
                $output .= '<p class="mb-0 ctext-content">' . $message->msg . '</p>';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '<div class="conversation-name"><small class="text-muted time">' . date_fmt($message->created_at) . '</small> <span class="text-success check-message-icon"><i class="ri-check-double-line align-bottom"></i></span>';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '</li>';
            } else {
                $output .= '<li class="chat-list left">';
                $output .= '<div class="conversation-list">';
                $output .= '<div class="chat-avatar">';
                $output .= '<img src=' . urlExterna("/storage/$photoIncoming->photo") . '>';
                $output .= '</div>';
                $output .= '<div class="user-chat-content">';
                $output .= '<div class="ctext-wrap">';
                $output .= '<div class="ctext-wrap-content">';
                $output .= '<p class="mb-0 ctext-content">' . $message->msg . '</p>';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '<div class="conversation-name"><small class="text-muted time">' . date_fmt($message->created_at) . '</small> <span class="text-success check-message-icon"><i class="ri-check-double-line align-bottom"></i></span>';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '</li>';
            }
        }

        echo $output;
    }

    public function insert(): void
    {
        $message = Connect::getInstance()->prepare("
            insert into messages (incoming_msg_id, outgoing_msg_id, msg) 
            values (:incoming_id, :outgoing_id, :msg)
        ");

        $message->bindValue(":incoming_id", $_POST["incoming_id"]);
        $message->bindValue(":outgoing_id", $_POST["outgoing_id"]);
        $message->bindValue(":msg", $_POST["message"]);

        if (!empty($_POST["message"])) {
            $message->execute();
        }

      $chatNotificationSearch = (new ChatNotification())->find("sent_by = :a and received = :b and visualized = 0", "a={$_POST["outgoing_id"]}&b={$_POST["incoming_id"]}")->fetch();

      if (!$chatNotificationSearch) {
        $chatNotificationCreate = new ChatNotification();
        $chatNotificationCreate->sent_by = $_POST["outgoing_id"];
        $chatNotificationCreate->received = $_POST["incoming_id"];

        $chatNotificationCreate->save();
      }
    }
}
