<?php

declare(strict_types=1);
/**
 * This file is part of MineAdmin.
 *
 * @link     https://www.mineadmin.com
 * @document https://doc.mineadmin.com
 * @contact  root@imoi.cn
 * @license  https://github.com/mineadmin/MineAdmin/blob/master/LICENSE
 */

namespace HyperfTests;

use Hyperf\Testing\Client;
use Hyperf\Testing\Concerns\RunTestsInCoroutine;
use PHPUnit\Framework\TestCase;

/**
 * Class HttpTestCase.
 * @method get($uri, $data = [], $headers = [])
 * @method post($uri, $data = [], $headers = [])
 * @method put($uri, $data = [], $headers = [])
 * @method delete($uri, $data = [], $headers = [])
 * @method json($uri, $data = [], $headers = [])
 * @method file($uri, $data = [], $headers = [])
 * @method request($method, $path, $options = [])
 */
abstract class HttpTestCase extends TestCase
{
    use RunTestsInCoroutine;

    /**
     * @var Client
     */
    protected $client;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->client = make(Client::class);
    }

    public function __call($name, $arguments)
    {
        $count = count($arguments);
        if (! isset($arguments[2])) {
            if ($count === 1) {
                $arguments[1] = [];
            }
            $arguments[2] = [
                'Authorization' => 'Bearer ' . $this->getBearToken(),
            ];
        }
        return $this->client->{$name}(...$arguments);
    }

    public function getBearToken(): ?string
    {
        return $this->post('/system/login', [
            'username' => $this->username,
            'password' => $this->password,
        ], [])['data']['token'] ?? null;
    }
}
