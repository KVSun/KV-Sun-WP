<?php
namespace WebHook;

const CONFIG = 'config/github.json';
error_reporting(0);

require_once __DIR__ . DIRECTORY_SEPARATOR . 'autoloader.php';
header('Content-Type: text/plain');

function handler_exception(\Exception $e)
{
	http_response_code($e->getCode());
	exit(sprintf(
		'%s responded with: "%s" on %s:%d' . PHP_EOL,
		$_SERVER['SERVER_NAME'],
		$e->getMessage(),
		trim(preg_replace('/^' . preg_quote(__DIR__, DIRECTORY_SEPARATOR) . '/', null, $e->getFile()), DIRECTORY_SEPARATOR),
		$e->getLine()
	));
}
set_exception_handler(__NAMESPACE__ . '\handler_exception');
echo 'Connection successful.' . PHP_EOL;
try {
	$webhook = new \shgysk8zer0\Core\GitHubWebhook(CONFIG);
	$email = new \shgysk8zer0\Core\Email(
		$_SERVER['SERVER_ADMIN'],
		sprintf('%s event on %s', $webhook->event, $_SERVER['SERVER_NAME'])
	);

	if ($webhook->validate()) {
		echo 'Request validated.' . PHP_EOL;
		switch(trim(strtolower($webhook->event))) {
			case 'ping':
				echo 'PING' . PHP_EOL;
				break;
			case 'push':
				echo "Push to {$webhook->parsed->ref}" . PHP_EOL;
				if ($webhook->parsed->ref === 'refs/heads/master') {
					echo `git pull`;
					$status = `git status`;
					echo $status . PHP_EOL;
					`npm install`;
					$email->message = $status;
					$email->send();
				}
			/*	if($PDO->connected) {
					$stm = $PDO->prepare(
						'INSERT INTO `Commits` (
							`SHA`,
							`Branch`,
							`Repository_Name`,
							`Repository_URL`,
							`Commit_URL`,
							`Commit_Message`,
							`Author_Name`,
							`Author_Username`,
							`Author_Email`,
							`Modified`,
							`Added`,
							`Removed`,
							`Time`
						) VALUES (
							:SHA,
							:Branch,
							:Repository_Name,
							:Repository_URL,
							:Commit_URL,
							:Commit_Message,
							:Author_Name,
							:Author_Username,
							:Author_Email,
							:Modified,
							:Added,
							:Removed,
							:Time
						);'
					);

					$successes = array_filter(
						$webhook->parsed->commits,
						function($commit) use ($stm, $webhook)
						{
							$stm->SHA = $commit->id;
							$stm->Branch = $webhook->parsed->ref;
							$stm->Repository_Name = $webhook->parsed->repository->full_name;
							$stm->Repository_URL = $webhook->parsed->repository->html_url;
							$stm->Commit_URL = $commit->url;
							$stm->Commit_Message = $commit->message;
							$stm->Author_Name = $commit->author->name;
							$stm->Author_Username = $commit->author->username;
							$stm->Author_Email = $commit->author->email;
							$stm->Modified = join(', ', $commit->modified);
							$stm->Added = join(', ', $commit->added);
							$stm->Removed = join(', ', $commit->removed);
							$stm->Time = date('Y-m-d H:i:s', strtotime($commit->timestamp));
							$stm->execute();
						}
					);
					exit('Imported' . count($successes) . ' of ' . count($webhook->parsed->commits));
				} else {
					throw new \Exception('Failed to connect to database', 500);
				}*/
				break;

		/*	case 'issues':
				if ($PDO->connected) {
					$stm = $PDO->prepare(
						"INSERT INTO `Issues` (
							`Number`,
							`Repository`,
							`Repository_URL`,
							`Title`,
							`Body`,
							`URL`,
							`Labels`,
							`Assignee`,
							`Avatar`,
							`State`,
							`Milestone`,
							`Milestone_URL`,
							`Created_At`,
							`Updated_At`,
							`Closed_At`
						) VALUES (
							:Number,
							:Repository,
							:Repository_URL,
							:Title,
							:Body,
							:URL,
							:Labels,
							:Assignee,
							:Avatar,
							:State,
							:Milestone,
							:Milestone_URL,
							:Created_At,
							:Updated_At,
							:Closed_At
						) ON DUPLICATE KEY UPDATE
							`Title` = :Title,
							`Body` = :Body,
							`Labels` = :Labels,
							`Assignee` = :Assignee,
							`State` = :State,
							`Milestone` = :Milestone,
							`Updated_At` = :Updated_At,
							`Closed_At` = :Closed_At;"
					);

					$stm->Number = $webhook->parsed->issue->number;
					$stm->Repository = $webhook->parsed->repository->full_name;
					$stm->Repository_URL = $webhook->parsed->repository->html_url;
					$stm->Title = $webhook->parsed->issue->title;
					$stm->Body = $webhook->parsed->issue->body;
					$stm->URL = $webhook->parsed->issue->html_url;
					$stm->Labels = join(', ', array_map(function($label)
					{
						return trim($label->name);
					}, $webhook->parsed->issue->labels));
					$stm->Assignee = $webhook->parsed->issue->assignee->login;
					$stm->Avatar = $webhook->parsed->issue->assignee->avatar_url;
					$stm->State = $webhook->parsed->issue->state;
					$stm->Milestone = $webhook->parsed->issue->milestone->title;
					$stm->Milestone_URL = $webhook->parsed->issue->milestone->url;
					$stm->Created_At = date('Y-m-d H:i:s', strtotime($webhook->parsed->issue->created_at));
					$stm->Updated_At = date('Y-m-d H:i:s', strtotime($webhook->parsed->issue->updated_at));
					$stm->Closed_At = date('Y-m-d H:i:s', strtotime($webhook->parsed->issue->closed_at));

					if(! $stm->execute()) {
						throw new \Exception('Failed inserting issue to database', 500);
					}
				} else {
					throw new \Exception('Failed to connect to database', 500);
				}
				break;*/

			default:
				file_put_contents(__DIR__ . $webhook->event . '_' . date('Y-m-d\TH:i:s') . '.json', json_encode($webhook->parsed, JSON_PRETTY_PRINT));
				throw new \Exception("Unhandled event: {$webhook->event}", 501);
		}
	} else {
		throw new \Exception('Authorization required', 401);
	}
} catch(\Exception $e) {
	handler_exception($e);
}
