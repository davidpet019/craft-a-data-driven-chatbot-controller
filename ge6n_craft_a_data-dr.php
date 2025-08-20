PHP
<?php

class DataDrivenChatbotController {
  private $intents;
  private $responses;

  public function __construct($intents, $responses) {
    $this->intents = $intents;
    $this->responses = $responses;
  }

  public function processInput($input) {
    $input = strtolower($input);
    foreach ($this->intents as $intent => $keywords) {
      foreach ($keywords as $keyword) {
        if (strpos($input, $keyword) !== false) {
          return $this->responses[$intent];
        }
      }
    }
    return "I didn't understand that. Can you try again?";
  }
}

// Test case
]intents = array(
  'greeting' => array('hello', 'hi', 'hey'),
  'goodbye' => array('bye', 'see you later', 'goodbye')
);

$responses = array(
  'greeting' => 'Hello! How can I assist you?',
  'goodbye' => 'It was nice chatting with you. Have a great day!'
);

$controller = new DataDrivenChatbotController($intents, $responses);

echo $controller->processInput('Hello'); // Output: Hello! How can I assist you?
echo $controller->processInput('I want to say goodbye'); // Output: It was nice chatting with you. Have a great day!
echo $controller->processInput('What is your name?'); // Output: I didn't understand that. Can you try again?