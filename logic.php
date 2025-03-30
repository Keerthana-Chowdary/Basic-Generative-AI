<?php
session_start();

if (isset($_GET['clear'])) {
    // Clear all chat history except the initial AI message
    $_SESSION['chat'] = [];
    $_SESSION['chat'][] = ['user' => '', 'reply' => "Hello User, how can I help you today?"];
    header("Location: index.php"); // Reload the page
    exit();
}

if (isset($_POST['submit'])) {
    // Handle user input
    $msg = strtolower(trim($_POST['input'])); // Normalize input
    $chat = [
        "hi" => "Hello, how can I assist you today?",
        "how are you" => "I am fine, thank you.",
        "what is your name" => "I am your chatbot.",
        "bye" => "Goodbye!",
        "namaste" => "Namaste!",
        "bagunnara?" => "Bagunnam miru?",
        "bagunna" => "Good to know!",
        "what is my name" => "I don't know your name, but you can call me Chatbot.",
        "applications of generative ai"=>"Content Creation: Writing articles, blogs, reports, and marketing materials.
Customer Support: Creating automated chat responses and virtual assistants.
Entertainment: Producing music, art, stories, and video content.
Healthcare: Assisting with medical imaging analysis, generating patient summaries.
Education: Designing personalized learning materials and tutoring assistance.
Programming: Generating code snippets and debugging suggestions.
Design: Creating mockups, prototypes, and design elements.",
        "what is generative ai" => "Generative AI is a type of artificial intelligence that creates new content—like text, images, music, or even videos—based on the data it has been trained on. It's like a super-smart assistant that can help you generate creative or useful outputs from just a few prompts!"
    ];

    if (empty($msg)) {
        $reply = "Please type something!";
    } else {
        $reply = isset($chat[$msg]) ? $chat[$msg] : "Sorry, I didn't understand that.";
    }

    // Save user input and AI reply to session
    $_SESSION['chat'][] = ['user' => $msg, 'reply' => $reply];
    header("Location: index.php"); // Reload the page
    exit();
}
?>
