<?php

declare(strict_types=1);

namespace PHPModelGenerator\Bundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PHPModelGeneratorParameterConverterTest extends WebTestCase
{
    public function testValidRequest(): void
    {
        $client = self::createClient();

        $client->request('POST', '/person/', [], [], [], json_encode(['name' => 'Walter', 'age' => 42]));

        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertSame('Walter: 42', $client->getResponse()->getContent());
    }

    /**
     * @dataProvider InvalidRequestDataProvider
     *
     * @param array $requestData
     * @param string $expectedResponseMessage
     */
    public function testInvalidRequestReturns400(array $requestData, string $expectedResponseMessage): void
    {
        $client = self::createClient();

        $client->request('POST', '/person/', [], [], [], json_encode($requestData));

        $this->assertSame(400, $client->getResponse()->getStatusCode());
        $this->assertStringContainsString($expectedResponseMessage, $client->getResponse()->getContent());
    }

    public function InvalidRequestDataProvider(): array
    {
        return [
            'Empty request' => [[], 'Missing required value for name'],
            'Only age' => [['age' => 42], 'Missing required value for name'],
            'Invalid name' => [['name' => 0], 'Invalid type for name. Requires string, got integer'],
        ];
    }
}
