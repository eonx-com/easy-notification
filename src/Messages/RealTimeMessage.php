<?php

declare(strict_types=1);

namespace EonX\EasyNotification\Messages;

use EonX\EasyNotification\Exceptions\InvalidRealTimeMessageTypeException;

final class RealTimeMessage extends AbstractMessage
{
    /**
     * @var string[]
     */
    public const REAL_TIME_TYPES = [self::TYPE_FLASH, self::TYPE_REAL_TIME];

    /**
     * @var string[]
     */
    public const STATUSES = [self::STATUS_ON_FLY, self::STATUS_READ, self::STATUS_RECEIVED];

    /**
     * @var string
     */
    public const STATUS_ON_FLY = 'on_fly';

    /**
     * @var string
     */
    public const STATUS_READ = 'read';

    /**
     * @var string
     */
    public const STATUS_RECEIVED = 'received';

    /**
     * @var string[]
     */
    private $topics;

    /**
     * @var string
     */
    private $type;

    /**
     * @param null|mixed[] $body
     * @param null|string[] $topics
     */
    public function __construct(?array $body = null, ?array $topics = null, ?string $type = null)
    {
        $this->type($type ?? self::TYPE_REAL_TIME);

        if ($topics !== null) {
            $this->topics = $topics;
        }

        parent::__construct($body);
    }

    /**
     * @param null|mixed[] $body
     * @param null|string[] $topics
     */
    public static function create(?array $body = null, ?array $topics = null, ?string $type = null): self
    {
        return new self($body, $topics, $type);
    }

    public static function isStatusValid(string $status): bool
    {
        return \in_array($status, self::STATUSES, true);
    }

    /**
     * @return string[]
     */
    public function getTopics(): array
    {
        return $this->topics;
    }

    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string[] $topics
     */
    public function topics(array $topics): self
    {
        $this->topics = $topics;

        return $this;
    }

    public function type(string $type): self
    {
        if (\in_array($type, self::REAL_TIME_TYPES, true) === false) {
            throw new InvalidRealTimeMessageTypeException(\sprintf(
                'Given type "%s" invalid. Valid types: ["%s"]',
                $type,
                implode('", "', self::REAL_TIME_TYPES)
            ));
        }

        $this->type = $type;

        return $this;
    }
}
