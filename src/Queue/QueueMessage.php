<?php

declare(strict_types=1);

namespace EonX\EasyNotification\Queue;

use EonX\EasyNotification\Interfaces\QueueMessageInterface;

final class QueueMessage implements QueueMessageInterface
{
    /**
     * @var string
     */
    private $body;

    /**
     * @var string[]
     */
    private $headers = [];

    /**
     * @var string
     */
    private $queueUrl;

    public function addHeader(string $name, string $value): QueueMessageInterface
    {
        $this->headers[$name] = $value;

        return $this;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @return string[]
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function getQueueUrl(): string
    {
        return $this->queueUrl;
    }

    public function setBody(string $body): QueueMessageInterface
    {
        $this->body = $body;

        return $this;
    }

    public function setQueueUrl(string $queueUrl): QueueMessageInterface
    {
        $this->queueUrl = $queueUrl;

        return $this;
    }
}
