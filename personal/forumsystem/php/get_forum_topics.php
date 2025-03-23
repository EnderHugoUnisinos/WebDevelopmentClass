<?php
require_once getcwd() . '/vendor/autoload.php';

use Exception;
use MongoDB\Client;
use MongoDB\BSON\ObjectId;
use MongoDB\BSON\UTCDateTime;

$uri = 'mongodb://localhost:27017/';

try {
    $client = new Client($uri);
    $topicsCollection = $client->forumdb->topics;
    $usersCollection = $client->forumdb->users;

    $path = isset($_GET["path"]) ? htmlspecialchars($_GET["path"]) : '';
    if (empty($path)) {
        $path = "/main";
    }

    $trimmedPath = trim($path, '/');
    $pathParts = explode('/', $trimmedPath);
    if(count($pathParts) > 1) {
        $previous = '/' . implode('/', array_slice($pathParts, 0, -1));
    } else {
        $previous = '/';
    }

    $filter = ['path' => $path];
    $results = $topicsCollection->find($filter);

    echo '<div class="path-container">';
    echo '<span class="forum-path"><p><a href="home?path='.$previous.'">Prev</a> -> ' . $path . '</p></span>';
    echo '</div>';
    
    echo '<div class="forum-container">';
    echo '<div class="forum-top">';
    echo '<div class="topic-title forum-cell">Topic</div>';
    echo '<div class="reply-count forum-cell">Replies</div>';
    echo '<div class="author-name forum-cell">Author</div>';
    echo '<div class="last-reply forum-cell">Last reply</div>';
    echo '</div>';

    foreach ($results as $doc) {
        $topicId = $doc['_id'];
        $originalAuthor = $doc['author'];
        $authorIdString = is_string($originalAuthor) ? $originalAuthor : (string)$originalAuthor;
        $userDoc = $usersCollection->findOne(['_id' => new ObjectId($authorIdString)]);
        $authorName = $userDoc && isset($userDoc['username']) ? htmlspecialchars($userDoc['username']) : 'Unknown';

        $topicTitle = htmlspecialchars($doc['title']);
        $replyCount = isset($doc['posts']) ? count($doc['posts']) : 0;
        $lastReplyDate = 'N/A';

        if ($replyCount > 0) {
            $lastPost = $doc['posts'][count($doc['posts']) - 1];
            if (isset($lastPost['date']) && $lastPost['date'] instanceof UTCDateTime) {
                $lastReplyDate = $lastPost['date']->toDateTime()->format('D M d, Y H:i a');
            } elseif (isset($lastPost['date'])) {
                $lastReplyDate = htmlspecialchars($lastPost['date']);
            }
        }

        echo '<div class="forum-post">';
        echo '<div class="topic-title forum-cell"><a href="/board?id='. $topicId .'">' . $topicTitle . '</a></div>';
        echo '<div class="reply-count forum-cell">' . $replyCount . '</div>';
        echo '<div class="author-name forum-cell"><a href="/profile?id='. $authorIdString .'">' . $authorName . '</a></div>';
        echo '<div class="last-reply forum-cell">' . $lastReplyDate . '</div>';
        echo '</div>';
    }

    echo '</div>';

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
