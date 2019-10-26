
<?php
  include ("vendor/autoload.php");
  use \Mailjet\Resources;
  $mj = new \Mailjet\Client('18e4e38d7af765be9ebfc5dbc7fd6c8e','3630fc6e039c51aa3c3c8b820bb82fd5',true,['version' => 'v3.1']);
  $mail_id=$_POST['mail'];
  $sub="feedback";
  $message=$_POST['message'];
  $name=$_POST['name'];
  $body = [
    'Messages' => [
      [
        'From' => [
          'Email' => "$mail_id",
          'Name' => "$name"
        ],
        'To' => [
          [
            'Email' => "cshivajyothi123@gmail.com",
            'Name' => "admin"
          ]
        ],
        'Subject' => "$sub",
        'TextPart' => "My first Mailjet email",
        'HTMLPart' => "<h3>i am <span>$name<span></h3> <br><p>$message<p>",
        'CustomID' => "AppGettingStartedTest"
      ]
    ]
  ];
  $response = $mj->post(Resources::$Email, ['body' => $body]);
  $response->success() && var_dump($response->getData());
?>