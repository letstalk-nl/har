<?php

declare(strict_types=1);

namespace Deviantintegral\Har;

use Deviantintegral\Har\SharedFields\CommentTrait;
use Deviantintegral\Har\SharedFields\StartedDateTimeTrait;
use JMS\Serializer\Annotation as Serializer;

/**
 * An exported HTTP request.
 *
 * @see http://www.softwareishard.com/blog/har-12-spec/#entries
 */
final class Entry
{
    use CommentTrait;
    use StartedDateTimeTrait;

    /**
     * Reference to the parent page. Leave out this field if the application
     * does not support grouping by pages.
     *
     * @var string
     *
     * @Serializer\Type("string")
     */
    private string $pageref;

    /**
     * Total elapsed time of the request in milliseconds. This is the sum of all
     * timings available in the timings object (i.e. not including -1 values).
     *
     * @var float
     *
     * @Serializer\Type("float")
     */
    private float $time;

    /**
     * Detailed info about the request.
     *
     * @var \Deviantintegral\Har\Request
     *
     * @Serializer\Type("Deviantintegral\Har\Request")
     */
    private Request $request;

    /**
     * Detailed info about the response.
     *
     * @var \Deviantintegral\Har\Response
     *
     * @Serializer\Type("Deviantintegral\Har\Response")
     */
    private Response $response;

    /**
     * Info about cache usage.
     *
     * @var \Deviantintegral\Har\Cache
     *
     * @Serializer\Type("Deviantintegral\Har\Cache")
     */
    private Cache $cache;

    /**
     * @var \Deviantintegral\Har\Timings
     *
     * @Serializer\Type("Deviantintegral\Har\Timings")
     */
    private Timings $timings;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private string $serverIPAddress;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private string $connection;

    /**
     * Detailed info about the request.
     *
     * @var \Deviantintegral\Har\Initiator|null
     *
     * @Serializer\Type("Deviantintegral\Har\Initiator")
     */
    private ?Initiator $_initiator = null;

    public function getPageref(): string
    {
        return $this->pageref;
    }

    public function setPageref(string $pageref): self
    {
        $this->pageref = $pageref;

        return $this;
    }

    public function getTime(): float
    {
        return $this->time;
    }

    public function setTime(float $time): self
    {
        $this->time = $time;

        return $this;
    }

    /**
     * @return \Deviantintegral\Har\Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * @param \Deviantintegral\Har\Request $request
     * @return self
     */
    public function setRequest(Request $request): self
    {
        $this->request = $request;

        return $this;
    }

    /**
     * @return \Deviantintegral\Har\Response
     */
    public function getResponse(): Response
    {
        return $this->response;
    }

    /**
     * @param \Deviantintegral\Har\Response $response
     * @return self
     */
    public function setResponse(Response $response): self
    {
        $this->response = $response;

        return $this;
    }

    /**
     * @return \Deviantintegral\Har\Cache
     */
    public function getCache(): Cache
    {
        return $this->cache;
    }

    /**
     * @param \Deviantintegral\Har\Cache $cache
     * @return self
     */
    public function setCache(Cache $cache): self
    {
        $this->cache = $cache;

        return $this;
    }

    /**
     * @return \Deviantintegral\Har\Timings
     */
    public function getTimings(): Timings
    {
        return $this->timings;
    }

    /**
     * @param \Deviantintegral\Har\Timings $timings
     * @return self
     */
    public function setTimings(Timings $timings): self
    {
        $this->timings = $timings;

        return $this;
    }

    public function getServerIPAddress(): string
    {
        return $this->serverIPAddress;
    }

    public function setServerIPAddress(string $serverIPAddress): self
    {
        $this->serverIPAddress = $serverIPAddress;

        return $this;
    }

    public function getConnection(): string
    {
        return $this->connection;
    }

    public function setConnection(string $connection): self
    {
        $this->connection = $connection;

        return $this;
    }

    public function getInitiator(): ?Initiator
    {
        return $this->_initiator;
    }

    public function hasInitiator(): bool
    {
        return null !== $this->_initiator;
    }

    public function setInitiator(Initiator $_initiator): self
    {
        $this->_initiator = $_initiator;

        return $this;
    }
}
