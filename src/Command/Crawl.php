<?php
declare(strict_types = 1);

/**
 * @author   Ivan "Thunderlane" Atanasov <thunderlane@thewonderbolts.eu>
 */

namespace Command;

use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Exception\AMQPTimeoutException;
use PhpAmqpLib\Message\AMQPMessage;

/**
 * Class Crawl
 *
 * @package Command
 */
class Crawl
{
    private const RPC_QUEUE = 'crawl_queue';
    private const WEBSITE_ID = 'website_id';
    private const WEBSITE_NAME = 'website_name';
    private const EXPIRATION_SECONDS = 60;

    private AMQPStreamConnection $connection;
    private AMQPChannel $channel;
    private string $callbackQueue;
    private string $response = '';
    private string $correlationId = '';

    public function __construct()
    {
        $this->connection = new AMQPStreamConnection(
            env('RABBIT_HOST'),
            env('RABBIT_PORT'),
            env('RABBIT_USER'),
            env('RABBIT_PASSWORD')
        );

        $this->channel = $this->connection->channel();

        $this->callbackQueue = current($this->channel->queue_declare(
            "",
            false,
            false,
            true,
            false
        ));

        $this->channel->basic_consume(
            $this->callbackQueue,
            '',
            false,
            true,
            false,
            false,
            array(
                $this,
                'onResponse'
            )
        );
    }

    /**
     * @throws \ErrorException
     */
    public function __invoke(): void
    {
        $this->correlationId = uniqid();

        $websites = [
            [
                self::WEBSITE_ID => 1,
                self::WEBSITE_NAME => 'wccftech.com'
            ]
        ];

        $body = json_encode($websites);

        $message = new AMQPMessage(
            $body,
            [
                'correlation_id' => $this->correlationId,
                'reply_to' => $this->callbackQueue,
                'expiration' => self::EXPIRATION_SECONDS * 1000
            ]
        );

        dump($this->correlationId);
        $this->channel->basic_publish($message, '', self::RPC_QUEUE);

        try {
            while ($this->response === '') {
                $this->channel->wait(null, false, self::EXPIRATION_SECONDS);
            }
        } catch (AMQPTimeoutException $e) {
            printf('Did not receive message in %s seconds %s', self::EXPIRATION_SECONDS, PHP_EOL);
        }

        printf('Response: %s%s', $this->response, PHP_EOL);
    }

    public function onResponse(AMQPMessage $result): void
    {
        if ($result->get('correlation_id') === $this->correlationId) {
            $this->response = $result->body;
        }
    }
}